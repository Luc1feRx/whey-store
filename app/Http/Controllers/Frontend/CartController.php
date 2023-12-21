<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Common;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Voucher;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddToCart(Request $request){
        $product = Product::find($request->product_id);
        //1. Kiểm tra tồn tại sản phẩm
        if (!$product) return redirect()->to('/');

        // 2. Kiểm tra số lượng sản phẩm
        $quantity = DB::table('product_flavors')
                    ->where('product_id', $product->id)
                    ->where('flavor_id', $request->product_flavor_id)
                    ->value('quantity');

        if ($quantity < $request->product_quantity || empty($request->product_quantity)) {
            //4. Thông báo không đủ số lượng
            return response()->json([
                'code' => 400,
                'msg' => __('message.cart.insufficient_quantity')
            ]);
        }        

        // 3. Thêm sản phẩm vào giỏ hàng
        $cart = Cart::add([
            'id'      => $product->id,
            'name'    => $product->name,
            'qty'     => $request->product_quantity,
            'price'   => isset($product->discount_price) ? $product->discount_price : $product->price,
            'weight'  => $product->weight,
            'options' => [
                'image'     => $product->thumbnail,
                'flavor'      => $request->product_flavor,
                'flavor_id' => $request->product_flavor_id,
                'slug' => isset($product) ? $product->slug : null
            ]
        ]);

        $cartCount = Cart::count();

        $CartCountView = view('frontend.cart.cartShopping')->with(['cartCount' => $cartCount])->render();
        if($cart){
            return response()->json(['html' => $CartCountView, 'code' => 200, 'msg' => __('message.cart.success')]);
        }
    }

    public function listCart(){
        $carts = Cart::content();
        return view('frontend.cart.castList', [
            'carts' => $carts
        ]);
    }

    public function cartDiscount(Request $request)
    {
        if ($request->ajax())
        {
            $discount = Voucher::where('voucher_sku', $request->discount_code)->first();

            if(empty($request->discount_code)){
                return response([
                    'code'       => 400,
                    'msg'    => trans('message.discount.requiredDiscountCode'),
                ]);
            }

            if(empty($discount)){
                return response([
                    'code'       => 400,
                    'msg'    => trans('message.discount.errorDiscount')
                ]);
            }

                // Kiểm tra xem mã giảm giá đã được áp dụng hay chưa
                $appliedDiscount = Session::get('discount_name');

                if (!empty($appliedDiscount) && $appliedDiscount == $discount->voucher_sku) {
                    return response([
                        'code' => 400,
                        'msg' => trans('message.discount.alreadyApplied')
                    ]);
                }

            if ($discount->quantity == 0) {
                return response([
                    'totalMoney' => Cart::subtotal(0),
                    'code'       => 400,
                    'msg'    => trans('message.discount.outOfDiscount')
                ]);
            }
 
            $totalCart = Cart::subtotal(0, '.', '');
                    // Kiểm tra xem tổng giá trị đơn hàng có đạt giá trị tối thiểu không
            if ($totalCart < $discount->min_purchase) {
                return response()->json([
                    'code' => 400,
                    'msg' => trans('message.discount.minimumNotReached')
                ]);
            }
            // Tính tổng tiền sau khi đã áp dụng mã giảm giá
            // Tính giá trị giảm giá và phần trăm giảm giá tương ứng với tổng giỏ hàng
            $discountAmount = $discount->reduced_amount; // Số tiền giảm giá cố định
            $discountPercentage = ($discountAmount / $totalCart) * 100;
            // Áp dụng phần trăm giảm giá vào giỏ hàng
            Cart::setGlobalDiscount($discountPercentage);
            Session::put('reducedAmount', $discount->reduced_amount);
            Session::put('discount_name', $discount->voucher_sku);

            $discount->quantity = $discount->quantity - 1;
            $discount->save();


            return response([
                'totalMoney' => Cart::subtotal(0),
                'discountAmount' => number_format(Session::get('discountAmount'), 0),
                'nameDiscount' => $discount->voucher_sku,
                'code'       => 200,
                'msg'    => trans('message.discount.success')
            ]);
        }
    }

    public function updateCart(Request $request, $id)
    {
        if ($request->ajax()) {

            //1.Lấy tham số
            $qty       = $request->quantity ?? 1;
            $idProduct = $request->product_id;
            $product   = Product::find($idProduct);

            //2. Kiểm tra tồn tại sản phẩm
            if (!$product) return response(['messages' => 'Không tồn tại sản sản phẩm cần update']);

            //3. Kiểm tra số lượng sản phẩm còn ko
            // if ($product->pro_number < $qty) {
            //     return response([
            //         'messages' => 'Số lượng cập nhật không đủ',
            //         'error'    => true
            //     ]);
            // }

            //4. Update
            Cart::update($id, $qty);

            return response([
                'id' => $id,
                'cartCount' => Cart::count(),
                'msg'   => __('message.cart.update.success'),
                'totalMoney' => Cart::subtotal(0),
                'totalItem'  => !empty($product->discount_price) ? (Common::numberFormat($product->discount_price * $qty)) : (Common::numberFormat($product->price * $qty))
            ]);
        }
    }

    public function deleteCart(Request $request, $rowId)
    {
        if ($request->ajax())
        {
            // Xoá sản phẩm khỏi đơn hàng thành công
            Cart::remove($rowId);
            session()->forget('discount_name');
            session()->forget('reducedAmount');
            session()->forget('discount_amount');
            session()->forget('cart_total');
            session()->forget('discountAmount');
            return response([
                'totalMoney' => Cart::subtotal(0),
                'cartCount' => Cart::count(),
                'code'       => 200,
                'message'    => trans('message.cart.remove.success')
            ]);
        }
    }

}
