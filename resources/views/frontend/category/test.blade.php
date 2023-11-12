<ul class="products columns-3">
    @if (!empty($filteredProducts))
    @foreach ($filteredProducts as $key => $product)
        @php
            $class = 'product'; // Default class for products in the middle

            if ($key === 0) {
                $class = 'product first'; // Add 'first' class to the first product
            } elseif ($key === count($filteredProducts) - 1) {
                $class = 'product last'; // Add 'last' class to the last product
            }else{
                $class = 'product';
            }
        @endphp

        <li class="{{ $class }}">
            <div class="product-outer">
                <div class="product-inner">
                    <span class="loop-product-categories"><a href="product-category.html" rel="tag">{{ $category->name_category }}</a></span>
                    <a href="single-product.html">
                        <h3>{{ $product->name }}</h3>
                        <div class="product-thumbnail">

                            <img data-echo="{{ !empty($product->thumbnail) ? asset('storage/' .$product->thumbnail) : asset('backend\dist\img\placeholder.png') }}" 
                            src="{{ !empty($product->thumbnail) ? asset('storage/' .$product->thumbnail) : asset('backend\dist\img\placeholder.png') }}" alt="">

                        </div>
                    </a>

                    <div class="price-add-to-cart">
                        <span class="price">
                            <span class="electro-price">
                                <ins><span class="amount">{{ \App\Helpers\Common::numberFormat($product->discount_price) }} đ</span></ins>
                                <del><span class="amount"> {{ \App\Helpers\Common::numberFormat($product->price) }} đ</span></del>
                            </span>
                        </span>
                        <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                    </div><!-- /.price-add-to-cart -->

                    <div class="hover-area">
                        <div class="action-buttons">
                            <a href="#" rel="nofollow" class="add_to_wishlist">{{ trans('message.wishlist') }}</a>
                            <a href="#" class="add-to-compare-link">Compare</a>
                        </div>
                    </div>
                </div>
                <!-- /.product-inner -->
            </div><!-- /.product-outer -->
        </li>
    @endforeach
    @endif
</ul>
<div class="shop-control-bar-bottom">
    {!! $filteredProducts->links('pagination::bootstrap-4') !!}
</div>