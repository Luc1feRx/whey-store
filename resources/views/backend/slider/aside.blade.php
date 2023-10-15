@php
$arg_aside= array(
'admin.brands.index',
// 'admin.categories.create',
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
      Quản lý thương hiệu
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.brands.index') }}"
        class="nav-link {{ Request::routeIs('admin.brands.index') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Danh sách thương hiệu</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.brands.create') }}" class="nav-link {{ Request::routeIs('admin.brands.create') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Thêm mới thương hiệu</p>
      </a>
    </li>
  </ul>
</li>