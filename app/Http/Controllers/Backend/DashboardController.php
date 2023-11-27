<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTransactions = Order::select('id')->count();
        $users = User::select('id')->count();
        $totalProducts = Product::select('id')->count();
        $totalRatings = Review::select('id')->count();

        // Thống kê trạng thái đơn hàng
        // Tiep nhan
        $transactionDefault = Order::where('status', Order::RECEIVE)->select('id')->count();
        // dang van chuyen
        $transactionProcess = Order::where('status', Order::PENDING)->select('id')->count();
        // Thành công
        $transactionSuccess = Order::where('status', Order::SUCCESS)->select('id')->count();
        //Cancel
        $transactionCancel = Order::where('status', Order::CANCEL)->select('id')->count();

        $statusTransaction = [
            [
                'Hoàn tất' , $transactionSuccess, false
            ],
            [
                'Đang vận chuyển' , $transactionProcess, false
            ],
            [
                'Tiếp nhận' , $transactionDefault, false
            ],
            [
                'Huỷ bỏ' , $transactionCancel, false
            ]
        ];

        return view('backend.dashboard.dashboard', [
            'totalTransactions' => $totalTransactions,
            'users' => $users,
            'totalProducts' => $totalProducts,
            'totalRatings' => $totalRatings,
            'statusTransaction' => json_encode($statusTransaction)
        ]);
    }

    public function profile()
    {
        return view('backend.profile.profile');
    }

    public function update(Request $request){
        try {
            DB::beginTransaction();
            $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);
            $admin->name = $request->name;
            $admin->address = $request->address;
            if(!empty($request->password)){
                $admin->password = Hash::make($request->input('password'));
            }
            if($request->hasFile('avatar')){
                $avatar_upload = UploadImage::handleUploadFile('avatar', 'img/admin/', $request);
                $admin->avatar = $avatar_upload;
            }
            $admin->phone = $request->phone;
            $admin->save();
            DB::commit();
            return back()->with(['success' => 'Sửa thông tin cá nhân thành công']);
        } catch (Exception $e) {
            Log::error('[DashboardController][update] error ' . $e->getMessage(). '' . $e->getLine());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Sửa thông tin cá nhân thất bại']);
        }
    }

    public function GetOrderFilter(Request $request){
        $type = $request->type;

        if(!empty($type)){
            $to = Carbon::now()->format('Y-m-d H:i:s');
            $from = Carbon::now()->subDays(28)->format('Y-m-d H:i:s');
            $orders = $this->getFilterOrder($from, $to);
            return response()->json([
                'orders' => $orders
            ]);
        }

        $to = Carbon::createFromFormat('d/m/Y', $request->to)->endOfDay()->format('Y-m-d H:i:s');
        $from = Carbon::createFromFormat('d/m/Y', $request->from)->startOfDay()->format('Y-m-d H:i:s');
        $orders = $this->getFilterOrder($from, $to);
        return response()->json([
            'orders' => $orders
        ]);
    }

    public function getFilterOrder($from, $to){
        $data = Order::select(DB::raw('DATE(created_at) as date'), DB::raw('sum(order_total) as order_total'))
            ->whereBetween('created_at', [$from, $to])
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();
        $chartView = array();
        foreach ($data as $value){
            $chartView[$value->date] = (int)$value->order_total;
        }
        $startDate = Carbon::parse($from);
        $endDate = Carbon::parse($to);
        $arrDate = array();
        $arrOrderTotal = [];
        do {
            $index = $startDate->format('Y-m-d');
            $formatDate = $startDate->format('d/m/Y');
            $arrDate[] = $formatDate;
            $arrOrderTotal[] = isset($chartView[$index])?(int)$chartView[$index]:0;
        } while ($startDate->add(1, 'day')->lte($endDate));
        $arrData = [
            $arrDate,
            $arrOrderTotal
        ];
        return $arrData;
    }
}
