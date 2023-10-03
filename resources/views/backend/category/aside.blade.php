
@php
    $arg_sidebar = array(
        'admin.categories.index',
    );
    $active = '';
    if ( in_array($name, $arg_sidebar) ) {
        $active = 'active';
    }
@endphp
<li class="nav-item {{ $active }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="{{ $active ? 'true' : 'false'}}"
        aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Quản lý danh mục</span>
    </a>
    <div id="collapseCategory" class="collapse {{ $active ? 'show': '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Quản lý danh mục:</h6>
            <a class="collapse-item {{ Request::routeIs('admin.categories.index') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">Danh sách danh mục</a>
            <a class="collapse-item" href="cards.html">Thêm danh mục</a>
        </div>
    </div>
</li>