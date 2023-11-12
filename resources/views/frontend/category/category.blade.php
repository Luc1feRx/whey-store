@extends('frontend.layouts.master')

@section('content')
<div id="content" class="site-content" tabindex="-1">
    <div class="container">
        <nav class="woocommerce-breadcrumb"><a href="{{ route('home.index') }}">{{ trans('message.home') }}</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>{{ $category->name_category }}</nav>
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <header class="page-header">
                    <h1 class="page-title">{{ $category->name_category }}</h1>
                </header>

                <div class="shop-control-bar">
                    <ul class="shop-view-switcher nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link " data-toggle="tab" title="List View" href="#list-view"><i class="fa fa-list"></i></a></li>
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
                    </ul>
                    <form class="woocommerce-ordering" method="get">
                        <select name="orderby" class="orderby">
                            <option value="menu_order"  selected='selected'>Default sorting</option>
                            <option value="popularity" >Sort by popularity</option>
                            <option value="rating" >Sort by average rating</option>
                            <option value="date" >Sort by newness</option>
                            <option value="price" >Sort by price: low to high</option>
                            <option value="price-desc" >Sort by price: high to low</option>
                        </select>
                    </form>
                    <form class="form-electro-wc-ppp"><select name="page" onchange="this.form.submit()" class="electro-wc-wppp-select c-select"><option value="15"  selected='selected'>Show 15</option><option value="-1" >Show All</option></select></form>
                </div>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="grid" aria-expanded="true">
                
                        @include('frontend.category.productList')
                    </div>
                
                    <div role="tabpanel" class="tab-pane" id="list-view" aria-expanded="true">
                        <ul class="products columns-3">
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="assets/images/products/1.jpg" src="assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                
                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>
                
                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>
                
                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>
                
                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="assets/images/products/2.jpg" src="assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                
                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>
                
                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>
                
                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>
                
                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="assets/images/products/3.jpg" src="assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                
                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>
                
                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>
                
                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>
                
                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="assets/images/products/4.jpg" src="assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                
                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>
                
                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>
                
                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>
                
                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="assets/images/products/5.jpg" src="assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                
                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>
                
                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>
                
                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>
                
                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="assets/images/products/6.jpg" src="assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                
                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>
                
                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>
                
                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>
                
                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="assets/images/products/4.jpg" src="assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                
                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>
                
                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>
                
                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>
                
                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="assets/images/products/2.jpg" src="assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                
                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>
                
                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>
                
                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>
                
                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="assets/images/products/5.jpg" src="assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                
                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>
                
                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>
                
                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>
                
                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="assets/images/products/1.jpg" src="assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                
                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>
                
                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>
                
                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>
                
                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="assets/images/products/6.jpg" src="assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                
                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>
                
                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>
                
                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>
                
                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="assets/images/products/3.jpg" src="assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                
                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>
                
                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>
                
                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>
                
                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="assets/images/products/5.jpg" src="assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                
                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>
                
                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>
                
                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>
                
                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="assets/images/products/4.jpg" src="assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                
                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>
                
                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>
                
                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>
                
                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="assets/images/products/2.jpg" src="assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                
                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>
                
                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>
                
                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>
                
                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>
                
                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </main><!-- #main -->
        </div><!-- #primary -->

        @include('frontend.category.sidebar')

    </div><!-- .container -->
</div><!-- #content -->
@endsection

@section('addJs')
    <script>
        jQuery(document).ready(function() {
            // Your jQuery code here
            jQuery('.brand-filter').change(function(e){
                var dataSlug = jQuery(this).data('getslug');
                applyFilters(dataSlug, 1);
            });


        function applyFilters(dataSlug, page) {
            // Get selected brand IDs
            var selectedBrands = [];
            jQuery('input[name="brand-filter"]:checked').each(function() {
                selectedBrands.push(jQuery(this).val());
            });

            // Make AJAX request to update the content
            jQuery.ajax({
                    type: 'GET',
                    url: '{{ route("home.category", ["slug" => '+ dataSlug +']) }}',
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr('content'), // Thêm token CSRF vào tiêu đề
                    },
                    data: { 
                        brands: selectedBrands,
                        slug: dataSlug,
                        page: page
                    },
                    success: function(data) {
                        // Update the content with the received data
                        jQuery('#grid').html(data.html);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    </script>
@endsection