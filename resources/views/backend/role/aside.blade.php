@php
$arg_aside= array(
  'admin.roles.index',
  'admin.roles.create',
  'admin.roles.edit',
);
$active = '';
if ( in_array($name, $arg_aside) ) {
$active = 'active';
}
@endphp
<li class="nav-item">
  <a href="{{ route('admin.roles.index') }}" class="nav-link {{ $active }}">
    <i class="nav-icon fas fa-user-tag"></i>
    <p>
      Quản lý vai trò
    </p>
  </a>
</li>