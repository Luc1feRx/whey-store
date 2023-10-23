<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="display: grid;
grid-template-columns: 1481px 37fr 329px;
grid-gap: 62px;
">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    {{-- <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-users mr-2"></i> Đăng xuất
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
    </ul> --}}
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            @php
                $user = Auth::guard('admin')->user();
            @endphp
            <li class="dropdown user user-menu">
                <a href="javascript:void(0)" style="color: white;" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                    <span class="hidden-xs">{{ $user->name ?? 'HSBA - Beetech' }}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
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