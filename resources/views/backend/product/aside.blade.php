@php
$arg_aside= array(
'admin.products.index',
'admin.products.create',
'admin.products.edit',
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
    <i class="nav-icon fas fa-dumbbell"></i>
    <p>
      Quản lý sản phẩm
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.products.index') }}"
        class="nav-link {{ Request::routeIs('admin.products.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>Danh sách sản phẩm</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.products.create') }}" class="nav-link {{ Request::routeIs('admin.products.create') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Thêm mới sản phẩm</p>
      </a>
    </li>
  </ul>
</li>