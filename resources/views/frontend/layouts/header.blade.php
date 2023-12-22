<div class="top-bar">
    <div class="container">
        <nav>
            <ul id="menu-top-bar-right" class="nav nav-inline pull-right animate-dropdown flip">
                <li class="menu-item animate-dropdown"><a title="Track Your Order" href="{{ route('home.trackOrder') }}"><i class="ec ec-transport"></i>{{ trans('message.trackYourOrder') }}</a></li>
                @if (!Auth::check())
                    <li class="menu-item animate-dropdown"><a title="My Account" href="{{ route('home.login-view') }}"><i class="ec ec-user"></i>{{ trans('message.login') }}</a></li>
                    <li class="menu-item animate-dropdown"><a title="My Account" href="{{ route('home.register-view') }}"><i class="ec ec-user"></i>{{ trans('message.register') }}</a></li>
                @else
                <li class="menu-item animate-dropdown"><a title="My Account" href="{{ route('home.profile') }}"><i class="ec ec-user"></i>{{ Auth::user()->name }}</a></li>
                    <li class="menu-item animate-dropdown" onclick="event.preventDefault();
                    document.getElementById('logout-user').submit();"><a title="Logout" style="cursor: pointer !important"><i class="ec ec-user"></i>{{ trans('message.logout') }}</a></li>
                    <form id="logout-user" action="{{ route('home.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif
            </ul>
        </nav>
    </div>
