@php
$arg_aside= array(
'admin.good-issues.index',
// 'admin.sliders.create',
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
      Quản lý xuất nhập hàng
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.good-issues.index') }}"
        class="nav-link {{ Request::routeIs('admin.good-issues.index') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Nhập xuất hàng</p>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a href="{{ route('admin.sliders.create') }}" class="nav-link {{ Request::routeIs('admin.sliders.create') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Thêm mới Slider</p>
      </a>
    </li> --}}
  </ul>
</li>