@php
$arg_aside= array(
'admin.orders.index',
);
$active = '';
if ( in_array($name, $arg_aside) ) {
$active = 'active';
}
@endphp
<li class="nav-item">
  <a href="{{ route('admin.orders.index') }}" class="nav-link {{ $active }}">
    <i class="nav-icon fas fa-money-check-alt"></i>
    <p>
      Quản lý đơn hàng
    </p>
  </a>
</li>