</div><!-- /.top-bar -->
<header id="masthead" class="site-header header-v2">
    <div class="container">
        <div style="display: flex; align-items: center" class="row">

            <!-- ============================================================= Header Logo ============================================================= -->
            <div class="header-logo">
                <a href="{{ route('home.index') }}" class="header-logo-link">
                    <img style="width: 100px" src="{{ asset('frontend/assets/images/love-fitness-gym-logo-design-template-design-gym-fitness-club-vector-illustration_722324-99.avif') }}" alt="">
                </a>
            </div> 
            <!-- ============================================================= Header Logo : End============================================================= -->

            <div class="primary-nav animate-dropdown">
                <div class="clearfix">
                     <button class="navbar-toggler hidden-sm-up pull-right flip" type="button" data-toggle="collapse" data-target="#default-header">
                            &#9776;
                     </button>
                 </div>

                <div class="collapse navbar-toggleable-xs" id="default-header">
                    <nav>
                        <ul id="menu-main-menu" class="nav nav-inline yamm">
                            <li class="menu-item menu-item-has-children animate-dropdown dropdown"><a title="Home" href="shop.html" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Home</a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="menu-item animate-dropdown  "><a title="Home v1" href="home.html">Home v1</a></li>
                                    <li class="menu-item current-menu-item current_page_item animate-dropdown active"><a title="Home v2" href="home-v2.html">Home v2</a></li>
                                    <li class="menu-item animate-dropdown  "><a title="Home v3" href="home-v3.html">Home v3</a></li>
                                </ul>
                            </li>
                            <li class="menu-item animate-dropdown"><a title="About Us" href="about.html">About Us</a></li>

                            <li class="menu-item menu-item-has-children animate-dropdown dropdown"><a title="Blog" href="blog.html" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Blog</a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="menu-item animate-dropdown"><a title="Blog v1" href="blog-v1.html">Blog v1</a></li>
                                    <li class="menu-item animate-dropdown"><a title="Blog v2" href="blog-v2.html">Blog v2</a></li>
                                    <li class="menu-item animate-dropdown"><a title="Blog v3" href="blog-v3.html">Blog v3</a></li>
                                </ul>
                            </li>
                            <li class="yamm-fw menu-item menu-item-has-children animate-dropdown dropdown">
                                <a title="Pages" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Pages</a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="menu-item animate-dropdown">
                                        <div class="yamm-content" style="display:inline-block; width: 100%;">
                                            <div class="row">
                                                <div class="wpb_column vc_column_container col-sm-4">
                                                    <div class="vc_column-inner ">
                                                        <div class="wpb_wrapper">
                                                            <div class="vc_wp_custommenu wpb_content_element">
                                                                <div class="widget widget_nav_menu">
                                                                    <div class="menu-pages-menu-1-container">
                                                                        <ul id="menu-pages-menu-1" class="menu">
                                                                            <li class="nav-title menu-item"><a href="#">Home &#038; Static Pages</a></li>
                                                                            <li class="menu-item"><a href="home.html">Home v1</a></li>
                                                                            <li class="menu-item current-menu-item current_page_item"><a href="home-v2.html">Home v2</a></li>
                                                                            <li class="menu-item"><a href="home-v3.html">Home v3</a></li>
                                                                            <li class="menu-item"><a href="about.html">About</a></li>
                                                                            <li class="menu-item"><a href="contact-v2.html">Contact v2</a></li>
                                                                            <li class="menu-item"><a href="contact-v1.html">Contact v1</a></li>
                                                                            <li class="menu-item"><a href="faq.html">FAQ</a></li>
                                                                            <li class="menu-item"><a href="store-directory.html">Store Directory</a></li>
                                                                            <li class="menu-item"><a href="terms-and-conditions.html">Terms and Conditions</a></li>
                                                                            <li class="menu-item"><a href="404.html">404</a></li>
                                                                            <li class="nav-title menu-item"><a href="#">Product Categories</a></li>
                                                                            <li class="menu-item"><a href="cat-3-col.html">3 Column Sidebar</a></li>
                                                                            <li class="menu-item"><a href="cat-4-col.html">4 Column Sidebar</a></li>
                                                                            <li class="menu-item"><a href="cat-4-fw.html">4 Column Full width</a></li>
                                                                            <li class="menu-item"><a href="product-category-6-column.html">6 Columns Full width</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wpb_column vc_column_container col-sm-4">
                                                    <div class="vc_column-inner ">
                                                        <div class="wpb_wrapper">
                                                            <div class="vc_wp_custommenu wpb_content_element">
                                                                <div class="widget widget_nav_menu">
                                                                    <div class="menu-pages-menu-2-container">
                                                                        <ul id="menu-pages-menu-2" class="menu">
                                                                            <li class="nav-title menu-item"><a href="#">Shop Pages</a></li>
                                                                            <li class="menu-item"><a href="shop.html#grid">Shop Grid</a></li>
                                                                            <li class="menu-item"><a href="shop.html#grid-extended">Shop Grid Extended</a></li>
                                                                            <li class="menu-item"><a href="shop.html#list-view">Shop List View</a></li>
                                                                            <li class="menu-item"><a href="shop.html#list-view-small">Shop List View Small</a></li>
                                                                            <li class="menu-item"><a href="shop.html">Shop Left Sidebar</a></li>
                                                                            <li class="menu-item"><a href="shop-fw.html">Shop Full width</a></li>
                                                                            <li class="menu-item"><a href="shop-right-side-bar.html">Shop Right Sidebar</a></li>
                                                                            <li class="nav-title menu-item"><a href="#">Blog Pages</a></li>
                                                                            <li class="menu-item"><a href="blog-v1.html">Blog v1</a></li>
                                                                            <li class="menu-item"><a href="blog-v3.html">Blog v3</a></li>
                                                                            <li class="menu-item"><a href="blog-v2.html">Blog v2</a></li>
                                                                            <li class="menu-item"><a href="blog-fw.html">Blog Full Width</a></li>
                                                                            <li class="menu-item"><a href="blog-single.html">Single Blog Post</a></li>

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wpb_column vc_column_container col-sm-4">
                                                    <div class="vc_column-inner ">
                                                        <div class="wpb_wrapper">
                                                            <div class="vc_wp_custommenu wpb_content_element">
                                                                <div class="widget widget_nav_menu">
                                                                    <div class="menu-pages-menu-3-container">
                                                                        <ul id="menu-pages-menu-3" class="menu">
                                                                            <li class="nav-title menu-item"><a href="single-product.html">Single Product Pages</a></li>
                                                                            <li class="menu-item"><a href="single-product-extended.html">Single Product Extended</a></li>
                                                                            <li class="menu-item"><a href="single-product.html">Single Product Fullwidth</a></li>
                                                                            <li class="menu-item"><a href="single-product-sidebar.html">Single Product Sidebar</a></li>
                                                                            <li class="menu-item"><a href="single-product-sidebar-accessories.html">Single Product Sidebar Accessories </a></li>
                                                                            <li class="menu-item"><a href="single-product-sidebar-specification.html">Single Product Sidebar Specification </a></li>
                                                                            <li class="menu-item"><a href="single-product-sidebar-reviews.html">Single Product Sidebar Reviews </a></li>
                                                                            <li class="nav-title menu-item"><a href="#">Ecommerce Pages</a></li>
                                                                            <li class="menu-item"><a href="shop.html">Shop</a></li>
                                                                            <li class="menu-item"><a href="cart.html">Cart</a></li>
                                                                            <li class="menu-item"><a href="checkout.html">Checkout</a></li>
                                                                            <li class="menu-item"><a href="my-account.html">My Account</a></li>
                                                                            <li class="menu-item"><a href="compare.html">Compare</a></li>
                                                                            <li class="menu-item"><a href="wishlist.html">Wishlist</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item"><a title="Features" href="#">Features</a></li>
                            <li class="menu-item"><a title="Contact Us" href="#">Contact Us</a></li>
                        </ul>
                    </nav>   
                </div>
            </div>

            <div class="header-support-info">
                <div class="media">
                    <div class="media-body" style="display: flex;">
                        <a href="{{ route('home.lang', ['lang'=>'vi']) }}"><img style="width: 50px; margin-right: 20px" src="{{ asset('frontend/assets/images/icons/vietnam.png') }}" alt=""></a>
                        <a href="{{ route('home.lang', ['lang'=>'en']) }}"><img style="width: 50px" src="{{ asset('frontend/assets/images/icons/united-states.png') }}" alt=""></a>
                    </div>
                </div>
            </div>

        </div><!-- /.row -->
    </div>
