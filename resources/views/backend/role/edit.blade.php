@extends('backend.layouts.master')

@section('title') Sửa tin tức @stop

@section('addCss')
<link rel="stylesheet" href="{{ asset('backend\plugins\select2\css\select2.css') }}">
<link rel="stylesheet" href="{{ asset('backend\plugins\select2-bootstrap4-theme\select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend\plugins\summernote\summernote.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend\plugins\summernote\summernote-bs4.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa tin tức</h1>
                </div>
                <div class="col-sm-6">
                    @include('backend.partials.breadcrumb',
                    [
                        'breadcrumb'=> [
                            ['title' => 'Danh sách tin tức', 'url' => route('admin.posts.index')],
                            ['title' => 'Sửa tin tức', 'url' => '#']
                        ]
                    ])
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
                <div class="card-body" style="display: block;">
                    <div class="card card-primary">
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form action="{{ route('admin.posts.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('backend.post.form')
                        </form>
                    </div>
                </div>
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
    <script src="{{ asset('backend\plugins\summernote\summernote.min.js') }}"></script>
    <script src="{{ asset('backend\plugins\summernote\summernote-bs4.js') }}"></script>
    <script src="{{ asset('backend\common\summernote_common.js') }}"></script>
    @include('backend.post.script')
    @if (session('error'))
    @include('backend.layouts.toastr')
@endif
@endsection