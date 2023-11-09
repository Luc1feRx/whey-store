@extends('frontend.layouts.master')

@section('content')
<div class="single-product">
    <div id="content" class="site-content" tabindex="-1">
        <div class="container">
    
            @include('frontend.partials.breadcrumb',[
                'breadcrumb'=> [
                    ['title_product' => $productDetail->product_name, 'url' => route('admin.categories.index')]
                ]
            ])
    
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
    
                    <div class="product">
    
                        <div class="single-product-wrapper">
                            <div class="product-images-wrapper">
                                <span class="onsale">Sale!</span>
                                <div class="images electro-gallery">
                                    <div class="thumbnails-single owl-carousel">
                                        @foreach ($productDetail->images as $product_image)
                                            <a href="" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="{{ asset('storage/' .$product_image->image) }}" data-echo="{{ asset('storage/' .$product_image->image) }}" class="wp-post-image" alt=""></a>
                                        @endforeach
                                    </div><!-- .thumbnails-single -->
    
                                    <div class="thumbnails-all columns-5 owl-carousel">
                                        @foreach ($productDetail->images as $product_image)
                                            <a href="" class="first" title=""><img src="{{ asset('storage/' .$product_image->image) }}" data-echo="{{ asset('storage/' .$product_image->image) }}" class="wp-post-image" alt=""></a>
                                        @endforeach
                                    </div><!-- .thumbnails-all -->
                                </div><!-- .electro-gallery -->
                            </div><!-- /.product-images-wrapper -->
    
                            <div class="summary entry-summary">
    
                                <h1 itemprop="name" class="product_title entry-title">{{ $productDetail->product_name }}</h1>
    
                                <div class="woocommerce-product-rating">
                                    <div class="star-rating" title="Rated 4.33 out of 5">
                                        <span style="width:86.6%">
                                            <strong itemprop="ratingValue" class="rating">4.33</strong>
                                            out of <span itemprop="bestRating">5</span>				based on
                                            <span itemprop="ratingCount" class="rating">3</span>
                                            customer ratings
                                        </span>
                                    </div>
    
                                    <a href="#reviews" class="woocommerce-review-link">(<span itemprop="reviewCount" class="count">3</span> customer reviews)</a>
                                </div><!-- .woocommerce-product-rating -->
    
                                <div class="brand">
                                    <a href="product-category.html">
                                        <img src="{{ asset('storage/' .$productDetail->brand_thumbnail) }}" alt="{{ $productDetail->brand_name }}" />
                                    </a>
                                </div><!-- .brand -->
    
                                <div class="availability in-stock">{{ trans('message.Availablity') }}: <span>In stock</span></div><!-- .availability -->
    
                                <hr class="single-product-title-divider" />
    
                                <div class="action-buttons">
    
                                    <a href="#" class="add_to_wishlist" >
                                        {{ trans('message.wishlist') }}
                                    </a>
    
    
                                    <a href="#" class="add-to-compare-link" data-product_id="2452">Compare</a>
                                </div><!-- .action-buttons -->
    
                                <div itemprop="description">
                                    {!! $productDetail->short_description !!}
                                </div><!-- .description -->
    
                                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
    
                                    <p class="price"><span class="electro-price"><ins><span class="amount">{{ \App\Helpers\Common::numberFormat($productDetail->discount_price) }} đ</span></ins> <del><span class="amount">{{ \App\Helpers\Common::numberFormat($productDetail->price) }} đ</span></del></span></p>
    
                                    <meta itemprop="price" content="1215" />
                                    <meta itemprop="priceCurrency" content="USD" />
                                    <link itemprop="availability" href="http://schema.org/InStock" />
    
                                </div><!-- /itemprop -->
    
                                <form class="variations_form cart" method="post">
    
                                    <table class="variations">
                                        <tbody>
                                            <tr>
                                                <td class="label"><label>{{ trans('message.flavor') }}</label></td>
                                                <td class="value">
                                                    <select class="" name="attribute_pa_color">
                                                        <option value="">{{ trans('message.chooseOption') }}</option>
                                                        @foreach ($productDetail->flavors as $flavor)
                                                            <option value="{{ $flavor->id }}">{{ $flavor->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <a class="reset_variations" href="#">Clear</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
    
    
                                    <div class="single_variation_wrap">
                                        <div class="woocommerce-variation single_variation"></div>
                                        <div class="woocommerce-variation-add-to-cart variations_button">
                                            <div class="quantity">
                                                <label>{{ trans('message.quantity') }}</label>
                                                <input type="number" name="quantity" value="1" title="Qty" class="input-text qty text"/>
                                            </div>
                                            <button type="submit" class="single_add_to_cart_button button">{{ trans('message.addToCart') }}</button>
                                            <input type="hidden" name="add-to-cart" value="2452" />
                                            <input type="hidden" name="product_id" value="2452" />
                                            <input type="hidden" name="variation_id" class="variation_id" value="0" />
                                        </div>
                                    </div>
                                </form>
    
                            </div><!-- .summary -->
                        </div><!-- /.single-product-wrapper -->
    
    
                        <div class="woocommerce-tabs wc-tabs-wrapper">
                            <ul class="nav nav-tabs electro-nav-tabs tabs wc-tabs" role="tablist">
                                <li class="nav-item accessories_tab">
                                    <a href="#tab-accessories" data-toggle="tab">Accessories</a>
                                </li>
    
                                <li class="nav-item description_tab">
                                    <a href="#tab-description" data-toggle="tab">Description</a>
                                </li>
    
                                <li class="nav-item specification_tab">
                                    <a href="#tab-specification" class="active" data-toggle="tab">Specification</a>
                                </li>
    
                                <li class="nav-item reviews_tab">
                                    <a href="#tab-reviews" data-toggle="tab">Reviews</a>
                                </li>
                            </ul>
    
                            <div class="tab-content">
                                <div class="tab-pane panel entry-content wc-tab" id="tab-accessories">
    
                                    <div class="accessories">
    
                                        <div class="electro-wc-message"></div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-9 col-left">
                                                <ul class="products columns-3">
    
                                                    <li class="product first">
                                                        <div class="product-outer">
                                                            <div class="product-inner">
                                                                <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                                                <a href="single-product.html">
                                                                    <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                                                    <div class="product-thumbnail">
    
                                                                        <img data-echo="assets/images/products/5.jpg" src="assets/images/blank.gif" alt="">
    
                                                                    </div>
                                                                </a>
    
                                                                <div class="price-add-to-cart">
                                                                    <span class="price">
                                                                        <span class="electro-price">
                                                                            <ins><span class="amount">&#036;1,999.00</span></ins>
                                                                            <del><span class="amount">&#036;2,299.00</span></del>
                                                                        </span>
                                                                    </span>
                                                                    <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                                                </div><!-- /.price-add-to-cart -->
    
                                                                <div class="hover-area">
                                                                    <div class="action-buttons">
                                                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                                        <a href="#" class="add-to-compare-link">Compare</a>
                                                                    </div>
                                                                </div>
                                                            </div><!-- /.product-inner -->
                                                        </div><!-- /.product-outer -->
                                                    </li>
                                                    <li class="product ">
                                                        <div class="product-outer">
                                                            <div class="product-inner">
                                                                <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                                                <a href="single-product.html">
                                                                    <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                                                    <div class="product-thumbnail">
    
                                                                        <img data-echo="assets/images/products/3.jpg" src="assets/images/blank.gif" alt="">
    
                                                                    </div>
                                                                </a>
    
                                                                <div class="price-add-to-cart">
                                                                    <span class="price">
                                                                        <span class="electro-price">
                                                                            <ins><span class="amount">&#036;1,999.00</span></ins>
                                                                            <del><span class="amount">&#036;2,299.00</span></del>
                                                                        </span>
                                                                    </span>
                                                                    <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                                                </div><!-- /.price-add-to-cart -->
    
                                                                <div class="hover-area">
                                                                    <div class="action-buttons">
                                                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                                        <a href="#" class="add-to-compare-link">Compare</a>
                                                                    </div>
                                                                </div>
                                                            </div><!-- /.product-inner -->
                                                        </div><!-- /.product-outer -->
                                                    </li>
                                                    <li class="product last">
                                                        <div class="product-outer">
                                                            <div class="product-inner">
                                                                <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                                                <a href="single-product.html">
                                                                    <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                                                    <div class="product-thumbnail">
    
                                                                        <img data-echo="assets/images/products/2.jpg" src="assets/images/blank.gif" alt="">
    
                                                                    </div>
                                                                </a>
    
                                                                <div class="price-add-to-cart">
                                                                    <span class="price">
                                                                        <span class="electro-price">
                                                                            <ins><span class="amount">&#036;1,999.00</span></ins>
                                                                            <del><span class="amount">&#036;2,299.00</span></del>
                                                                        </span>
                                                                    </span>
                                                                    <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                                                </div><!-- /.price-add-to-cart -->
    
                                                                <div class="hover-area">
                                                                    <div class="action-buttons">
                                                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                                        <a href="#" class="add-to-compare-link">Compare</a>
                                                                    </div>
                                                                </div>
                                                            </div><!-- /.product-inner -->
                                                        </div><!-- /.product-outer -->
                                                    </li>
    
                                                </ul><!-- /.products -->
    
                                                <div class="check-products">
                                                    <div class="checkbox accessory-checkbox">
                                                        <label>
                                                            <input checked disabled type="checkbox" class="product-check">
                                                            <span class="product-title">
                                                                <strong>This product: </strong>Ultra Wireless S50 Headphones S50 with Bluetooth
                                                            </span>
                                                            -
                                                            <span class="accessory-price">
                                                                <span class="amount">&#36;1,215.00</span>
                                                            </span>
                                                        </label>
                                                    </div>
    
                                                    <div class="checkbox accessory-checkbox">
                                                        <label>
                                                            <input checked type="checkbox" class="product-check">
                                                            <span class="product-title">Universal Headphones Case in Black</span>
                                                            -
                                                            <span class="accessory-price">
                                                                <span class="amount">&#36;159.00</span>
                                                            </span>
                                                        </label>
                                                    </div>
    
                                                    <div class="checkbox accessory-checkbox">
                                                        <label>
                                                            <input checked type="checkbox" class="product-check">
                                                            <span class="product-title">Headphones USB Wires</span>
                                                            -
                                                            <span class="accessory-price">
                                                                <span class="amount">&#36;50.00</span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div><!-- /.check-products -->
    
                                            </div><!-- /.col -->
    
                                            <div class="col-xs-12 col-sm-3 col-right">
                                                <div class="total-price">
                                                    <span class="total-price-html">
                                                        <span class="amount">&#036;1,424.00</span>
                                                    </span>
                                                    for <span class="total-products">3</span>
                                                    items
                                                </div><!-- /.total-price -->
    
                                                <div class="accessories-add-all-to-cart">
                                                    <button type="button" class="button btn btn-primary add-all-to-cart">Add all to cart</button>
                                                </div><!-- /.accessories-add-all-to-cart -->
                                            </div><!-- /.col -->
                                        </div><!-- /.row -->
    
                                    </div><!-- /.accessories -->
                                </div>
    
                                <div class="tab-pane panel entry-content wc-tab" id="tab-description">
                                    <div class="electro-description">
                                        {!! $productDetail->description !!}
                                    </div><!-- /.electro-description -->
    
                                    <div class="product_meta">
                                        <span class="sku_wrapper">SKU: <span class="sku" itemprop="sku">FW511948218</span></span>
    
    
                                        <span class="posted_in">Category:
                                            <a href="product-category.html" rel="tag">Headphones</a>
                                        </span>
    
                                        <span class="tagged_as">Tags:
                                            <a href="product-category.html" rel="tag">Fast</a>,
                                            <a href="product-category.html" rel="tag">Gaming</a>, <a href="product-category.html" rel="tag">Strong</a>
                                        </span>
    
                                    </div><!-- /.product_meta -->
                                </div>
    
                                <div class="tab-pane active in panel entry-content wc-tab" id="tab-specification">
                                    <h3>Technical Specifications</h3>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Brand</td>
                                                <td>Apple</td>
                                            </tr>
                                            <tr>
                                                <td>Item Height</td>
                                                <td>18 Millimeters</td>
                                            </tr>
                                            <tr>
                                                <td>Item Width</td>
                                                <td>31.4 Centimeters</td>
                                            </tr>
                                            <tr>
                                                <td>Screen Size</td>
                                                <td>13 Inches</td>
                                            </tr>
                                            <tr class="size-weight">
                                                <td>Item Weight</td>
                                                <td>1.6 Kg</td>
                                            </tr>
                                            <tr class="size-weight">
                                                <td>Product Dimensions</td>
                                                <td>21.9 x 31.4 x 1.8 cm</td>
                                            </tr>
                                            <tr class="item-model-number">
                                                <td>Item model number</td>
                                                <td>MF841HN/A</td>
                                            </tr>
                                            <tr>
                                                <td>Processor Brand</td>
                                                <td>Intel</td>
                                            </tr>
                                            <tr>
                                                <td>Processor Type</td>
                                                <td>Core i5</td>
                                            </tr>
                                            <tr>
                                                <td>Processor Speed</td>
                                                <td>2.9 GHz</td>
                                            </tr>
                                            <tr>
                                                <td>RAM Size</td>
                                                <td>8 GB</td>
                                            </tr>
                                            <tr>
                                                <td>Hard Drive Size</td>
                                                <td>512 GB</td>
                                            </tr>
                                            <tr>
                                                <td>Hard Disk Technology</td>
                                                <td>Solid State Drive</td>
                                            </tr>
                                            <tr>
                                                <td>Graphics Coprocessor</td>
                                                <td>Intel Integrated Graphics</td>
                                            </tr>
                                            <tr>
                                                <td>Graphics Card Description</td>
                                                <td>Integrated Graphics Card</td>
                                            </tr>
                                            <tr>
                                                <td>Hardware Platform</td>
                                                <td>Mac</td>
                                            </tr>
                                            <tr>
                                                <td>Operating System</td>
                                                <td>Mac OS</td>
                                            </tr>
                                            <tr>
                                                <td>Average Battery Life (in hours)</td>
                                                <td>9</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- /.panel -->
    
                                <div class="tab-pane panel entry-content wc-tab" id="tab-reviews">
                                    <div id="reviews" class="electro-advanced-reviews">
                                        <div class="advanced-review row">
                                            <div class="col-xs-12 col-md-6">
                                                <h2 class="based-title">Based on 3 reviews</h2>
                                                <div class="avg-rating">
                                                    <span class="avg-rating-number">4.3</span> overall
                                                </div>
    
                                                <div class="rating-histogram">
                                                    <div class="rating-bar">
                                                        <div class="star-rating" title="Rated 5 out of 5">
                                                            <span style="width:100%"></span>
                                                        </div>
                                                        <div class="rating-percentage-bar">
                                                            <span style="width:33%" class="rating-percentage">
    
                                                            </span>
                                                        </div>
                                                        <div class="rating-count">1</div>
                                                    </div><!-- .rating-bar -->
    
                                                    <div class="rating-bar">
                                                        <div class="star-rating" title="Rated 4 out of 5">
                                                            <span style="width:80%"></span>
                                                        </div>
                                                        <div class="rating-percentage-bar">
                                                            <span style="width:67%" class="rating-percentage"></span>
                                                        </div>
                                                        <div class="rating-count">2</div>
                                                    </div><!-- .rating-bar -->
    
                                                    <div class="rating-bar">
                                                        <div class="star-rating" title="Rated 3 out of 5">
                                                            <span style="width:60%"></span>
                                                        </div>
                                                        <div class="rating-percentage-bar">
                                                            <span style="width:0%" class="rating-percentage"></span>
                                                        </div>
                                                        <div class="rating-count zero">0</div>
                                                    </div><!-- .rating-bar -->
    
                                                    <div class="rating-bar">
                                                        <div class="star-rating" title="Rated 2 out of 5">
                                                            <span style="width:40%"></span>
                                                        </div>
                                                        <div class="rating-percentage-bar">
                                                            <span style="width:0%" class="rating-percentage"></span>
                                                        </div>
                                                        <div class="rating-count zero">0</div>
                                                    </div><!-- .rating-bar -->
    
                                                    <div class="rating-bar">
                                                        <div class="star-rating" title="Rated 1 out of 5">
                                                            <span style="width:20%"></span>
                                                        </div>
                                                        <div class="rating-percentage-bar">
                                                            <span style="width:0%" class="rating-percentage"></span>
                                                        </div>
                                                        <div class="rating-count zero">0</div>
                                                    </div><!-- .rating-bar -->
                                                </div>
                                            </div><!-- /.col -->
    
                                            <div class="col-xs-12 col-md-6">
                                                @if (Auth::check())
                                                    <div id="review_form_wrapper">
                                                        <div id="review_form">
                                                            <div id="respond" class="comment-respond">
                                                                <h3 id="reply-title" class="comment-reply-title">Add a review
                                                                    <small><a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Cancel reply</a>
                                                                    </small>
                                                                </h3>
        
                                                                <form action="#" method="post" id="commentform" class="comment-form">
                                                                    <p class="comment-form-rating">
                                                                        <label>Your Rating</label>
                                                                    </p>

                                                                    <div id="rateYo"></div>

                                                                    <input type="hidden" value="" name="rating" id="rating-star">
                                                                    <input type="hidden" value="{{ $productDetail->id }}" name="product_id" id="product_id">
        
                                                                    <p class="comment-form-comment">
                                                                        <label for="comment">Your Review</label>
                                                                        <textarea id="comment" name="content" cols="45" rows="8" aria-required="true"></textarea>
                                                                    </p>
        
                                                                    <p class="form-submit">
                                                                        <input name="submit" type="submit" id="submit" class="submit" value="Add Review" />
                                                                        <input type='hidden' name='comment_post_ID' value='2452' id='comment_post_ID' />
                                                                        <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                                                                    </p>
        
                                                                    <input type="hidden" id="_wp_unfiltered_html_comment_disabled" name="_wp_unfiltered_html_comment_disabled" value="c7106f1f46" />
                                                                    <script>(function(){if(window===window.parent){document.getElementById('_wp_unfiltered_html_comment_disabled').name='_wp_unfiltered_html_comment';}})();</script>
                                                                </form><!-- form -->
                                                            </div><!-- #respond -->
                                                        </div>
                                                    </div>
                                                @else
                                                    <div style="display: flex; justify-content: center">
                                                        {{ trans('message.LoginToComment') }}
                                                    </div>
                                                @endif
    
                                            </div><!-- /.col -->
                                        </div><!-- /.row -->
    
                                        <div id="comments">
    
                                            <ol class="commentlist">
                                                <li itemprop="review" class="comment even thread-even depth-1">
    
                                                    <div id="comment-390" class="comment_container">
    
                                                        <img alt='' src="assets/images/blog/avatar.jpg" class='avatar' height='60' width='60' />
                                                        <div class="comment-text">
    
                                                            <div class="star-rating" title="Rated 4 out of 5">
                                                                <span style="width:80%"><strong itemprop="ratingValue">4</strong> out of 5</span>
                                                            </div>
    
    
                                                            <p class="meta">
                                                                <strong>John Doe</strong> &ndash;
                                                                <time itemprop="datePublished" datetime="2016-03-03T14:13:48+00:00">March 3, 2016</time>:
                                                            </p>
    
                                                            <div itemprop="description" class="description">
                                                                <p>Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.
                                                                </p>
                                                            </div>
    
                                                            <p class="meta">
                                                                <strong itemprop="author">John Doe</strong> &ndash; <time itemprop="datePublished" datetime="2016-03-03T14:13:48+00:00">March 3, 2016</time>
                                                            </p>
    
                                                        </div>
                                                    </div>
                                                </li><!-- #comment-## -->
    
                                                <li class="comment odd alt thread-odd thread-alt depth-1">
    
                                                    <div class="comment_container">
    
                                                        <img alt='' src="assets/images/blog/avatar.jpg" class='avatar' height='60' width='60' />
                                                        <div class="comment-text">
    
                                                            <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="Rated 5 out of 5">
                                                                <span style="width:100%"><strong itemprop="ratingValue">5</strong> out of 5</span>
                                                            </div>
    
                                                            <p class="meta">
                                                                <strong>Anna Kowalsky</strong> &ndash;
                                                                <time itemprop="datePublished" datetime="2016-03-03T14:14:47+00:00">March 3, 2016</time>:
                                                            </p>
    
    
                                                            <div itemprop="description" class="description">
                                                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse eget facilisis odio. Duis sodales augue eu tincidunt faucibus. Etiam justo ligula, placerat ac augue id, volutpat porta dui.
                                                                </p>
                                                            </div>
    
                                                            <p class="meta">
                                                                <strong itemprop="author">Anna Kowalsky</strong> &ndash; <time itemprop="datePublished" datetime="2016-03-03T14:14:47+00:00">March 3, 2016</time>
                                                            </p>
    
                                                        </div>
                                                    </div>
                                                </li><!-- #comment-## -->
    
                                                <li class="comment odd alt thread-odd thread-alt depth-1">
    
                                                    <div class="comment_container">
    
                                                        <img alt='' src="assets/images/blog/avatar.jpg" class='avatar' height='60' width='60' />
                                                        <div class="comment-text">
    
                                                            <div itemprop="reviewRating" class="star-rating" title="Rated 5 out of 5">
                                                                <span style="width:100%"><strong itemprop="ratingValue">5</strong> out of 5</span>
                                                            </div>
    
                                                            <p class="meta">
                                                                <strong>Anna Kowalsky</strong> &ndash;
                                                                <time itemprop="datePublished" datetime="2016-03-03T14:14:47+00:00">March 3, 2016</time>:
                                                            </p>
    
    
                                                            <div itemprop="description" class="description">
                                                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse eget facilisis odio. Duis sodales augue eu tincidunt faucibus. Etiam justo ligula, placerat ac augue id, volutpat porta dui.
                                                                </p>
                                                            </div>
    
                                                            <p class="meta">
                                                                <strong itemprop="author">Anna Kowalsky</strong> &ndash; <time itemprop="datePublished" datetime="2016-03-03T14:14:47+00:00">March 3, 2016</time>
                                                            </p>
    
                                                        </div>
                                                    </div>
                                                </li><!-- #comment-## -->
                                            </ol><!-- /.commentlist -->
    
                                        </div><!-- /#comments -->
    
                                        <div class="clear"></div>
                                    </div><!-- /.electro-advanced-reviews -->
                                </div><!-- /.panel -->
                            </div>
                        </div><!-- /.woocommerce-tabs -->
                        <div class="related products">
                            <h2>Related Products</h2>
    
                            <ul class="products columns-5">
                                <li class="product">
                                    <div class="product-outer">
                                        <div class="product-inner">
                                            <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                            <a href="single-product.html">
                                                <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                                <div class="product-thumbnail">
                                                    <img data-echo="assets/images/products/1.jpg" src="assets/images/blank.gif" alt="">
                                                </div>
                                            </a>
    
                                            <div class="price-add-to-cart">
                                                <span class="price">
                                                    <span class="electro-price">
                                                        <ins><span class="amount">&#036;1,999.00</span></ins>
                                                    </span>
                                                </span>
                                                <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                            </div><!-- /.price-add-to-cart -->
    
                                            <div class="hover-area">
                                                <div class="action-buttons">
                                                    <a href="#" rel="nofollow" class="add_to_wishlist"> Wishlist</a>
                                                    <a href="#" class="add-to-compare-link">Compare</a>
                                                </div>
                                            </div>
                                        </div><!-- /.product-inner -->
                                    </div><!-- /.product-outer -->
                                </li>
    
                                <li class="product">
                                    <div class="product-outer">
                                        <div class="product-inner">
                                            <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                            <a href="single-product.html">
                                                <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                                <div class="product-thumbnail">
                                                    <img data-echo="assets/images/products/2.jpg" src="assets/images/blank.gif" alt="">
                                                </div>
                                            </a>
    
                                            <div class="price-add-to-cart">
                                                <span class="price">
                                                    <span class="electro-price">
                                                        <ins><span class="amount">&#036;1,999.00</span></ins>
                                                    </span>
                                                </span>
                                                <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                            </div><!-- /.price-add-to-cart -->
    
                                            <div class="hover-area">
                                                <div class="action-buttons">
                                                    <a href="#" rel="nofollow" class="add_to_wishlist"> Wishlist</a>
                                                    <a href="#" class="add-to-compare-link">Compare</a>
                                                </div>
                                            </div>
                                        </div><!-- /.product-inner -->
                                    </div><!-- /.product-outer -->
                                </li>
    
                                <li class="product">
                                    <div class="product-outer">
                                        <div class="product-inner">
                                            <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                            <a href="single-product.html">
                                                <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                                <div class="product-thumbnail">
                                                    <img data-echo="assets/images/products/3.jpg" src="assets/images/blank.gif" alt="">
                                                </div>
                                            </a>
    
                                            <div class="price-add-to-cart">
                                                <span class="price">
                                                    <span class="electro-price">
                                                        <ins><span class="amount">&#036;1,999.00</span></ins>
                                                    </span>
                                                </span>
                                                <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                            </div><!-- /.price-add-to-cart -->
    
                                            <div class="hover-area">
                                                <div class="action-buttons">
                                                    <a href="#" rel="nofollow" class="add_to_wishlist"> Wishlist</a>
                                                    <a href="#" class="add-to-compare-link">Compare</a>
                                                </div>
                                            </div>
                                        </div><!-- /.product-inner -->
                                    </div><!-- /.product-outer -->
                                </li>
    
                                <li class="product">
                                    <div class="product-outer">
                                        <div class="product-inner">
                                            <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                            <a href="single-product.html">
                                                <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                                <div class="product-thumbnail">
                                                    <img data-echo="assets/images/products/4.jpg" src="assets/images/blank.gif" alt="">
                                                </div>
                                            </a>
    
                                            <div class="price-add-to-cart">
                                                <span class="price">
                                                    <span class="electro-price">
                                                        <ins><span class="amount">&#036;1,999.00</span></ins>
                                                    </span>
                                                </span>
                                                <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                            </div><!-- /.price-add-to-cart -->
    
                                            <div class="hover-area">
                                                <div class="action-buttons">
                                                    <a href="#" rel="nofollow" class="add_to_wishlist"> Wishlist</a>
                                                    <a href="#" class="add-to-compare-link">Compare</a>
                                                </div>
                                            </div>
                                        </div><!-- /.product-inner -->
                                    </div><!-- /.product-outer -->
                                </li>
                            </ul><!-- /.products -->
                        </div><!-- /.related -->
                    </div>
                </main><!-- /.site-main -->
            </div><!-- /.content-area -->
    
            <div id="sidebar" class="sidebar" role="complementary">
                <aside id="woocommerce_products-2" class="widget woocommerce widget_products">
                    <h3 class="widget-title">Latest Products</h3>
                    <ul class="product_list_widget">
                        <li>
                            <a href="single-product.html" title="Notebook Black Spire V Nitro  VN7-591G">
                                <img class="wp-post-image" src="assets/images/products/2.jpg" alt="">
                                <span class="product-title">Notebook Black Spire V Nitro  VN7-591G</span>
                            </a>
                            <span class="electro-price"><ins><span class="amount">&#36;1,999.00</span></ins> <del><span class="amount">&#36;2,299.00</span></del></span>
                        </li>
    
                        <li>
                            <a href="single-product.html" title="Tablet Thin EliteBook  Revolve 810 G6">
                                <img class="wp-post-image" src="assets/images/products/5.jpg" alt="">
                                <span class="product-title">Tablet Thin EliteBook  Revolve 810 G6</span>
                            </a>
                            <span class="electro-price"><span class="amount">&#36;1,300.00</span></span>
                        </li>
    
                        <li>
                            <a href="single-product.html" title="Notebook Widescreen Z51-70  40K6013UPB">
                                <img class="wp-post-image" src="assets/images/products/6.jpg" alt="">
                                <span class="product-title">Notebook Widescreen Z51-70  40K6013UPB</span>
                            </a>
                            <span class="electro-price"><span class="amount">&#36;1,100.00</span></span>
                        </li>
    
                        <li>
                            <a href="single-product.html" title="Notebook Purple G952VX-T7008T">
                                <img class="wp-post-image" src="assets/images/products/1.jpg" alt="">
                                <span class="product-title">Notebook Purple G952VX-T7008T</span>
                            </a>
                            <span class="electro-price"><span class="amount">&#36;2,780.00</span></span>
                        </li>
    
                        <li>
                            <a href="single-product.html" title="Laptop Yoga 21 80JH0035GE  W8.1 (Copy)">
                                <img class="wp-post-image" src="assets/images/products/4.jpg" alt="">
                                <span class="product-title">Laptop Yoga 21 80JH0035GE  W8.1 (Copy)</span>
                            </a>
                            <span class="electro-price"><span class="amount">&#36;3,485.00</span></span>
                        </li>
                    </ul><!-- .product_list_widget -->
                </aside><!-- .widget -->
                <aside id="electro_product_categories_widget-2" class="widget woocommerce widget_product_categories electro_widget_product_categories">
                    <img src="{{ asset('frontend/assets/images/section_product_tag_2_banner.webp') }}" alt="Banner">
                </aside><!-- .widget -->
                <aside id="text-2" class="widget widget_text">
                    <div class="textwidget">
                        <img src="{{ asset('frontend/assets/images/section_product_tag_3_banner.webp') }}" alt="Banner">
                    </div><!-- .textwidget -->
                </aside><!-- .widget -->
            </div><!-- /.sidebar-shop -->
    
        </div><!-- .col-full -->
    </div><!-- #content -->
</div>
@endsection

@section('addJs')
    <script>
        toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        };
        jQuery("#rateYo").rateYo({
            rating: 0,
            fullStar: true,
            starWidth: "20px"
        }).on("rateyo.set", function (e, data) {
            jQuery('#rating-star').val(data.rating);
        });

        jQuery(document).ready(function() {
             // Xử lý sự kiện gửi biểu mẫu
             jQuery("#commentform").submit(function(event) {
                    event.preventDefault(); // Ngăn chặn biểu mẫu gửi mặc định

                    // Lấy các giá trị từ các trường
                    var rating = jQuery("#rating-star").val();
                    var product_id = jQuery("#product_id").val();
                    var content = jQuery("#comment").val();

                    // Tạo một đối tượng dữ liệu để gửi lên máy chủ
                    var data = {
                        rating: rating,
                        product_id: product_id,
                        content: content,
                    };

                    // Sử dụng Ajax để gửi yêu cầu POST đến máy chủ
                    jQuery.ajax({
                    type: "POST",
                    url: "{{ route('home.addCommentRating') }}", // Thay thế bằng URL của API/route của bạn
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr('content'), // Thêm token CSRF vào tiêu đề
                    },
                    data: JSON.stringify(data),
                    contentType: "application/json;charset=UTF-8",
                    success: function(response) {
                        // Xử lý phản hồi từ máy chủ (nếu cần)
                        Command: toastr["success"](response.msg)
                    },
                    });
                });
            });
    </script>
@endsection