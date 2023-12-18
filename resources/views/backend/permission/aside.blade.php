@php
$arg_aside= array(
'admin.permissions.index',
'admin.permissions.create',
'admin.permissions.edit',
);
$active = '';
if ( in_array($name, $arg_aside) ) {
$active = 'active';
}
@endphp
<li class="nav-item">
  <a href="{{ route('admin.permissions.index') }}" class="nav-link {{ $active }}">
    <i class="nav-icon fas fa-pen-square"></i>
    <p>
      Quản lý quyền
    </p>
  </a>
</li>