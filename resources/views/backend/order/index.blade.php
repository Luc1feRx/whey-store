@extends('backend.layouts.master')

@section('title') Quản lý đơn hàng @stop

@section('content')
<div class="content-wrapper">
    <section class="content">
        <section class="content-header">
            <div class="container-fluid">
                {{-- search --}}
                <section class="dataTables_wrapper">
                    @include('backend.order.search')
                </section>

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <button class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-filter"></i> Lọc
                        </button>
                    </div>
                    <div class="col-sm-6">
                        @include('backend.partials.breadcrumb', [
                        'breadcrumb' => [['title' => 'Danh sách đơn hàng', 'url' => '#']],
                        ])
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="container-fluid">
            @if (count($orders) <= 0) @include('backend.partials.noData') @else <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <form class="card-tools" action="" method="GET">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="keyword" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên người đặt hàng</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user_name }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{!! $order->payment_method == 1 ? '<img style="width: 150px; width: 70px;" src="\backend\dist\img\vnpay-logo-inkythuatso-01-13-16-26-42.jpg" alt="" srcset="">' : '' !!}</td>
                                        <td>{{ \App\Helpers\Common::numberFormat($order->order_total) }} VNĐ</td>
                                        <td>
                                            @php
                                                $arrStatus = [
                                                    \App\Models\Order::RECEIVE => 'Tiếp nhận',
                                                    \App\Models\Order::SUCCESS => 'Thành công',
                                                    \App\Models\Order::PENDING => 'Đang vận chuyển',
                                                    \App\Models\Order::CANCEL => 'Hủy đơn hàng'
                                                ]
                                            @endphp
                                            <select class="form-control select2-common orderStatus" data-order-id="{{ $order->id }}" data-url="{{ route('admin.orders.ajaxChangeStatus') }}" aria-hidden="true">
                                                @foreach ($arrStatus as $key => $status)
                                                <option value="{{ $key }}" {{ $key == $order->status ? 'selected' : ''}}>{{
                                                    $status }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.orderdetails.index', ['id' => $order->id]) }}" class="btn btn-icon btn-sm tip" data-toggle="tooltip" title="Xem chi tiết đơn hàng"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="" class="btn btn-icon btn-sm tip" data-toggle="tooltip" title="Xem chi tiết đơn hàng"><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="card-footer clearfix">
                                {!! $orders->links('pagination::bootstrap-4') !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
        </div>
        @endif
</div>
</section>
</div>
@endsection

@section('addJs')
@if (session('success'))
@include('backend.layouts.toastr')
@endif
<script type="text/javascript">
    var data_model = 'order';
        $(document).ready(function () {
            $('.deleteDialog').on('click', function () {
                var data_id = $(this).data('id');
                destroy(data_id, data_model, '{{ route('admin.ajax.destroy') }}', 'Bạn đã chắc chắn chưa?', null, false, null);
            });

            $('.orderStatus').change(function() {
                var orderId = $(this).data('order-id');
                var url = $(this).data('url');
                var newStatus = $(this).val();

                $.ajax({
                    method: 'GET',
                    url: url, // Địa chỉ URL để xử lý việc thay đổi trạng thái đơn hàng
                    data: {
                        order_id: orderId,
                        newStatus: newStatus
                    },
                    success: function(response) {
                        if(response.code == 200){
                            toastr["success"](response.msg);
                        }
                        
                    },
                    error: function(error) {
                        // Xử lý khi có lỗi xảy ra trong quá trình gửi request
                        console.error('Đã xảy ra lỗi: ', error);
                    }
                });
            });

        });
</script>
@include('backend.post.script')
@endsection