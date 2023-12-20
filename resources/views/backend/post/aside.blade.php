@php
$arg_aside= array(
'admin.posts.index',
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
    <i class="nav-icon fas fa-blog"></i>
    <p>
      Quản lý tin tức
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.posts.index') }}"
        class="nav-link {{ Request::routeIs('admin.posts.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>Danh sách tin tức</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.posts.create') }}" class="nav-link {{ Request::routeIs('admin.posts.create') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Thêm mới tin tức</p>
      </a>
    </li>
  </ul>
</li>