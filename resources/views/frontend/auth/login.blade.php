@extends('frontend.layouts.master')

@section('content')
<div class="page home page-template-default">
    <div id="page" class="hfeed site">
        <a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
        <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

        <div id="content" class="site-content" tabindex="-1">
            <div class="container">

                <nav class="woocommerce-breadcrumb" ><a href="{{ route('home.index') }}">{{ trans('message.home') }}</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>My Account</nav><!-- .woocommerce-breadcrumb -->

                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <article id="post-8" class="hentry">

                            <div class="entry-content">
                                <div class="woocommerce">
                                    <div class="customer-login-form">
                                        <span class="or-text">or</span>

                                        <div class="col2-set" id="customer_login">

                                            <div class="col-1">


                                                <h2>{{ trans('message.login') }}</h2>

                                                <form method="post" class="login" action="{{ route('home.login') }}">
                                                    {{ csrf_field() }}
                                                    <p class="form-row form-row-wide">
                                                        <label for="email">Email<span class="required">*</span></label>
                                                        <input type="text" class="input-text" name="email" id="email" placeholder="{{ trans('message.inputEmail') }}" />
                                                        @error('email')
                                                            <span class="error" style="color: red">{{ $message }}</span>
                                                        @enderror
                                                    </p>

                                                    <p class="form-row form-row-wide">
                                                        <label for="password">Password<span class="required">*</span></label>
                                                        <input class="input-text" type="password" name="password" id="password" placeholder="{{ trans('message.inputPassword') }}" />
                                                        @error('password')
                                                            <span class="error" style="color: red">{{ $message }}</span>
                                                        @enderror
                                                    </p>

                                                    <p class="form-row">
                                                        <input class="button" type="submit" value="{{ trans('message.login') }}">
                                                    </p>

                                                    <p class="lost_password"><a href="login-and-register.html">{{ trans('message.lost-password') }}</a></p>

                                                </form>


                                            </div><!-- .col-1 -->

                                            @include('frontend.auth.register')

                                        </div><!-- .col2-set -->

                                    </div><!-- /.customer-login-form -->
                                </div><!-- .woocommerce -->
                            </div><!-- .entry-content -->

                        </article><!-- #post-## -->

                    </main><!-- #main -->
                </div><!-- #primary -->

            </div><!-- .col-full -->
        </div><!-- #content -->
    </div>
@endsection