@php
$arg_aside= array(
'admin.accounts.index',
);
$active = '';
if ( in_array($name, $arg_aside) ) {
$active = 'active';
}
@endphp
<li class="nav-item">
  <a href="{{ route('admin.accounts.index') }}" class="nav-link {{ $active }}">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Quản lý tài khoản
    </p>
  </a>
</li>