@php
$arg_aside= array(
'admin.brands.index',
'admin.brands.create',
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
    <i class="nav-icon fab fa-bandcamp"></i>
    <p>
      Quản lý thương hiệu
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.brands.index') }}"
        class="nav-link {{ Request::routeIs('admin.brands.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>Danh sách thương hiệu</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.brands.create') }}" class="nav-link {{ Request::routeIs('admin.brands.create') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Thêm mới thương hiệu</p>
      </a>
    </li>
  </ul>
</li>