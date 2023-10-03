@extends('backend.layouts.master')

@section('title') Quản lý danh mục @stop

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Quản lý danh mục</h1>
        </div>

        <!-- Content Row -->

        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div id="dataTable_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder=""
                                                    aria-controls="dataTable"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 165.547px;">Tên danh mục</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 271.609px;">Slug</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1" aria-label="Office: activate to sort column ascending"
                                                        style="width: 117.859px;">Ngày tạo</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1" aria-label="Office: activate to sort column ascending"
                                                        style="width: 117.859px;">Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $key => $cate)
                                                <tr class={{ $key % 2==0 ? "odd" : "even" }}>
                                                    <td class="sorting_1 update_record" data-name="name_category" data-type="text"
                                                        data-pk="{{ $cate->id }}">{{ $cate->name_category }}</td>
                                                    <td class="update_record" data-name="category_slug" data-type="text"
                                                        data-pk="{{ $cate->id }}">{{ $cate->category_slug }}</td>
                                                    <td>{{ $cate->created_at }}</td>
                                                    <td>
                                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Dropdown
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-7">
                                        {{ $categories->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
