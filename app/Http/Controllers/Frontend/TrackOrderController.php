<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Common;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrackOrderRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackOrderController extends Controller
{
    public function getOrder (Request $request){
        $orders = Order::query()
            ->when(Auth::check(), function ($qr) {
                $qr->where('user_id', Auth::user()->id);
            }, function ($query) use ($request) {
                $query->where('phone', Common::escapeLike($request->phone))
                ->where('email', Common::escapeLike($request->email))
                ->orderBy('id', 'desc')->paginate(10);
            })->orderBy('created_at', 'desc')->get();
        return view('frontend.track-order.track-order', [
            'orders' => $orders
        ]);
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

        $order = Order::where('orders.id', $id)->leftJoin('order_times', 'order_times.order_id', '=', 'orders.id')
            ->select([
                'order_times.status as order_status',
                'orders.status as order_times_status',
                'orders.created_at as order_created_at',
                'orders.updated_at as order_updated_at',
                'order_times.created_at as order_time_created_at',
                'order_times.updated_at as order_time_updated_at', 
            ])->first();

        return view('frontend.track-order.track-order-detail', [
            'order_details' => $order_details,
            'order' => $order
        ]);
    }
}
