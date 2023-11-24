@extends('backend.layouts.master')

@section('title') Quản lý Nhập hàng @stop

@section('addCss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content">
        <section class="content-header">
            <div class="container-fluid">
                {{-- search --}}
                <section class="dataTables_wrapper">
                    @include('backend.import-export-good.search')
                </section>

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <button class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-filter"></i> Lọc
                        </button>
                        {{-- <a href="{{ route('admin.products.create') }}" class="btn btn-info">Tạo sản phẩm</a> --}}
                    </div>
                    <div class="col-sm-6">
                        @include('backend.partials.breadcrumb', [
                            'breadcrumb' => [['title' => 'Danh sách nhập hàng', 'url' => '#']],
                        ])
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="container-fluid">
            @if (count($products) <= 0) @include('backend.partials.noData') @else <div class="row">
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
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hương vị</th>
                                        <th>Số lượng</th>
                                        <th>Ngày sản xuất</th>
                                        <th>Ngày hết hạn</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        @foreach ($product->flavors as $flavor)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>
                                                    <img style="width: 200px;" src="{{ asset('storage/'.$product->thumbnail) }}"
                                                    alt="" srcset="">
                                                </td>
                                                <td>{{ $product->name }}</td>
                                                <td>
                                                    <span class="badge bg-success" style="font-size: 15px!important">{{ $flavor->name }}</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success" style="font-size: 15px!important">{{ $flavor->quantity }}</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success" style="font-size: 15px!important">{{ date("d/m/Y", strtotime($flavor->manufacturing_date)) }}</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success" style="font-size: 15px!important">{{ date("d/m/Y", strtotime($flavor->expiration_date)) }}</span>
                                                </td>
                                                <td>
                                                    <button type="button" data-product-id="{{ $product->id }}" data-flavor-id="{{ $flavor->id }}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                        Nhập hàng
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenterExport">
                                                        Xuất hàng
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="card-footer clearfix">
                                {!! $products->links('pagination::bootstrap-4') !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
        </div>
        @include('backend.import-export-good.import')
        @include('backend.import-export-good.export')
        @endif
</div>
</section>
</div>
@endsection

@section('addJs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (session('success'))
@include('backend.layouts.toastr')
@endif
<script type="text/javascript">
    var data_model = 'product';
        $(document).ready(function () {
            $('.deleteDialog').on('click', function () {
                var data_id = $(this).data('id');
                var data_thumbnail = $(this).data('image');
                destroy(data_id, data_model, '{{ route('admin.ajax.destroy') }}', 'Bạn đã chắc chắn chưa?', null, false, data_thumbnail);
            });
        });

        $(document).ready(function(){
            // $('.datetimepicker').datepicker({
            //     format: 'dd/mm/yyyy',
            //     autoclose: true,
            //     todayHighlight: true
            // });

            $('.datetimepicker').datetimepicker({
                timepicker:false,
                format:'d/m/Y'
            });
            $('#exampleModalCenter').on('show.bs.modal', function (event) {
                // Lấy data-id từ button và gán vào trường input hidden
                var button = $(event.relatedTarget);
                var dataId = button.data('product-id');
                var dataIdFlavor = button.data('flavor-id');
                $('.dataIdProduct').val(dataId);
                $('.dataIdFlavor').val(dataIdFlavor);
            });
        });
</script>
@include('backend.product.script')
@endsection