
@php
    $arg_aside= array(
        'admin.profile.index',
    );
    $active = '';
    $menuOpen = '';
    if ( in_array($name, $arg_aside) ) {
        $active = 'active';
        $menuOpen = 'menu-open';
    }
@endphp
<li class="nav-item {{ $menuOpen }}">
    <a href="{{ route('admin.profile.index') }}" class="nav-link {{ $active }}">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Thông tin cá nhân
      </p>
    </a>
</li>