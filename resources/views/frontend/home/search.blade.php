@extends('frontend.layouts.master')

@section('content')
<div id="content" class="site-content" tabindex="-1">
    <div class="container">
        <nav class="woocommerce-breadcrumb"><a href="{{ route('home.index') }}">{{ trans('message.home') }}</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>{{ trans('message.search') }}</nav>
        <div id="primary" class="content-area">
            <main id="main" class="site-main">

                <div class="shop-control-bar">
                    <ul class="shop-view-switcher nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link " data-toggle="tab" title="List View" href="#list-view"><i class="fa fa-list"></i></a></li>
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
                    </ul>
                    <form class="woocommerce-ordering" method="get">
                        <select name="orderby" class="select-order orderby">
                            <option value="?sort=asc"  selected='selected'>{{ trans('message.categories.sortA-Z') }}</option>
                            <option value="?sort=desc" >{{ trans('message.categories.sortZ-A') }}</option>
                            <option value="?price=asc" >{{ trans('message.categories.sortPriceRaise') }}</option>
                            <option value="?price=desc" >{{ trans('message.categories.sortPriceLow') }}</option>
                        </select>
                    </form>
                </div>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="grid" aria-expanded="true">
                
                        @include('frontend.home.productList')
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

        <div id="sidebar" class="sidebar" role="complementary">
            <form action="#" method="GET">
                <aside class="widget widget_electro_products_filter">
                    <h3 class="widget-title">Filters</h3>
                    <aside class="widget woocommerce widget_layered_nav">
                        <h3 class="widget-title">{{ trans('message.brands') }}</h3>
                        <ul>
                            @php
                                $brand_id = [];
                                $brand_arr = [];
                                if(isset(request()->brand)){
                                    $brand_id = request()->brand;
                                    $brand_arr = explode(',',$brand_id);
                                }
                            @endphp
                            @foreach ($brands as $brand)
                                <li style="">
                                    <input name="brand-filter" data-filters="brand" 
                                    {{ in_array($brand->id, $brand_arr) ? 'checked' : '' }}
                                    type="checkbox" class="brand-filter" value="{{ $brand->id }}">
                                    <label class="item">{{ $brand->name }}</label>
                                    <span class="count">({{ $brand->products_count }})</span>
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                    <aside class="widget woocommerce widget_layered_nav">
                        <h3 class="widget-title">{{ trans('message.priceFilter') }}</h3>
                        <ul>
                            <li style="">
                                <input name="price[]" type="checkbox" value="(<500000)">
                                <label class="item"> < 500.000đ</label>
                            </li>
                            <li style="">
                                <input name="price[]" type="checkbox" value="(>=500000 AND <=1000000)">
                                <label class="item">500.000đ - 1.000.000đ</label>
                            </li>
                            <li style="">
                                <input name="price[]" type="checkbox" value="(>=1000000 AND <=1500000)">
                                <label class="item">1.000.000đ - 1.500.000đ</label>
                            </li>
                            <li style="">
                                <input name="price[]" type="checkbox" value="(>=1500000 AND <=2000000)">
                                <label class="item">1.500.000đ - 2.000.000</label>
                            </li>
                            <li style="">
                                <input name="price[]" type="checkbox" value="(>=2000000)">
                                <label class="item"> > 2.000.000</label>
                            </li>
                        </ul>
                    </aside>
                    <aside class="widget woocommerce widget_price_filter">
                        <h3 class="widget-title">Price</h3>
                        <form action="#">
                            <div class="price_slider_wrapper">
                                <div style="" class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 0%;"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;"></span>
                                </div>
                                <div class="price_slider_amount">
                                    <a href="#" class="button">Filter</a>
                                    <div style="" class="price_label">Price: <span class="from">$428</span> &mdash; <span class="to">$3485</span></div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </form>
                    </aside>
                </aside>
            </form>
        </div>

    </div><!-- .container -->
</div><!-- #content -->
@endsection

@section('addJs')
    <script>
        jQuery(document).ready(function() {
            // Your jQuery code here
            jQuery(document).on('click', '.brand-filter', function(e) {
                var brand = [],
                    tempArray = [];

                jQuery.each(jQuery("[data-filters='brand']:checked"), function() {
                    tempArray.push(jQuery(this).val());
                });

                
                // Kiểm tra xem có checkbox nào được chọn không
                if (tempArray.length === 0) {
                    // Nếu không có checkbox nào được chọn, lấy tất cả sản phẩm
                    var url = window.location.href;
                    var newUrl = url.split('?')[0]; // Lấy phần URL trước dấu '?' (nếu có)
                    window.history.replaceState({}, document.title, newUrl);
                    window.location.href = newUrl;
                }

                jQuery.each(jQuery("[data-filters='brand']:not(:checked)"), function() {
                    var index = tempArray.indexOf(jQuery(this).val());
                    if (index !== -1) {
                        tempArray.splice(index, 1);
                    }
                });

                tempArray.reverse();
                if (tempArray.length !== 0) {
                    brand += '?brand=' + tempArray.toString();
                }
                window.location.href = brand;
            });

            // jQuery('.select-order').change(function(){
            //     var value = jQuery(this).find(':selected').val();

            //     if(value!=0){
            //         var url = value;
            //         window.location.replace(url);
            //     }
            // });
        });
    </script>
@endsection