@extends('backend.layouts.master')

@section('title') Quản lý danh mục @stop

@section('content')
        <div class="content-wrapper">
            <section class="content">
                <section class="content-header">
                    <div class="container-fluid">
                        {{-- search --}}
                        <section class="dataTables_wrapper">
                            @include('backend.category.search')
                        </section>
                        
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <button class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa fa-filter"></i> Lọc
                                </button>
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-info">Tạo danh mục</a>
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-success"
                                title="Refresh">
                                <i class="fa fa-refresh"></i><span
                                        class="hidden-xs"> Làm mới</span>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                @include('backend.partials.breadcrumb', [
                                    'breadcrumb' => [['title' => 'Danh sách danh mục', 'url' => '#']],
                                ])
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            @if (count($categories) <= 0) @include('backend.partials.noData')
                            @else
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
                                                <th>Tên danh mục</th>
                                                <th>Slug</th>
                                                <th>Ảnh</th>
                                                <th>Danh mục cha</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $k => $cate)
                                                <tr>
                                                    <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $k + 1 }}</td>
                                                    <td>{{ $cate->name_category }}</td>
                                                    <td>{{ $cate->slug_category }}</td>
                                                    <td>
                                                        <img style="width: 120px;" src="{{ asset('storage/'.$cate->thumbnail) }}" alt="" srcset="">
                                                    </td>
                                                    <td>{{ optional($cate->parentCategory)->name_category }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.categories.edit', ['id'=>$cate->id]) }}" class="btn btn-icon btn-sm tip"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                        <a data-id="{{ $cate->id }}" data-image="{{ $cate->thumbnail }}" class="btn btn-icon btn-sm deleteDialog tip "
                                                            data-toggle="tooltip" title=""><i
                                                                class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="card-footer clearfix">
                                        {!! $categories->links('pagination::bootstrap-4') !!}
                                    </div>
                                </div>
                                @endif
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection

@section('addJs')
    @if (session('success'))
        @include('backend.layouts.toastr')
    @endif
    <script type="text/javascript">
        var data_model = 'category';
        $(document).ready(function () {
            $('.deleteDialog').on('click', function () {
                var data_id = $(this).data('id');
                var data_thumbnail = $(this).data('image');
                destroy(data_id, data_model, '{{ route('admin.ajax.destroy') }}', 'Bạn đã chắc chắn chưa?', null, false, data_thumbnail);
            });
        });
    </script>
    @include('backend.category.script')
@endsection
