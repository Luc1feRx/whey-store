@extends('backend.layouts.master')

@section('title') Quản lý khách hàng @stop

@section('content')
<div class="content-wrapper">
    <section class="content">
        <section class="content-header">
            <div class="container-fluid">
                {{-- search --}}
                <section class="dataTables_wrapper">
                    @include('backend.customer.search')
                </section>

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <button class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-filter"></i> Lọc
                        </button>
                        <a href="{{ route('admin.customers.create') }}" class="btn btn-info">Tạo tài khoản</a>
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-success"
                        title="Refresh">
                        <i class="fa fa-refresh"></i><span
                                class="hidden-xs"> Làm mới</span>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        @include('backend.partials.breadcrumb', [
                        'breadcrumb' => [['title' => 'Danh sách tài khoản khách hàng', 'url' => '#']],
                        ])
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="container-fluid">
            @if (count($users) <= 0) @include('backend.partials.noData') @else <div class="row">
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
                                        <th>Tên tài khoản</th>
                                        <th>Email</th>
                                        <th>Ảnh</th>
                                        <th>SĐT</th>
                                        <th>Địa chỉ</th>
                                        <th>Đăng nhập cuối</th>
                                        <th>Địa chỉ IP</th>
                                        <th>Trình duyệt</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $k => $user)
                                    <tr>
                                        <td>{{ ($users->currentPage() - 1) * $users->perPage() + $k + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <img style="width: 100px;" src="{{ asset('storage/'.$user->avatar) }}"
                                                alt="" srcset="">
                                        </td>
                                        <td>{{ \App\Helpers\Common::formatPhone($user->phone)}}</td>
                                        <td>{{ $user->address}}</td>
                                        <td>{{ date("d/m/Y H:i:s", strtotime($user->last_login)) }}</td>
                                        <td>{{ $user->login_ip}}</td>
                                        <td>{{ $user->browser_info}}</td>
                                        <td>
                                            <a href="{{ route('admin.accounts.edit', ['id'=>$user->id]) }}"
                                                class="btn btn-icon btn-sm tip"><i class="fas fa-pencil-alt"></i></a>
                                            <a data-id="{{ $user->id }}" data-image="{{ $user->avatar }}"
                                                class="btn btn-icon btn-sm deleteDialog tip " data-toggle="tooltip"
                                                title=""><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="card-footer clearfix">
                                {!! $users->links('pagination::bootstrap-4') !!}
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
    var data_model = 'user';
        $(document).ready(function () {
            $('.deleteDialog').on('click', function () {
                var data_id = $(this).data('id');
                var data_thumbnail = $(this).data('image');
                destroy(data_id, data_model, '{{ route('admin.ajax.destroy') }}', 'Bạn đã chắc chắn chưa?', null, false, data_thumbnail);
            });
        });
</script>
@include('backend.customer.script')
@endsection