</header><!-- #masthead -->

<nav class="navbar navbar-primary navbar-full">
    <div class="container">
        <ul class="nav navbar-nav departments-menu animate-dropdown">
            <li class="nav-item dropdown ">

                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="departments-menu-toggle" >{{ trans('message.categories') }}</a>
                <ul id="menu-vertical-menu" class="dropdown-menu yamm departments-menu-dropdown">

                    @foreach ($rootCategories as $category)
                        @if($category->children && count($category->children) > 0)
                            <li class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown">
                                <a title="Computers &amp; Accessories" data-hover="dropdown" href="{{ route('home.category', ['slug'=>$category->slug_category]) }}" data-toggle="dropdown" class="custom-dropdown-link dropdown-toggle" aria-haspopup="true">{{ $category->name_category }}</a>
                                <ul role="menu" class=" dropdown-menu">
                                    @include('frontend.partials.categories', ['categories' => $category->children, 'category' => $category])
                                </ul>
                            </li>
                        @else
                            <li class="yamm-tfw menu-item">
                                <a href="{{ route('home.category', ['slug'=>$category->slug_category]) }}" aria-haspopup="true">{{ $category->name_category }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
        </ul>
        <form class="navbar-search" method="get" action="{{ route('home.search') }}">
            <div class="input-group">
                <input type="text" id="" class="form-control search-field" name="keyword" placeholder="Search for products" />
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-secondary"><i class="ec ec-search"></i></button>
                </div>
            </div>
        </form>

        <ul class="navbar-mini-cart navbar-nav animate-dropdown nav pull-right flip">
            <li class="nav-item">
                <a href="{{ route('home.cart') }}" class="nav-link">
                    <i class="ec ec-shopping-bag"></i>
                    @include('frontend.cart.cartShopping')
                </a>
            </li>
        </ul>

        <ul class="navbar-wishlist nav navbar-nav pull-right flip">
            <li class="nav-item">
                <a href="{{ route('home.favouriteList') }}" class="nav-link"><i class="ec ec-favorites"></i></a>
            </li>
        </ul>
    </div>
</nav>