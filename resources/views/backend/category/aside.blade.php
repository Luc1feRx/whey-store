@php
$arg_aside= array(
'admin.categories.index',
'admin.categories.create',
);
$active = '';
if ( in_array($name, $arg_aside) ) {
$active = 'active';
}
@endphp
<li class="nav-item menu-open">
  <a href="#" class="nav-link {{ $active }}">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Quản lý danh mục
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.categories.index') }}"
        class="nav-link {{ Request::routeIs('admin.categories.index') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Danh sách danh mục</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.categories.create') }}" class="nav-link {{ Request::routeIs('admin.categories.create') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Thêm mới danh mục</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="./index3.html" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Dashboard v3</p>
      </a>
    </li>
  </ul>
</li>