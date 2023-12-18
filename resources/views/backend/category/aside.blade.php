@php
$arg_aside= array(
'admin.categories.index',
'admin.categories.create',
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
    <i class="nav-icon fas fa-calendar-plus"></i>
    <p>
      Quản lý danh mục
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.categories.index') }}"
        class="nav-link {{ Request::routeIs('admin.categories.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>Danh sách danh mục</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.categories.create') }}" class="nav-link {{ Request::routeIs('admin.categories.create') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Thêm mới danh mục</p>
      </a>
    </li>
  </ul>
</li>