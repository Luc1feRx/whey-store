@extends('backend.auth.layouts.master')

@section('title', "Đăng nhập")

@section('content')
<div class="login-box">
    {{-- <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div> --}}
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
           <div style="display: flex; justify-content: center">
            <img style="width: 150px" src="{{ asset('frontend\assets\images\love-fitness-gym-logo-design-template-design-gym-fitness-club-vector-illustration_722324-99.avif') }}" alt="">
           </div>

            <form action="{{ route('admin.login') }}" method="POST">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-5">
                        <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            {{-- <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                </a>
            </div> --}}
            <!-- /.social-auth-links -->
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection