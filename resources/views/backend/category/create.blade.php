@extends('backend.layouts.master')

@section('title') Thêm mới danh mục @stop

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thêm mới danh mục</h1>
        </div>

        <!-- Content Row -->

        <div class="row">
            @include('backend.category.form')
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
