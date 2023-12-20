  @php
        $name = Route::currentRouteName();
  @endphp
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard.index') }}" class="brand-link">
      <img src="{{ asset('frontend\assets\images\love-fitness-gym-logo-design-template-design-gym-fitness-club-vector-illustration_722324-99.avif') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">WheyStore</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('storage/'.auth()->guard('admin')->user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->guard('admin')->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            @include('backend.dashboard.aside')
            @include('backend.profile.aside')
            @include('backend.customer.aside')
            @if (Auth::guard('admin')->user()->hasPermissionTo('manage decentralized'))
              @include('backend.role.aside')
              @include('backend.permission.aside')
              @include('backend.account.aside')
              @include('backend.import-export-good.aside')
            @endif
            @include('backend.product.aside')
            @include('backend.category.aside')
            @include('backend.brand.aside')
            @include('backend.order.aside')
            @include('backend.slider.aside')
            @include('backend.post.aside')
            @include('backend.voucher.aside')
            @include('backend.comment.aside')
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>