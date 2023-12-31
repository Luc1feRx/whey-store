@extends('backend.layouts.master')

@section('title') Quản lý Sản phẩm @stop

@section('content')
@php
    $request = request()
@endphp
<div class="content-wrapper">
    <section class="content">
        <section class="content-header">
            <div class="container-fluid">
                {{-- search --}}
                <section class="dataTables_wrapper">
                    @include('backend.product.search')
                </section>

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <button class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-filter"></i> Lọc
                        </button>
                        <a href="{{ route('admin.products.create') }}" class="btn btn-info">Tạo sản phẩm</a>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-success"
                        title="Refresh">
                        <i class="fa fa-refresh"></i><span
                                class="hidden-xs"> Làm mới</span>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        @include('backend.partials.breadcrumb', [
                        'breadcrumb' => [['title' => 'Danh sách sản phẩm', 'url' => '#']],
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
                                        <th>Danh mục</th>
                                        <th>Thương hiệu</th>
                                        <th>Giá sản phẩm (VNĐ)</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $k=>$product)
                                    <tr>
                                        <td>{{ ($products->currentPage() - 1) * $products->perPage() + $k + 1 }}</td>
                                        <td>
                                            <img style="width: 100px;" src="{{ asset('storage/'.$product->thumbnail) }}"
                                            alt="" srcset="">
                                        </td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>
                                            @foreach ($product->categories as $cate)
                                                <span class="badge bg-success" style="font-size: 15px!important">{{ $cate->name_category }}</span>
                                            @endforeach
                                        </td>
                                        <td><span class="badge bg-success" style="font-size: 15px!important">{{ $product->brand_name }}</span></td>
                                        <td>{{ \App\Helpers\Common::numberFormat($product->price) }} VNĐ</td>
                                        <td>{{ $product->status == 1 ? 'Hiển thị' : 'Ẩn' }}</td>
                                        <td>
                                            @if ($product->status == 1)
                                            <a href="{{ route('admin.products.edit', ['id'=>$product->id]) }}"
                                                class="btn btn-icon btn-sm tip"><i class="fas fa-pencil-alt"></i></a>
                                            <a data-id="{{ $product->id }}" data-image="{{ $product->thumbnail }}"
                                                class="btn btn-icon btn-sm deleteDialog tip " data-toggle="tooltip"
                                                title=""><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                    </tr>
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
    var data_model = 'product';
        $(document).ready(function () {
            $('.deleteDialog').on('click', function () {
                var data_id = $(this).data('id');
                var data_thumbnail = $(this).data('image');
                destroy(data_id, data_model, '{{ route('admin.ajax.destroy') }}', 'Bạn đã chắc chắn chưa?', null, false, data_thumbnail);
            });
        });
</script>
@include('backend.product.script')
@endsection