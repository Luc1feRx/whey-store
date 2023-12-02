@php
$arg_aside= array(
'admin.products.index',
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
      Quản lý sản phẩm
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.products.index') }}"
        class="nav-link {{ Request::routeIs('admin.categories.index') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Danh sách sản phẩm</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.products.create') }}" class="nav-link {{ Request::routeIs('admin.products.create') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Thêm mới sản phẩm</p>
      </a>
    </li>
  </ul>
</li>