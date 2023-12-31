<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Common;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request){
        $orders = Order::query();

        if($request->keyword){
            $searchKeyword = Common::escapeLike($request->keyword);
            $orders->where(function ($q) use ($searchKeyword) {
                $q->where('phone', 'LIKE', "%" . $searchKeyword . "%")
                    ->orWhere('address', 'LIKE', "%" . $searchKeyword . "%")
                    ->orWhere('user_name', 'LIKE', "%" . $searchKeyword . "%")
                    ->orWhere('email', 'LIKE', "%" . $searchKeyword . "%");
            });
        }
        
        $orders = $orders->orderBy('id', 'desc')->paginate(10);
        return view('backend.order.index', [
            'orders' => $orders
        ]);
    }

    public function ajaxChangeStatus(Request $request){
        $order = Order::findorFail($request->order_id);
        $order_time = DB::table('order_times')->updateOrInsert(
            ['order_id' => $request->order_id], // Kiểm tra xem bản ghi có tồn tại không
            ['status' =>  $request->newStatus,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()] // Cập nhật hoặc thêm giá trị mới
        );
        $order->status = $request->newStatus;
        $order->save();
        if($order){
            return response([
                'code'       => 200,
                'msg'    => 'Thay đổi trạng thái thành công'
            ]);  
        }else {
            return response([
                'code'       => 400,
                'msg'    => 'Thay đổi trạng thái thất bại'
            ]); 
        }
    }

    public function getOrderDetail($id){
        $order_details = OrderDetail::join('products', 'products.id', '=', 'order_details.product_id')
            ->join('flavors', 'flavors.id', '=', 'order_details.flavor_id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->leftJoin('vouchers', 'vouchers.id', '=', 'orders.discount_id')
            ->leftJoin('users', 'users.id', '=', 'orders.user_id')
            ->where('order_details.order_id', $id)
            ->select([
                'order_details.price as order_detail_price',
                'order_details.quantity as order_detail_quantity',
                'orders.order_total as order_total',
                'flavors.name as flavor_name',
                'order_details.id as order_details_id',
                'products.name as product_name',
                'products.thumbnail as product_thumbnail'
            ])
            ->orderBy('order_details.id', 'desc')
            ->get();

        $getOrder = Order::leftJoin('vouchers', 'vouchers.id', '=', 'orders.discount_id')
            ->where('orders.id', $id)
            ->select([
                'orders.id as order_id',
                'orders.address',
                'orders.phone',
                'orders.email',
                'orders.user_name',
                'orders.transaction_code',
                'orders.created_at',
                'orders.payment_method',
                'orders.order_total',
                'vouchers.percentage'
            ])
            ->first();
        return view('backend.order.order_detail', [
            'order_details' => $order_details,
            'getOrder' => $getOrder
        ]);
    }
    
    public function printOrder($id){
        $order_details = OrderDetail::join('products', 'products.id', '=', 'order_details.product_id')
        ->join('flavors', 'flavors.id', '=', 'order_details.flavor_id')
        ->join('orders', 'orders.id', '=', 'order_details.order_id')
        ->leftJoin('vouchers', 'vouchers.id', '=', 'orders.discount_id')
        ->where('order_details.order_id', $id)
        ->select([
            'order_details.price as order_detail_price',
            'order_details.quantity as order_detail_quantity',
            'flavors.name as flavor_name',
            'products.name as product_name',
        ])
        ->orderBy('order_details.id', 'desc')
        ->get();

        $getOrder = Order::where('orders.id', $id)
        ->select([
            'orders.order_total',
            'orders.user_name',
        ])
        ->first();
        $data = [
            'title' => 'Order details',
            'date' => date('m/d/Y'),
            'order_details' => $order_details,
            'getOrder' => $getOrder
        ]; 
            
        $pdf = Pdf::loadView('backend.order.print', $data);
     
        return $pdf->download('aduuuu.pdf');
    }
}
