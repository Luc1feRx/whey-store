@php
$arg_aside= array(
'admin.good-issues.index',
'admin.good-issues.list'
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
    <i class="nav-icon fas fa-file-import"></i>
    <p>
      Quản lý xuất nhập hàng
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.good-issues.index') }}"
        class="nav-link {{ Request::routeIs('admin.good-issues.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Nhập xuất hàng</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.good-issues.list') }}" class="nav-link {{ Request::routeIs('admin.good-issues.list') ? 'active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>Danh sách tồn hàng</p>
      </a>
    </li>
  </ul>
</li>