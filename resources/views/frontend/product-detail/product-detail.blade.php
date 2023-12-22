@extends('frontend.layouts.master')

@section('addCss')
    <style>
            .out-of-stock {
                color: red !important; /* Set color to red for out-of-stock items */
            }

            .dis-none{
                display: none;
            }

            .dis-show{
                display: block;
            }
    </style>
@endsection

@section('title')
    <title>{{ $productDetail->product_name }}</title>
@endsection

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
                                            <a href="" class="" title=""><img src="{{ asset('storage/' .$product_image->image) }}" data-echo="{{ asset('storage/' .$product_image->image) }}" class="wp-post-image" alt=""></a>
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
    
                                    <a href="#reviews" class="woocommerce-review-link">(<span itemprop="reviewCount" class="count">{{ $reviewCount }}</span> {{ trans('message.customer_reviews') }})</a>
                                </div><!-- .woocommerce-product-rating -->
    
                                <div class="brand">
                                    <a href="product-category.html">
                                        <img src="{{ asset('storage/' .$productDetail->brand_thumbnail) }}" alt="{{ $productDetail->brand_name }}" />
                                    </a>
                                </div><!-- .brand -->
                                @php
                                    $totalQuantity = $productDetail->flavors->sum(function($flavor) {
                                        return $flavor->pivot->quantity;
                                    });
                                @endphp
    
                                <div class="availability in-stock">{{ trans('message.Availablity') }}: <span>{{ $totalQuantity > 0 ? trans('message.inStock') : trans('message.outStock') }}</span></div><!-- .availability -->
    
                                <hr class="single-product-title-divider" />
    
                                <div class="action-buttons">
    
                                    @if (!$isFavorite)
                                        <a href="{{ route('home.addToFavorites', ['productId'=>$productDetail->id]) }}" class="add_to_wishlist" >
                                            {{ trans('message.wishlist') }}
                                        </a>
                                    @else
                                        <a href="{{ route('home.removeFromFavorites', ['productId'=>$productDetail->id]) }}" style="color: red" class="add_to_wishlist" >
                                            {{ trans('message.RemoveWishlist') }}
                                        </a>
                                    @endif
    
    
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
                                                    <select class="flavor-select" name="product_flavor" data-product-id="{{ $productDetail->id }}">
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
                                                <input type="number" name="quantity" value="1" title="Qty" class="input-text qty text cart_product_quantity_{{ $productDetail->id }}"/>
                                            </div>
                                            <input type="hidden" class="cart_product_id_{{ $productDetail->id }}" name="product_id" value="{{ $productDetail->id }}" />
                                            <input type="hidden" class="cart_product_name_{{ $productDetail->id }}" name="product_name" value="{{ $productDetail->product_name }}" />
                                            <input type="hidden" class="cart_product_name_{{ $productDetail->id }}" name="product_thumbnail" value="{{ $productDetail->product_thumbnail }}" />
                                            <input type="hidden" class="cart_product_name_{{ $productDetail->id }}" name="product_price" value="{{ !empty($productDetail->discount_price) ? $productDetail->discount_price : $productDetail->price }}" />
                                            <input type="hidden" class="cart_product_name_{{ $productDetail->id }}" name="product_weight" value="{{ $productDetail->product_weight }}" />
                                            <button type="submit" class="single_add_to_cart_button button">{{ trans('message.addToCart') }}</button>
                                        </div>
                                    </div>
                                </form>
    
                            </div><!-- .summary -->
                        </div><!-- /.single-product-wrapper -->
    
    
                        <div class="woocommerce-tabs wc-tabs-wrapper">
                            <ul class="nav nav-tabs electro-nav-tabs tabs wc-tabs" role="tablist">
                                <li class="nav-item description_tab">
                                    <a href="#tab-description" data-toggle="tab">{{ trans('message.description') }}</a>
                                </li>
    
                                <li class="nav-item specification_tab">
                                    <a href="#tab-specification" data-toggle="tab">{{ trans('message.Specification') }}</a>
                                </li>
    
                                <li class="nav-item reviews_tab">
                                    <a href="#tab-reviews" data-toggle="tab" class="active">{{ trans('message.Reviews') }}</a>
                                </li>
                            </ul>
    
                            <div class="tab-content">
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
    
                                <div class="tab-pane in panel entry-content wc-tab" id="tab-specification">
                                    <h3>{{ trans('message.specifications') }}</h3>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>{{ trans('message.spec.weight') }}</td>
                                                <td>{{ $productDetail->product_weight }} kg</td>
                                            </tr>
                                            <tr>
                                                <td>{{ trans('message.spec.score') }}</td>
                                                <td>{{ $productDetail->score }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ trans('message.spec.origin') }}</td>
                                                <td>{{ $productDetail->origin }}</td>
                                            </tr>
                                            <tr>
                                                <td>Serving Size</td>
                                                <td>{{ $productDetail->serving_size }} scoop</td>
                                            </tr>
                                            <tr class="size-weight">
                                                <td>{{ trans('message.spec.main_ingredient') }}</td>
                                                <td>{{ $productDetail->main_ingredient }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- /.panel -->
    
                                <div class="tab-pane panel entry-content wc-tab active" id="tab-reviews">
                                    <div id="reviews" class="electro-advanced-reviews">
                                        <div class="advanced-review row">
                                            <div class="col-xs-12 col-md-6">
                                                <h2 class="based-title">{{ trans('message.all_comments', ['attributes' => $totalComments]) }}</h2>
                                                <div class="avg-rating">
                                                    <span class="avg-rating-number">{{ $averageRating }}</span> {{ trans('message.overall') }}
                                                </div>
    
                                                <div class="rating-histogram">
                                                    @for ($i = 5; $i >= 1; $i--)
                                                        <div class="rating-bar">
                                                            <div class="star-rating" title="Rated {{ $i }} out of 5">
                                                                <span style="width:{{ $i*20 }}%"></span> {{-- Ví dụ: 5 sao sẽ là 100%, 4 sao là 80%, v.v. --}}
                                                            </div>
                                                            <div class="rating-percentage-bar">
                                                                {{-- Tính phần trăm rating dựa trên tổng số đánh giá --}}
                                                                @php
                                                                    $percentage = ($totalComments > 0) ? ($ratings[$i] / $totalComments * 100) : 0;
                                                                @endphp
                                                                <span style="width:{{ $percentage }}%" class="rating-percentage"></span>
                                                            </div>
                                                            <div class="rating-count{{ $ratings[$i] == 0 ? ' zero' : '' }}">{{ $ratings[$i] }}</div>
                                                        </div><!-- .rating-bar -->
                                                    @endfor
                                                </div>
                                            </div><!-- /.col -->
    
                                            <div class="col-xs-12 col-md-6">
                                                @if (Auth::check())
                                                    <div id="review_form_wrapper">
                                                        <div id="review_form">
                                                            <div id="respond" class="comment-respond">
        
                                                                <form action="#" method="post" id="commentform" class="comment-form">
                                                                    <p class="comment-form-rating">
                                                                        <label>{{ trans('message.rating') }}</label>
                                                                    </p>

                                                                    <div id="rateYo"></div>

                                                                    <input type="hidden" value="" name="rating" id="rating-star">
                                                                    <input type="hidden" value="{{ $productDetail->id }}" name="product_id" id="product_id">
        
                                                                    <p class="comment-form-comment">
                                                                        <label for="comment">{{ trans('message.review') }}</label>
                                                                        <textarea id="comment" name="content" cols="45" rows="8" aria-required="true"></textarea>
                                                                    </p>
        
                                                                    <p class="form-submit">
                                                                        <input name="submit" type="submit" id="submit" class="submit" value="{{ trans('message.add_comment') }}" />
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
                                                @foreach ($reviews as $review)
                                                <li class="comment odd alt thread-odd thread-alt depth-1">
            
                                                    <div class="comment_container">
    
                                                        <img alt='' src="assets/images/blog/avatar.jpg" class='avatar' height='60' width='60' />
                                                        <div class="comment-text">
                                                            
                                                            @for($i = 1 ; $i <= $review->rating ; $i++)
                                                                <span class="{{  $i <= $review->rating ? 'active' : '' }}" style="color: #fed700 !important"><i class="fa fa-star"></i></span>
                                                            @endfor
    
                                                            <div itemprop="description" class="description">
                                                                <p>
                                                                    {{ $review->content }}
                                                                </p>
                                                            </div>
    
                                                            <p class="meta">
                                                                <strong itemprop="author">{{ $review->user->name }}</strong> &ndash; <time itemprop="datePublished" datetime="2016-03-03T14:14:47+00:00">{{ date("d/m/Y H:i:s", strtotime($review->created_at)) }}</time>
                                                            </p>
    
                                                        </div>
                                                    </div>
                                                </li><!-- #comment-## -->
                                                @endforeach
                                                {{-- <li itemprop="review" class="comment even thread-even depth-1">
    
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
                                                </li><!-- #comment-## --> --}}

                                            </ol><!-- /.commentlist -->
                                            <div>{!! $reviews->links('pagination::bootstrap-4') !!}</div>
    
                                        </div><!-- /#comments -->
    
                                        <div class="clear"></div>
                                    </div><!-- /.electro-advanced-reviews -->
                                </div><!-- /.panel -->
                            </div>
                        </div><!-- /.woocommerce-tabs -->
                        <div class="related products">
                            <h2>{{ trans('message.related_products') }}</h2>
    
                            <ul class="products columns-5">
                                @foreach ($relatedProducts as $product_related)
                                <li class="product">
                                    <div class="product-outer">
                                        <div class="product-inner">
                                            <a href="{{ route('home.product-detail', ['slug'=>$product_related->slug]) }}">
                                                <h3>{{ $product_related->name }}</h3>
                                                <div class="product-thumbnail">
                                                    <img data-echo="{{ asset('storage/' .$product_related->thumbnail) }}" src="{{ asset('storage/' .$product_related->thumbnail) }}" alt="">
                                                </div>
                                            </a>
    
                                            <div class="price-add-to-cart">
                                                <span class="price">
                                                    <span class="electro-price">
                                                        @if (!empty($product_related->percent))
                                                            <ins><span class="amount"> {{ \App\Helpers\Common::numberFormat($product_related->discount_price) }} đ</span></ins>
                                                            <del><span class="amount"> {{ \App\Helpers\Common::numberFormat($product_related->price) }} đ</span></del>
                                                            <span class="amount"> </span>
                                                        @else
                                                            <ins><span class="amount"> {{ \App\Helpers\Common::numberFormat($product_related->price) }} đ</span></ins>
                                                        @endif
                                                    </span>
                                                </span>
                                                <a rel="nofollow" href="{{ route('home.product-detail', ['slug'=>$product_related->slug]) }}" class="button add_to_cart_button">Add to cart</a>
                                            </div><!-- /.price-add-to-cart -->
    
                                            <div class="hover-area">
                                                <div class="action-buttons">
                                                    <a href="{{ route('home.addToFavorites', ['productId'=>$product_related->id]) }}" rel="nofollow" class="add_to_wishlist"> {{ trans('message.wishlist') }}</a>
                                                </div>
                                            </div>
                                        </div><!-- /.product-inner -->
                                    </div><!-- /.product-outer -->
                                </li>
                                @endforeach
                            </ul><!-- /.products -->
                        </div><!-- /.related -->
                    </div>
                </main><!-- /.site-main -->
            </div><!-- /.content-area -->
    
            <div id="sidebar" class="sidebar" role="complementary">
                <aside id="woocommerce_products-2" class="widget woocommerce widget_products">
                    <h3 class="widget-title">{{ trans('message.product_view_lastest') }}</h3>
                    <ul class="product_list_widget">
                        @foreach ($getProductByViewCount as $product_by_view)
                            <li>
                                <a href="{{ route('home.product-detail', ['slug'=>$product_by_view->slug]) }}" title="Notebook Black Spire V Nitro  VN7-591G">
                                    <img class="wp-post-image" src="{{ !empty($product_by_view->thumbnail) ? asset('storage/' .$product_by_view->thumbnail) : asset('backend\dist\img\placeholder.png') }}" alt="">
                                    <span class="product-title">{{ $product_by_view->name }}</span>
                                </a>
                                <span class="electro-price"><ins><span class="amount">{{ \App\Helpers\Common::numberFormat($product_by_view->discount_price) }} đ</span></ins> <del><span class="amount">{{ \App\Helpers\Common::numberFormat($product_by_view->price) }} đ</span></del></span>
                            </li>
                        @endforeach
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
    @if (session('success'))
        @include('frontend.partials.toastr')
    @endif
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
                            toastr["success"](response.msg);

                            // Đợi 1 giây trước khi tải lại trang
                            setTimeout(function() {
                                window.location.reload();
                            }, 700);
                        },
                    });
                });
                // add to cart
                jQuery(".variations_form").submit(function(e) {
                    // Lấy dữ liệu từ form
                    e.preventDefault();
                    var product_id = jQuery('input[name=product_id]').val();
                    var product_name = jQuery('input[name=product_name]').val();
                    var product_thumbnail = jQuery('input[name=product_thumbnail]').val();
                    var product_price = jQuery('input[name=product_price]').val();
                    var product_quantity = jQuery('input[name=quantity]').val();
                    var product_flavor = jQuery('.flavor-select').find(":selected").text();
                    var product_flavor_id = jQuery('.flavor-select').find(":selected").val();
                    console.log(product_flavor_id);
                    // Gửi dữ liệu lên server
                    jQuery.ajax({
                        type: "POST",
                        url: "{{ route('home.addToCart') }}", // Đặt đúng đường dẫn của endpoint xử lý form trên server
                        headers: {
                            "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr('content'), // Thêm token CSRF vào tiêu đề
                        },
                        data: {
                            product_id: product_id,
                            product_name: product_name,
                            product_thumbnail: product_thumbnail,
                            product_price: product_price,
                            product_quantity: product_quantity,
                            product_flavor: product_flavor,
                            product_flavor_id: product_flavor_id
                        },
                        success: function(response) {
                            // Xử lý kết quả thành công
                            if(response.code == 200){
                                toastr["success"](response.msg);
                                jQuery('.cart-items-count').html(response.html);
                            }else if(response.code == 400){
                                toastr["error"](response.msg)
                            }
                        },
                        error: function(error) {
                            // Xử lý lỗi
                            console.log(error);
                        }
                    });
                });


                jQuery('.flavor-select').on('change', function() {
                    var productId = jQuery(this).data('product-id'); // Assume you have the product ID stored in a data attribute
                    var flavorId = jQuery(this).val();

                    jQuery.ajax({
                        url: '/product/' + productId + '/flavor/' + flavorId + '/quantity',
                        type: 'GET',
                        success: function(data) {
                            var availabilitySpan = jQuery('.availability span');
                            if(data.inStock) {
                                availabilitySpan.text('{{ trans('message.inStock') }}');
                                availabilitySpan.removeClass('out-of-stock').addClass('in-stock');

                                
                                jQuery('.single_variation_wrap').removeClass('dis-none').addClass('dis-show');
                            } else {
                                availabilitySpan.text('{{ trans('message.outStock') }}');
                                availabilitySpan.removeClass('in-stock').addClass('out-of-stock');

                                jQuery('.single_variation_wrap').removeClass('dis-show').addClass('dis-none');
                            }
                        },
                        error: function(request, status, error) {
                            console.log("AJAX error:", status, error);
                        }
                    });
                });
            });
    </script>
@endsection