<div id="sidebar" class="sidebar" role="complementary" style="margin-top: 778px;">
    <aside class="widget widget_text">
        <div class="textwidget">
            <a href="#">
                <img src="{{ asset('frontend/assets/images/section_product_tag_1_banner.webp') }}" alt="Banner">
            </a>
        </div>
    </aside>
    <aside class="widget widget_products">
        <h3 class="widget-title">Latest Products</h3>
        <ul class="product_list_widget">
            @foreach ($getLastestProduct as $lastestProduct)
                <li>
                    <a href="single-product.html" title="{{ $lastestProduct->name }}">
                        <img width="180" height="180" src="{{ !empty($lastestProduct->thumbnail) ? asset('storage/' .$lastestProduct->thumbnail) : asset('backend\dist\img\placeholder.png') }}" alt="" class="wp-post-image"/><span class="product-title">{{ $lastestProduct->name }}</span>
                    </a>
                    <span class="electro-price"><ins><span class="amount">{{ \App\Helpers\Common::numberFormat($productFeatured->discount_price) }} đ</span></ins> <del><span class="amount">{{ \App\Helpers\Common::numberFormat($productFeatured->price) }} đ</span></del></span>
                </li>
            @endforeach
        </ul>
    </aside>
    <aside id="electro_features_block_widget-2" class="widget widget_electro_features_block_widget">
        <div class="features-list columns-1">
            <div class="feature">
                <div class="media">
                    <div class="media-left media-middle feature-icon">
                        <i class="ec ec-transport"></i>
                    </div>
                    <div class="media-body media-middle feature-text">
                        <strong>Free Delivery</strong> from $50
                    </div>
                </div>
            </div>
            <div class="feature">
                <div class="media">
                    <div class="media-left media-middle feature-icon">
                        <i class="ec ec-customers"></i>
                    </div>
                    <div class="media-body media-middle feature-text">
                        <strong>99% Positive</strong> Feedbacks
                    </div>
                </div>
            </div>
            <div class="feature">
                <div class="media">
                    <div class="media-left media-middle feature-icon">
                        <i class="ec ec-returning"></i>
                    </div>
                    <div class="media-body media-middle feature-text">
                        <strong>365 days</strong> for free return
                    </div>
                </div>
            </div>
            <div class="feature">
                <div class="media">
                    <div class="media-left media-middle feature-icon">
                        <i class="ec ec-payment"></i>
                    </div>
                    <div class="media-body media-middle feature-text">
                        <strong>Payment</strong> Secure System
                    </div>
                </div>
            </div>
            <div class="feature">
                <div class="media">
                    <div class="media-left media-middle feature-icon">
                        <i class="ec ec-tag"></i>
                    </div>
                    <div class="media-body media-middle feature-text">
                        <strong>Only Best</strong> Brands
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <aside class="widget widget_electro_products_carousel_widget">
        <section class="section-products-carousel" >


            <header>

                <h1>{{ trans('message.featured') }}</h1>

                <div class="owl-nav">
                    <a href="#products-carousel-prev" data-target="#products-carousel-57176fb2dc4a8" class="slider-prev"><i class="fa fa-angle-left"></i></a>
                    <a href="#products-carousel-next" data-target="#products-carousel-57176fb2dc4a8" class="slider-next"><i class="fa fa-angle-right"></i></a>
                </div>

            </header>


            <div id="products-carousel-57176fb2dc4a8">
                <div class="products owl-carousel  products-carousel-widget columns-1">

                    @foreach ($getProductFeatured as $getProductSideBar)
                        <div class="product-carousel-alt">
                            <a href="single-product.html">
                                <div class="product-thumbnail"><img width="250" height="232" src="{{ !empty($getProductSideBar->thumbnail) ? asset('storage/' .$getProductSideBar->thumbnail) : asset('backend\dist\img\placeholder.png') }}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="Smartwatch2" /></div>
                            </a>

                            <a href="single-product.html"><h3>{{ $getProductSideBar->name }}</h3></a>
                            <span class="price"><span class="electro-price"><span class="amount">{{ \App\Helpers\Common::numberFormat($productFeatured->discount_price) }} đ</span></span></span>
                            <del><span class="amount">{{ \App\Helpers\Common::numberFormat($productFeatured->price) }} đ</span></del>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    </aside>
    <aside class="widget electro_posts_carousel_widget">
        <section class="section-posts-carousel">
            <header>

                <h3 class="widget-title">{{ trans('message.blog') }}</h3>
                <div class="owl-nav">
                    <a href="#posts-carousel-prev" data-target="#posts-carousel-57176fb2e4a7f" class="slider-prev"><i class="fa fa-angle-left"></i></a>
                    <a href="#posts-carousel-next" data-target="#posts-carousel-57176fb2e4a7f" class="slider-next"><i class="fa fa-angle-right"></i></a>
                </div>

            </header>

            <div id="posts-carousel-57176fb2e4a7f" class="blog-carousel-homev2">
                <div class="owl-carousel post-carousel blog-carousel-widget">
                    @foreach ($posts as $post)
                        <div class="post-item">
                            <a class="post-thumbnail" href="{{ route('home.post.index') }}">
                                <img width="270" height="180" src="{{ !empty($post->thumbnail) ? asset('storage/' .$post->thumbnail) : asset('backend\dist\img\placeholder.png') }}" class="wp-post-image" alt="1"/>
                            </a>
                                <div class="post-content">
                                    <span class="post-date">{{ date("d/m/Y H:i:s", strtotime($post->created_at)) }}</span>
                                    <a class ="post-name" href="{{ route('home.post.index') }}">{{ $post->name }}</a>
                                    <span class="comments-link"><a href="blog-single.html#comments">Leave a comment</a></span>
                                </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </aside>
</div>