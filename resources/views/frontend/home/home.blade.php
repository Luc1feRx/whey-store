@extends('frontend.layouts.master')

@section('title')
    <title>{{ trans('message.home') }}</title>
@endsection

@section('content')
<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <div class="home-v2-slider" style="height: 500px !important;">
                    <!-- ========================================== SECTION – HERO : END========================================= -->

                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                        @foreach ($sliders as $slider)
                            <div class="item" style="background-image: url(storage/{{ $slider->thumbnail }}); height: 500px !important;"></div><!-- /.item -->
                        @endforeach
                    </div><!-- /.owl-carousel -->

                    <!-- ========================================= SECTION – HERO : END ========================================= -->

                </div><!-- /.home-v1-slider -->
                
                <section class="products-carousel-tabs animate-in-view fadeIn animated" data-animation="fadeIn">
                    <h2 class="sr-only">Product Carousel Tabs</h2>
                    <ul class="nav nav-inline">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab-products-1" data-toggle="tab">{{ trans('message.featured') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#tab-products-3" data-toggle="tab">{{ trans('message.top_rated') }}</a>
                        </li>
                    </ul><!-- /.nav -->

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-products-1" role="tabpanel">
                            <section class="section-products-carousel" >
                                <div class="home-v2-owl-carousel-tabs">
                                    <div class="woocommerce columns-3">


                                        <div class="products owl-carousel home-v2-carousel-tabs products-carousel columns-3">

                                            @foreach ($getProductFeatured as $key => $productFeatured)
                                                @php
                                                    $class = 'product'; // Default class for products in the middle
                                        
                                                    if ($key === 0) {
                                                        $class = 'product first'; // Add 'first' class to the first product
                                                    } elseif ($key === count($getProductFeatured) - 1) {
                                                        $class = 'product last'; // Add 'last' class to the last product
                                                    }else{
                                                        $class = 'product';
                                                    }
                                                @endphp

                                                <div class="{{ $class }}">
                                                    <div class="product-outer">
                                                        <div class="product-inner">
                                                            <a href="{{ route('home.product-detail', ['slug'=>$productFeatured->slug]) }}">
                                                                <h3>{{ $productFeatured->name }}</h3>
                                                                <div class="product-thumbnail">
                                                                    <img src="{{ !empty($productFeatured->thumbnail) ? asset('storage/' .$productFeatured->thumbnail) : asset('backend\dist\img\placeholder.png') }}" 
                                                                    data-echo="{{ !empty($productFeatured->thumbnail) ? asset('storage/' .$productFeatured->thumbnail) : asset('backend\dist\img\placeholder.png') }}" class="img-responsive" alt="">
                                                                </div>
                                                            </a>

                                                            <div class="price-add-to-cart">
                                                                <span class="price">
                                                                    <span class="electro-price">
                                                                        @if (!empty($productFeatured->discount_price))
                                                                            <ins><span class="amount"> {{ \App\Helpers\Common::numberFormat($productFeatured->discount_price) }} đ</span></ins>
                                                                            <del><span class="amount"> {{ \App\Helpers\Common::numberFormat($productFeatured->price) }} đ</span></del>
                                                                            <span class="amount"> </span>
                                                                        @else
                                                                            <ins><span class="amount"> </span></ins>
                                                                            <span class="amount"> {{ \App\Helpers\Common::numberFormat($productFeatured->price) }} đ</span>
                                                                        @endif
                                                                    </span>
                                                                </span>
                                                                <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">{{ trans('message.addToCart') }}</a>
                                                            </div><!-- /.price-add-to-cart -->

                                                            <div class="hover-area">
                                                                <div class="action-buttons">

                                                                    <a href="{{ route('home.addToFavorites', ['productId'=>$productFeatured->id]) }}" rel="nofollow" class="add_to_wishlist"> {{ trans('message.wishlist') }}</a>

                                                                </div>
                                                            </div>
                                                        </div><!-- /.product-inner -->
                                                    </div><!-- /.product-outer -->
                                                </div><!-- /.product -->
                                            @endforeach
                                        </div><!-- /.products -->
                                    </div>
                                </div>
                            </section>
                        </div><!-- /.tab-pane -->

                        <div class="tab-pane" id="tab-products-3" role="tabpanel">
                            <section class="section-products-carousel">
                                <div class="home-v2-owl-carousel-tabs">
                                    <div class="woocommerce columns-3">

                                        <div class="products owl-carousel home-v2-carousel-tabs products-carousel columns-3">
                                            @foreach ($getProductReview as $review_product)
                                                @php
                                                    $class = 'product'; // Default class for products in the middle
                                        
                                                    if ($key === 0) {
                                                        $class = 'product first'; // Add 'first' class to the first product
                                                    } elseif ($key === count($getProductReview) - 1) {
                                                        $class = 'product last'; // Add 'last' class to the last product
                                                    }else{
                                                        $class = 'product';
                                                    }
                                                @endphp

                                                <div class="{{ $class }}">
                                                    <div class="product-outer">
                                                        <div class="product-inner">
                                                            <a href="{{ route('home.product-detail', ['slug'=>$review_product->slug]) }}">
                                                                <h3>{{ $review_product->name }}</h3>
                                                                <div class="product-thumbnail">
                                                                    <img src="{{ !empty($review_product->thumbnail) ? asset('storage/' .$review_product->thumbnail) : asset('backend\dist\img\placeholder.png') }}" 
                                                                    data-echo="{{ !empty($review_product->thumbnail) ? asset('storage/' .$review_product->thumbnail) : asset('backend\dist\img\placeholder.png') }}" class="img-responsive" alt="">
                                                                </div>
                                                            </a>

                                                            <div class="price-add-to-cart">
                                                                <span class="price">
                                                                    <span class="electro-price">
                                                                        @if (!empty($review_product->percent))
                                                                            <ins><span class="amount"> {{ \App\Helpers\Common::numberFormat($review_product->discount_price) }} đ</span></ins>
                                                                            <del><span class="amount"> {{ \App\Helpers\Common::numberFormat($review_product->price) }} đ</span></del>
                                                                            <span class="amount"> </span>
                                                                        @else
                                                                            <ins><span class="amount"> {{ \App\Helpers\Common::numberFormat($review_product->price) }} đ</span></ins>
                                                                        @endif
                                                                    </span>
                                                                </span>
                                                                <a rel="nofollow" href="{{ route('home.product-detail', ['slug'=>$review_product->slug]) }}" class="button add_to_cart_button">{{ trans('message.addToCart') }}</a>
                                                            </div><!-- /.price-add-to-cart -->

                                                            <div class="hover-area">
                                                                <div class="action-buttons">

                                                                    <a href="#" rel="nofollow" class="add_to_wishlist"> {{ trans('message.wishlist') }}</a>

                                                                </div>
                                                            </div>
                                                        </div><!-- /.product-inner -->
                                                    </div><!-- /.product-outer -->
                                                </div><!-- /.product -->
                                            @endforeach
                                        </div><!-- /.products -->
                                    </div>
                                </div>
                            </section>
                        </div><!-- /.tab-pane -->
                    </div><!-- /.tab-content -->
                </section><!-- /.products-carousel-tabs -->

                @foreach ($getCategoryProduct as $categoryProduct)
                    <section class="home-v2-categories-products-carousel section-products-carousel animate-in-view fadeIn animated animation" data-animation="fadeIn">


                        <header>

                            <h2 class="h1">{{ $categoryProduct->name_category }}</h2>

                            <div class="owl-nav">
                                <a href="#products-carousel-prev" data-target="#products-carousel-57176fb2c4230" class="slider-prev"><i class="fa fa-angle-left"></i></a>
                                <a href="#products-carousel-next" data-target="#products-carousel-57176fb2c4230" class="slider-next"><i class="fa fa-angle-right"></i></a>
                            </div>

                        </header>


                        <div id="products-carousel-57176fb2c4230">
                            <div class="woocommerce">
                                <div class="products owl-carousel home-v2-categories-products products-carousel columns-6">

                                    @forelse ($categoryProduct->products as $productByCategory)
                                        <div class="product">
                                            <div class="product-outer">
                                                <div class="product-inner">
                                                    <a href="{{ route('home.product-detail', ['slug'=>$productByCategory->slug]) }}">
                                                        <h3>{{ $productByCategory->name }}</h3>
                                                        <div class="product-thumbnail">
                                                            <img src="{{ !empty($productByCategory->thumbnail) ? asset('storage/' .$productByCategory->thumbnail) : asset('backend\dist\img\placeholder.png') }}" 
                                                            data-echo="{{ !empty($productByCategory->thumbnail) ? asset('storage/' .$productByCategory->thumbnail) : asset('backend\dist\img\placeholder.png') }}" class="img-responsive" alt="">
                                                        </div>
                                                    </a>

                                                    <div class="price-add-to-cart">
                                                        <span class="price">
                                                            <span class="electro-price">
                                                                @if (!empty($productByCategory->discount_price))
                                                                    <ins><span class="amount"> {{ \App\Helpers\Common::numberFormat($productByCategory->discount_price) }} đ</span></ins>
                                                                    <del><span class="amount"> {{ \App\Helpers\Common::numberFormat($productByCategory->price) }} đ</span></del>
                                                                    <span class="amount"> </span>
                                                                @else
                                                                    <ins><span class="amount"> </span></ins>
                                                                    <span class="amount"> {{ \App\Helpers\Common::numberFormat($productByCategory->price) }} đ</span>
                                                                @endif
                                                            </span>
                                                        </span>
                                                        <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">{{ trans('message.addToCart') }}</a>
                                                    </div><!-- /.price-add-to-cart -->

                                                    <div class="hover-area">
                                                        <div class="action-buttons">

                                                            <a href="#" rel="nofollow" class="add_to_wishlist"> {{ trans('message.wishlist') }}</a>

                                                            <a href="compare.html" class="add-to-compare-link"> Compare</a>
                                                        </div>
                                                    </div>
                                                </div><!-- /.product-inner -->
                                            </div><!-- /.product-outer -->
                                        </div><!-- /.products -->
                                    @empty
                                        <div class="center-block" style="width: 866px">
                                            <div class="info-404">
                                                <div class="text-xs-center inner-bottom-xs">
                                                    <p class="lead">Nothing was found at this location. Try searching, or check out the links below.</p>
                                                    <hr class="m-y-2">
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse

                                </div>
                            </div>
                        </div>
                    </section>
                @endforeach

                <div class="home-v2-banner-block animate-in-view fadeIn animated" data-animation=" animated fadeIn">
                    <div class="home-v2-fullbanner-ad fullbanner-ad" style="margin-bottom: 70px">
                        <a href="#">
                            <img src="{{ asset('frontend/assets/images/upl_ad_1670577470_image_1670577470.jpg') }}" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
            </main><!-- #main -->
        </div><!-- #primary -->

        @include('frontend.home.sidebar')

    </div><!-- .container -->
