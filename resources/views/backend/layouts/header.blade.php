<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="display: flex;
justify-content: space-between;
">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            @php
                $user = Auth::guard('admin')->user();
            @endphp
            <li class="dropdown user user-menu">
                <a href="javascript:void(0)" style="color: white;" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('storage/'.auth()->guard('admin')->user()->avatar) }}" class="user-image" alt="User Image">
                    <span class="hidden-xs">{{ $user->name ?? 'HSBA - Beetech' }}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{ asset('storage/'.auth()->guard('admin')->user()->avatar) }}" class="img-circle" alt="User Image">
                        <p>
                            <small style="font-size: 20px">{{ $user->name ?? 'HSBA - Beetech' }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer" style="display: flex; justify-content: space-between;">
                        <div class="pull-left">
                            <a target="_blank" href="#" class="btn btn-info btn-flat">
                                Xem website
                            </a>
                        </div>
                        <div class="pull-right" style="margin-left: 53px;">
                            <a href="" class="btn btn-warning btn-flat" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                Đăng xuất
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- /.navbar -->