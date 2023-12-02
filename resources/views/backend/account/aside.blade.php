@php
$arg_aside= array(
'admin.accounts.index',
'admin.accounts.create',
'admin.accounts.edit',
);
$active = '';
$is_open = '';
if ( in_array($name, $arg_aside) ) {
$active = 'active';
$is_open = 'menu-open';
}
@endphp
<li class="nav-item {{ $is_open }}">
  <a href="#" class="nav-link {{ $active }}">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Quản lý tài khoản
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.accounts.index') }}"
        class="nav-link {{ Request::routeIs('admin.accounts.index') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Danh sách tài khoản</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.accounts.create') }}" class="nav-link {{ Request::routeIs('admin.accounts.create') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Thêm mới tài khoản</p>
      </a>
    </li>
  </ul>
</li>