
@php
    $arg_aside= array(
        'admin.dashboard.index',
    );
    $active = '';
    $menuOpen = '';
    if ( in_array($name, $arg_aside) ) {
        $active = 'active';
        $menuOpen = 'menu-open';
    }
@endphp
<li class="nav-item {{ $menuOpen }}">
    <a href="{{ route('admin.dashboard.index') }}" class="nav-link {{ $active }}">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Dashboard
      </p>
    </a>
</li>