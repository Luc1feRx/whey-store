@extends('backend.layouts.master')

@section('title') Thông tin cá nhân @stop

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2" style="display:flex !important">
                    @include('backend.partials.breadcrumb',
                    [
                    'breadcrumb'=> [
                    ['title' => 'Thông tin cá nhân', 'url' => route('admin.profile.index')],
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
                        <form action="" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <input type="hidden" name="old_thumbnail" value="" class="old_thumbnail">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Họ và tên</label>
                                                            <input type="text" class="form-control" placeholder="Nhập họ tên"
                                                                name="name"
                                                                value="{{ old('name', auth()->guard('admin')->user()->name ?? '') }}">
                                                            @error('name')
                                                            <span class="error">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Password</label>
                                                            <input type="text" class="form-control" placeholder="Nhập password"
                                                                name="password"
                                                                value="{{ old('password') }}">
                                                            @error('password')
                                                            <span class="error">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Địa chỉ</label>
                                                            <input type="text" class="form-control" placeholder="Nhập địa chỉ"
                                                                name="address"
                                                                value="{{ old('address', auth()->guard('admin')->user()->address ?? '') }}">
                                                            @error('address')
                                                            <span class="error">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Số điện thoại</label>
                                                            <input type="text" class="form-control" placeholder="Nhập số điện thoại"
                                                                name="phone"
                                                                value="{{ old('phone', auth()->guard('admin')->user()->phone ?? '') }}">
                                                            @error('phone')
                                                            <span class="error">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Hành động
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <button type="submit" type="submit" name="btnSubmit" value="save" class="btn btn-primary submit btnCreate">
                                                    <i class="fa fa-save"></i> {{ isset($post) ? 'Sửa' : 'Thêm' }}
                                                </button>
                                                <input name="router" type="hidden" value="" id="router">
                                            </div>
                                        </div>
                            
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Chọn ảnh
                                                </h3>
                                            </div>
                                            <div class="card-body parent-thumbnail">
                                                <div class="preview-image-wrapper ">
                                                    <div class="form-group">
                                                        <input type="file" name="avatar" id="thumbnail" class="form-control btn_gallery d-none" placeholder="" value="" accept="images/*">
                                                    </div>
                                                    <img
                                                        src="{{ !empty(auth()->guard('admin')->user()->avatar) ? asset('storage/' .auth()->guard('admin')->user()->phone) : asset('backend\dist\img\placeholder.png') }}"
                                                        alt="Preview image" class="preview_image" width="150">
                                                    <a class="btn_remove_image" title="Remove image">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                    <div class="mx-auto cursor-pointer position-relative mt-1">
                                                        <button id="btn-avatar" type="button" class="btn btn-primary w-full preview_image" aria-invalid="false" style="width: 100%">Chọn ảnh</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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