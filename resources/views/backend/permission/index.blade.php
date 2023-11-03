@extends('backend.layouts.master')

@section('title') Quản lý quyền @stop

@section('content')
<div class="content-wrapper">
    <section class="content">
        <section class="content-header">
            <div class="container-fluid">
                {{-- search --}}
                <section class="dataTables_wrapper">
                    @include('backend.role.search')
                </section>

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <button class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-filter"></i> Lọc
                        </button>
                        <a href="{{ route('admin.permissions.create') }}" class="btn btn-info">Tạo quyền</a>
                    </div>
                    <div class="col-sm-6">
                        @include('backend.partials.breadcrumb', [
                        'breadcrumb' => [['title' => 'Danh sách quyền', 'url' => '#']],
                        ])
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="container-fluid">
            @if (count($permissions) <= 0) @include('backend.partials.noData') @else <div class="row">
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
                                        <th>Tên quyền</th>
                                        <th>Ngày tạo</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.permissions.edit', ['id'=>$permission->id]) }}"
                                                class="btn btn-icon btn-sm tip"><i class="fas fa-pencil-alt"></i></a>
                                            <a data-id="{{ $permission->id }}" data-image=""
                                                class="btn btn-icon btn-sm deleteDialog tip " data-toggle="tooltip"
                                                title=""><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="card-footer clearfix">
                                {!! $permissions->links('pagination::bootstrap-4') !!}
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
    var data_model = 'permission';
        $(document).ready(function () {
            $('.deleteDialog').on('click', function () {
                var data_id = $(this).data('id');
                // var data_thumbnail = $(this).data('image');
                destroy(data_id, data_model, '{{ route('admin.ajax.destroy') }}', 'Bạn đã chắc chắn chưa?', null, false, null);
            });
        });
</script>
@include('backend.role.script')
@endsection