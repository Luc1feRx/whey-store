@extends('backend.layouts.master')

@section('title') Thêm mới danh mục @stop

@section('addCss')
<link rel="stylesheet" href="{{ asset('backend\plugins\select2\css\select2.css') }}">
<link rel="stylesheet" href="{{ asset('backend\plugins\select2-bootstrap4-theme\select2-bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Advanced Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Advanced Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"></h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                @include('backend.category.form')
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('addJs')
    <script src="{{ asset('backend\plugins\select2\js\select2.min.js') }}"></script>
    <script src="{{ asset('backend\common\ChangeSlug.js') }}"></script>
    @include('backend.category.script')
@endsection