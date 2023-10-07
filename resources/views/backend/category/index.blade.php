@extends('backend.layouts.master')

@section('title') Quản lý danh mục @stop

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Simple Tables</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Simple Tables</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-info">Tạo danh mục</a>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên danh mục</th>
                                            <th>Slug danh mục</th>
                                            <th>Danh mục cha</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $cate)
                                            <tr>
                                                <td>{{ $cate->id }}</td>
                                                <td>{{ $cate->name_category }}</td>
                                                <td>{{ $cate->slug_category }}</td>
                                                <td>{{ $cate->parent_id }}</td>
                                                <td>
                                                    <a href="" class="btn btn-icon btn-sm tip"><i class="fas fa-pencil-alt"></i></a>
                                                    <a data-id=""
                                                        class="btn btn-icon btn-sm deleteDialog tip "
                                                        data-toggle="tooltip"
                                                        title=""><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="card-footer clearfix">
                                    {!! $categories->links('pagination::bootstrap-4') !!}
                                </div>
                            </div>
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
@endsection
