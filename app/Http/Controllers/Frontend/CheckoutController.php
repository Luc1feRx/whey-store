<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Voucher;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function checkout(){
        $discount_code = Session::get('discount_name');
        return view('frontend.checkout.checkout',[
            'discount_code' => $discount_code
        ]);
    }

    public function payment(Request $request){
        $data = $request->except("_token");
        $data['user_id'] = isset(Auth::user()->id) ? Auth::user()->id : null;
        $data['user_name'] = $request->last_name . ' ' . $request->first_name;
        $data['order_total'] = str_replace(',', '', Cart::subtotal(0));
        if($request->payment_method == 1){
            Session::put('user_infor', $data);
            $totalMoney = str_replace(',', '', Cart::subtotal(0));
            return view('frontend.vnpay.index',[
                'totalMoney' => $totalMoney
            ]);
        }
    }

    public function createPaymentVnpay(Request $request)
    {
        $vnp_TxnRef = Str::random(10); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_Amount = $request->amount * 100;
        $vnp_OrderInfo = $request->order_desc;
        $vnp_OrderType = $request->order_type;
        $vnp_Locale = 'vn';
        $vnp_BankCode = $request->bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $vnp_HashSecret = env('VNP_HASH_SECRET');

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => env('VNP_TMN_CODE'),
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => route('home.vnpay.return'),
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $vnp_Url = env('VNP_URL') . "?" . $query;
        if (env('VNP_HASH_SECRET')) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect($vnp_Url);
    }

    public function returnPaymentVnpay(Request $request){
        if (session()->has('user_infor') && $request->vnp_ResponseCode == '00') {
            DB::beginTransaction();
            try {
                $vnpayData = $request->all();
                $data = session()->get('user_infor');
                $order = new Order();
                $order->user_id = $data['user_id'];
                $order->user_name = $data['user_name'];
                $order->address = $data['address'];
                $order->phone = $data['phone'];
                $order->note = $data['note'];
                $order->payment_method = $data['payment_method'];
                $order->transaction_code = $vnpayData['vnp_TxnRef'];
                $order->code_bank = $vnpayData['vnp_BankCode'];
                $order->order_total = (int)$data['order_total'];
                $order->email = $data['email'];
                if(!empty($data['discount_code'])){
                    $voucher = Voucher::where('voucher_sku', $data['discount_code'])->first();
                    $order->discount_id = $voucher->id;
                }
                $order->save();

                if ($order) {
                    $cart = Cart::content();

                    foreach ($cart as $key => $item) {
                        // Lưu chi tiết đơn hàng
                        OrderDetail::insert([
                            'order_id' => $order->id,
                            'product_id' => $item->id,
                            'flavor_id' => $item->options->flavor_id,
                            'quantity' => $item->qty,
                            'price' => $item->price
                        ]);
                    }
                }
                Cart::destroy();
                DB::commit();
                return view('frontend.vnpay.vnpay_return', [
                    'vnpayData' => $vnpayData
                ])->with('success', 'Đơn hàng của bạn đã được lưu');

            } catch (\Exception $exception) {
                Log::error('[CheckoutController][returnPaymentVnpay] error ' . $exception->getMessage());
                DB::rollBack();
                return redirect()->to('/')->with('error', 'Đã xảy ra lỗi không thể thanh toán đơn hàng');
            }
        } else {
            return redirect()->to('/')->with('error', 'Đã xảy ra lỗi không thể thanh toán đơn hàng');
        }
    }


}
