@extends('backend.layouts.master')

@section('content')
<div class="content-wrapper" style="min-height: 1604.44px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    @include('backend.partials.breadcrumb',
                    [
                    'breadcrumb'=> [
                    ['title' => 'Quản lý đơn hàng', 'url' => route('admin.orders.index')],
                    ['title' => 'Chi tiết đơn hàng', 'url' => '#']
                    ]
                    ])
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Whey Store
                                    <small class="float-right">Ngày tạo: {{ date('d/m/Y', strtotime($getOrder->created_at)) }}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong>Tên khách hàng: {{ $getOrder->user_name }}
                                    </strong>
                                    <br>
                                    Địa chỉ: {{ $getOrder->address }}<br>
                                    Số điện thoại: {{ $getOrder->phone }}<br>
                                    Email: {{ $getOrder->email }}
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong>Mã đơn hàng: {{ $getOrder->order_id }}
                                    </strong>
                                    <br>
                                    Ngày thanh toán: {{ date('d/m/Y', strtotime($getOrder->created_at)) }}<br>
                                    Mã giao dịch: {{ $getOrder->transaction_code }}<br>
                                    Phương thức thanh toán: {{ $getOrder->payment_method == 1 ? 'VNPAY' : 'MOMO' }}
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Số lượng</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Hương vị</th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalPrice = 0;
                                        @endphp
                                        @foreach ($order_details as $item)
                                            <tr>
                                                <td>{{ $item->order_detail_quantity }}</td>
                                                <td>
                                                    <img style="width: 200px;" src="{{ asset('storage/'.$item->product_thumbnail) }}"
                                                    alt="" srcset="">
                                                </td>
                                                <td>{{ $item->product_name }}</td>
                                                <td>{{ $item->flavor_name }}</td>
                                                <td>{{ \App\Helpers\Common::numberFormat($item->order_detail_price) }} VNĐ</td>
                                            </tr>
                                            @php
                                                $totalPrice += ($item->order_detail_price * $item->order_detail_quantity);
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <p class="lead">Phương thức thanh toán:</p>
                                @if ($getOrder->payment_method == 1)
                                    <img style="width: 200px; width: 100px;" src="\backend\dist\img\vnpay-logo-inkythuatso-01-13-16-26-42.jpg" alt="" srcset="">
                                @else
                                    
                                @endif
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Ngày thanh toán: {{ date('d/m/Y', strtotime($getOrder->created_at)) }}</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th style="width:50%">Tổng tiền đơn hàng:</th>
                                                <td>{{ \App\Helpers\Common::numberFormat($totalPrice) }} VNĐ</td>
                                            </tr>
                                            <tr>
                                                <th>Giảm giá ({{ !empty($getOrder->percentage) ? $getOrder->percentage : '0'}} %)</th>
                                                <td>{{ \App\Helpers\Common::numberFormat($totalPrice - $getOrder->order_total) }} VNĐ</td>
                                            </tr>
                                            <tr>
                                                <th>Tổng tiền sau khi giảm giá:</th>
                                                <td>{{ \App\Helpers\Common::numberFormat($getOrder->order_total) }} VNĐ</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                        class="fas fa-print"></i> Print</a>
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Generate PDF
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection