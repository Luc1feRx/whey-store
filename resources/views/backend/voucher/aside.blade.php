@php
$arg_aside= array(
'admin.vouchers.index',
'admin.vouchers.create',
'admin.vouchers.edit',
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
    <i class="nav-icon fas fa-tags"></i>
    <p>
      Quản lý mã giảm giá
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.vouchers.index') }}"
        class="nav-link {{ Request::routeIs('admin.vouchers.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>Danh sách mã giảm giá</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.vouchers.create') }}" class="nav-link {{ Request::routeIs('admin.vouchers.create') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Thêm mới mã giảm giá</p>
      </a>
    </li>
  </ul>
</li>