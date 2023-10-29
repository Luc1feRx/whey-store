@extends('backend.layouts.master')

@section('title') Thêm mới sản phẩm @stop

@section('addCss')
<link rel="stylesheet" href="{{ asset('backend\plugins\select2\css\select2.css') }}">
<link rel="stylesheet" href="{{ asset('backend\plugins\select2-bootstrap4-theme\select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend\plugins\summernote\summernote.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend\plugins\summernote\summernote-bs4.css') }}">
<link
    href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
    rel="stylesheet"
/>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tạo mới sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    @include('backend.partials.breadcrumb',
                    [
                    'breadcrumb'=> [
                    ['title' => 'Danh sách sản phẩm', 'url' => route('admin.products.index')],
                    ['title' => 'Tạo sản phẩm', 'url' => '#']
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
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('backend.product.form')
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
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script>
        $('#images').on('change', function(e) {
            $('#image-preview').html(''); // Clear previous previews
            var files = e.target.files;

            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var reader = new FileReader();

                reader.onload = function(e) {
                    var img = $('<img>').addClass('preview-image').attr('src', e.target.result);
                    $('#image-preview').append(img);
                };

                reader.readAsDataURL(file);
            }
        });
    $('.select2-common').select2({
      theme: 'bootstrap4'
    })
    var getplaceSelect = $(this).data("placeholder");
    $('.select2-common-multiple').select2({
        placeholder: getplaceSelect,
        allowClear: true,
        theme: 'bootstrap4',
        liveSearch: true
    });
</script>
@include('backend.post.script')
@if (session('error'))
    @include('backend.layouts.toastr')
@endif
@endsection