</div><!-- #content -->

<section class="brands-carousel">
    <h2 class="sr-only">Brands Carousel</h2>
    <div class="container">
        <div id="owl-brands" class="owl-brands owl-carousel unicase-owl-carousel owl-outer-nav">

            @foreach ($brands as $brand)    
                <div class="item">
                    <a href="#">
                        <figure>
                            <figcaption class="text-overlay">
                                <div class="info">
                                    <h4>{{ $brand->name }}</h4>
                                </div><!-- /.info -->
                            </figcaption>

                            <img src="{{ asset('storage/' .$brand->thumbnail) }}" data-echo="{{ asset('storage/' .$brand->thumbnail) }}" class="img-responsive"
                                alt="">

                        </figure>
                    </a>
                </div><!-- /.item -->
            @endforeach


        </div><!-- /.owl-carousel -->

    </div>
</section>

<div class="footer-widgets">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <aside class="widget clearfix">
                    <div class="body">
                        <h4 class="widget-title">{{ trans('message.featured') }}</h4>
                        <ul class="product_list_widget">
                            @foreach ($getProductFeatured as $feature_item)
                                <li>
                                    <a href="{{ route('home.product-detail', ['slug'=>$feature_item->slug]) }}" title="Tablet Thin EliteBook  Revolve 810 G6">
                                        <img class="wp-post-image" data-echo="{{ asset('storage/' .$feature_item->thumbnail) }}" src="{{ asset('storage/' .$feature_item->thumbnail) }}" alt="">
                                        <span class="product-title">{{ $feature_item->name }}</span>
                                    </a>
                                    <span class="electro-price"><span class="amount">{{ !empty($feature_item->discount_price) ? \App\Helpers\Common::numberFormat($feature_item->discount_price) : \App\Helpers\Common::numberFormat($feature_item->price) }} đ</span></span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <aside class="widget clearfix">
                    <div class="body">
                        <h4 class="widget-title">Top Rated Products</h4>
                        <ul class="product_list_widget">
                            <li>
                                <a href="single-product.html" title="Notebook Black Spire V Nitro  VN7-591G">
                                    <img class="wp-post-image" data-echo="assets/images/footer/6.jpg" src="assets/images/blank.gif" alt="">
                                    <span class="product-title">Notebook Black Spire V Nitro  VN7-591G</span>
                                </a>
                                <div class="star-rating" title="Rated 5 out of 5"><span style="width:100%"><strong class="rating">5</strong> out of 5</span></div>		<span class="electro-price"><ins><span class="amount">&#36;1,999.00</span></ins> <del><span class="amount">&#36;2,299.00</span></del></span>
                            </li>

                            <li>
                                <a href="single-product.html" title="Apple MacBook Pro MF841HN/A 13-inch Laptop">
                                    <img class="wp-post-image" data-echo="assets/images/footer/7.jpg" src="assets/images/blank.gif" alt="">
                                    <span class="product-title">Apple MacBook Pro MF841HN/A 13-inch Laptop</span>
                                </a>
                                <div class="star-rating" title="Rated 5 out of 5"><span style="width:100%"><strong class="rating">5</strong> out of 5</span></div>		<span class="electro-price"><span class="amount">&#36;1,800.00</span></span>
                            </li>

                            <li>
                                <a href="single-product.html" title="Tablet White EliteBook Revolve  810 G2">
                                    <img class="wp-post-image" data-echo="assets/images/footer/2.jpg" src="assets/images/blank.gif" alt="">
                                    <span class="product-title">Tablet White EliteBook Revolve  810 G2</span>
                                </a>
                                <div class="star-rating" title="Rated 5 out of 5"><span style="width:100%"><strong class="rating">5</strong> out of 5</span></div>		<span class="electro-price"><span class="amount">&#36;1,999.00</span></span>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>

@endsection