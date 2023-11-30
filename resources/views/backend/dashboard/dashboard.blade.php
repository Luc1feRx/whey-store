@extends('backend.layouts.master')

@section('title') Trang quản trị hệ thống website xây dựng website bán hàng Whey Store @stop

@section('addCss')
<link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css">
<link rel="stylesheet" href="{{ asset('backend/plugins/datepicker-bootstrap/css/datepicker.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Trang chủ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Trang chủ</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalTransactions }}</h3>

                            <p>Tổng đơn hàng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('admin.orders.index') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalRatings }}</h3>

                            <p>Tổng số đánh giá</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('admin.comments.index') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $users }}</h3>

                            <p>Số user đăng ký</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $totalProducts }}</h3>

                            <p>Tổng sản phẩm</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ route('admin.products.index') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex" data-picker="rangeDate">
                        <div class="col-3">
                            <div class="form-group">
                                <label>Từ:</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input name="from" type="text" autocomplete="off" class="form-control" id="start_at"
                                           data-target="#reservationdate" placeholder="Từ ngày"/>
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Đến:</label>
                                <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                    <input name="to" type="text" autocomplete="off" class="form-control" id="end_at"
                                           data-target="#reservationdate2" placeholder="Đến ngày"/>
                                    <div class="input-group-append" data-target="#reservationdate2"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3" style="display: flex">
                            <div class="filter d-flex align-items-center mt-xl-3"><button id="filterByDay" type="button" class="btn btn-primary">Lọc</button></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <figure class="highcharts-figure">
                        <div id="container2">
        
                            
                        </div>
                    </figure>
                </div>
                <div class="col-sm-4">
                    <figure class="highcharts-figure">
                        <div id="container" data-json="{{ $statusTransaction }}"></div>
                    </figure>
                </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('addJs')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="{{ asset('backend/plugins/datepicker-bootstrap/js/datepicker.js') }}"></script>
    <script>
        let dataTransaction = $("#container").attr('data-json');
        dataTransaction  =  JSON.parse(dataTransaction);

        Highcharts.chart('container', {

            chart: {
                styledMode: true
            },

            title: {
                text: 'Thống kê trạng thái đơn hàng'
            },

            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr']
            },

            series: [{
                type: 'pie',
                allowPointSelect: true,
                keys: ['name', 'y', 'selected', 'sliced'],
                data: dataTransaction,
                showInLegend: true
            }]
        });

        function updateChartWithData(labels, data) {
            Highcharts.chart('container2', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Biểu đồ doanh thu các ngày trong tháng'
                },
                xAxis: {
                    categories: labels
                },
                yAxis: {
                    title: {
                        text: 'Tổng tiền'
                    },
                    labels: {
                        formatter: function () {
                            return this.value + 'VNĐ';
                        }
                    }
                },
                tooltip: {
                    crosshairs: true,
                    shared: true
                },
                plotOptions: {
                    spline: {
                        marker: {
                            radius: 4,
                            lineColor: '#666666',
                            lineWidth: 1
                        }
                    }
                },
                series: [
                    {
                        name: 'Tổng tiền',
                        marker: {
                            symbol: 'square'
                        },
                        data: data
                    }
                ]
            });
        }

        $(window).on('load', function () {
            $(".window-loading").fadeOut("slow");
        });


        $(document).ready(function () {
            $('#start_at').attr('readonly', true);
            $('#end_at').attr('readonly', true);

            $("#start_at").datepicker({
                format: 'dd/mm/yyyy',
                todayHighlight: true,
                autoClose: true
            }).on('changeDate', function (e) {
                $("#end_at").datepicker('setStartDate', $(this).val());
                $(this).datepicker('hide');
            });

            $("#end_at").datepicker({
                format: 'dd/mm/yyyy',
                autoClose: true,
            }).on("changeDate", function (e) {
                $("#start_at").datepicker('setEndDate', $(this).val());
                $(this).datepicker('hide');
            });

            function FilterOrder(type = null, from = null, to = null) {
                $.ajax({
                    type: "GET",
                    url: "/admin/filter_order",
                    data: { from: from, to: to, type: type },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: "JSON",
                    success: function (response) {
                        var labels = response.orders[0]; // Nhãn trên trục x
                        var data = response.orders[1]; // Dữ liệu tương ứng

                        // Gọi hàm cập nhật biểu đồ Highcharts với dữ liệu mới
                        updateChartWithData(labels, data);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            FilterOrder(28, null, null);

            $('#filterByDay').on('click', function () {
                var from = $('input[name="from"]').val();
                var to = $('input[name="to"]').val();
                FilterOrder(null, from, to);
            });
        });
    </script>
@endsection