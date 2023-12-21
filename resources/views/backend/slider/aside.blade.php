@php
$arg_aside= array(
'admin.sliders.index',
'admin.sliders.create',
'admin.sliders.edit',
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
    <i class="nav-icon fas fa-ring"></i>
    <p>
      Quản lý Slider
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.sliders.index') }}"
        class="nav-link {{ Request::routeIs('admin.sliders.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>Danh sách Slider</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.sliders.create') }}" class="nav-link {{ Request::routeIs('admin.sliders.create') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Thêm mới Slider</p>
      </a>
    </li>
  </ul>
</li>