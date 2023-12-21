@php
$arg_aside= array(
'admin.customers.index',
'admin.customers.create',
'admin.customers.edit',
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
    <i class="nav-icon fas fa-people-arrows"></i>
    <p>
      Quản lý khách hàng
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.customers.index') }}"
        class="nav-link {{ Request::routeIs('admin.customers.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>Danh sách khách hàng</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.customers.create') }}" class="nav-link {{ Request::routeIs('admin.customers.create') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Thêm mới khách hàng</p>
      </a>
    </li>
  </ul>
</li>