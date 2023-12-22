@extends('frontend.layouts.master')

@section('addCss')
    <style>
        .btn_remove_image{
            position: absolute;
            top: 30px;
            right: -11px;
            font-size: 20px;
        }

        .preview-image-wrapper{
            text-align: center;
        }

        .preview-image{
            width: 100%;
            margin-bottom: 10px;
        }
        .preview_image{
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('content')
<div class="container">

    <nav class="woocommerce-breadcrumb"><a href="home.html">Trang chủ</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>{{ trans('message.profile.title') }}</nav>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <article class="post-2508 page type-page status-publish hentry" id="post-2508">
                <div itemprop="mainContentOfPage" class="entry-content">
                    <div class="vc_row-full-width vc_clearfix"></div>
                    <form class="wpcf7-form" method="POST" action="{{ route('home.update-profile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="vc_row wpb_row vc_row-fluid">
                        <div class="contact-form wpb_column vc_column_container vc_col-sm-9 col-sm-9">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper">
                                    <div class="wpb_text_column wpb_content_element ">
                                        <div class="wpb_wrapper">
                                            <h2 class="contact-page-title">{{ trans('message.profile.title') }}</h2>
                                        </div>
                                    </div>
                                    <div lang="en-US" dir="ltr" id="wpcf7-f2507-p2508-o1" class="wpcf7" role="form">
                                        <div class="screen-reader-response"></div>
                                            <div class="form-group row">
                                                <div class="col-xs-12 col-md-6">
                                                    <label>First name</label><br>
                                                    <span class="wpcf7-form-control-wrap first-name"><input type="text" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" size="40" value="{{ auth()->user()->first_name }}" name="first_name"></span>
                                                    @error('first_name')
                                                    <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-xs-12 col-md-6">
                                                    <label>Last name</label><br>
                                                    <span class="wpcf7-form-control-wrap last-name"><input type="text" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" size="40" value="{{ auth()->user()->last_name }}" name="last_name"></span>
                                                    @error('last_name')
                                                    <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xs-12 col-md-6">
                                                    <label>Phone</label><br>
                                                    <span class="wpcf7-form-control-wrap first-name"><input type="text" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" size="40" value="{{ auth()->user()->phone }}" name="phone"></span>
                                                    @error('phone')
                                                    <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-xs-12 col-md-6">
                                                    <label>Address</label><br>
                                                    <span class="wpcf7-form-control-wrap last-name"><input type="text" aria-invalid="false" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" size="40" value="{{ auth()->user()->address }}" name="address"></span>
                                                    @error('address')
                                                    <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label><br>
                                                <span class="wpcf7-form-control-wrap subject"><input type="text" aria-invalid="false" class="wpcf7-form-control wpcf7-text input-text" size="40" value="{{ auth()->user()->email }}" name="email"></span>
                                            </div>
                                            @error('email')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="password-checkbox" onclick="openInputPassword()">
                                                    <label class="form-check-label" style="margin-bottom: 10px">{{ trans('message.profile.changePassword') }}</label>
                                                </div>
                                                <input type="text" style="display:none" class="form-control" id="password" placeholder="Nhập password"
                                                    name="password"
                                                    value="{{ old('password') }}">
                                                @error('password')
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group clearfix">

                                                <p><input type="submit" value="Lưu"></p>

                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="store-info wpb_column vc_column_container vc_col-sm-3 col-sm-3">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper">
                                    <input type="hidden" name="old_thumbnail" value="" class="old_thumbnail">
                                    <div class="wpb_text_column wpb_content_element ">
                                        <div class="wpb_wrapper">
                                            <h2 class="contact-page-title">{{ trans('message.profile.choose_image') }}</h2>
                                            <div class="form-group row">
                                                <div class="col-xs-12">
                                                    <div class="parent-thumbnail">
                                                        <div class="preview-image-wrapper ">
                                                            <div class="form-group">
                                                                <input type="file" name="avatar" id="thumbnail" style="display: none" class="form-control btn_gallery d-none" placeholder="" value="" accept="images/*">
                                                            </div>
                                                            <img
                                                                src="{{ !empty(auth()->user()->avatar) ? asset('storage/' .auth()->user()->avatar) : asset('backend\dist\img\placeholder.png') }}"
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </article>
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .container -->
@endsection

@section('addJs')
    <script>
        function preViewImage(parent, old) {
            parent.find(".preview_image").click(function (e) {
                parent.find('.btn_gallery').attr('value', '');
                parent.find(".btn_gallery").trigger('click');
            });
            parent.find('.btn_gallery').change(function (e) {
                let file = e.target.files[0];
                if (file && file.type.startsWith("image/")) {
                    parent.find('.preview_image').attr('src', URL.createObjectURL(e.target.files[0]));
                } else {
                    parent.find('.btn_gallery').val('');
                    old.val('');
                }
            });
            parent.find('.btn_remove_image').click(function (e) {
                parent.find('.btn_gallery').val('');
                old.val('');
            })
        }
        function openInputPassword() {
        // Get the checkbox
            var checkBox = document.getElementById("password-checkbox");
            // Get the output text
            var password = document.getElementById("password");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
                password.style.display = "block";
            } else {
                password.style.display = "none";
            }
        }
        preViewImage(jQuery('.parent-thumbnail'), jQuery('.old_thumbnail'));
    </script>
@endsection