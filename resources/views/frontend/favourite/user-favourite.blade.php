@extends('frontend.layouts.master')

@section('content')
<div class="container">

    <nav class="woocommerce-breadcrumb"><a href="{{ route('home.index') }}">Trang chủ</a><span class="delimiter"><i
                class="fa fa-angle-right"></i></span>Danh sách yêu thích</nav>
    <div class="content-area" id="primary">
        <main class="site-main" id="main">
            <article class="page type-page status-publish hentry">
				@if (count($productFavourite) > 0)
					<div itemprop="mainContentOfPage" class="entry-content">
						<div id="yith-wcwl-messages"></div>
						<form class="woocommerce" method="post" id="yith-wcwl-form">

							<input type="hidden" value="68bc4ab99c" name="yith_wcwl_form_nonce"
								id="yith_wcwl_form_nonce"><input type="hidden" value="/electro/wishlist/"
								name="_wp_http_referer">
							<!-- TITLE -->
							<div class="wishlist-title ">
								<h2>Danh sách sản phẩm yêu thích</h2>
							</div>

							<!-- WISHLIST TABLE -->
							<table data-token="" data-id="" data-page="1" data-per-page="5" data-pagination="no"
								class="shop_table cart wishlist_table">

								<thead>
									<tr>

										<th class="product-remove"></th>

										<th class="product-thumbnail"></th>

										<th class="product-name">
											<span class="nobr">Tên sản phẩm</span>
										</th>

										<th class="product-price">
											<span class="nobr">Giá tiền</span>
										</th>
										<th class="product-stock-stauts">
											<span class="nobr">Tình trạng</span>
										</th>

										<th class="product-add-to-cart"></th>

									</tr>
								</thead>

								<tbody>
									@foreach ($productFavourite as $productFav)
									<tr>
										<td class="product-remove">
											<div>
												<a title="Remove this product" class="remove remove_from_wishlist"
													href="{{ route('home.removeFromFavorites', ['productId'=>$productFav->id]) }}">×</a>
											</div>
										</td>

										<td class="product-thumbnail">
											<a href="{{ route('home.product-detail', ['slug'=>$productFav->slug]) }}"><img width="180" height="180" alt="1"
													class="wp-post-image" src="{{ asset('storage/' .$productFav->thumbnail) }}"></a>
										</td>

										<td class="product-name">
											<a href="{{ route('home.product-detail', ['slug'=>$productFav->slug]) }}">{{ $productFav->name }}</a>
										</td>

										<td class="product-price">
											<span class="electro-price"><span class="amount">{{ \App\Helpers\Common::numberFormat($productFav->discount_price) }} đ</span></span>
										</td>

										<td class="product-stock-status">
											<span class="in-stock">In stock</span>
										</td>
									</tr>
									@endforeach
								</tbody>

								<tfoot>
									<tr>
										<td colspan="6"></td>
									</tr>
								</tfoot>

							</table>

							<input type="hidden" value="85fe311a9d" name="yith_wcwl_edit_wishlist"
								id="yith_wcwl_edit_wishlist"><input type="hidden" value="/electro/wishlist/"
								name="_wp_http_referer">

						</form>

					</div><!-- .entry-content -->
				@else
					
				@endif

            </article><!-- #post-## -->

            <section class="brands-carousel">
            	<h2 class="sr-only">Brands Carousel</h2>
            	<div class="container">
            		<div id="owl-brands" class="owl-brands owl-carousel unicase-owl-carousel owl-outer-nav owl-loaded owl-drag">

            			<!-- /.item -->


            			<!-- /.item -->


            			<!-- /.item -->


            			<!-- /.item -->


            			<!-- /.item -->


            			<!-- /.item -->


            			<!-- /.item -->


            			<!-- /.item -->


            			<!-- /.item -->


            			<!-- /.item -->


            			<!-- /.item -->


            			<!-- /.item -->


            		<div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2806px; padding-left: 1px; padding-right: 1px;"><div class="owl-item active" style="width: 233.6px;"><div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>Acer</h4>
            							</div><!-- /.info -->
            						</figcaption>

            						 <img src="assets/images/brands/1.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div></div><div class="owl-item active" style="width: 233.6px;"><div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>Apple</h4>
            							</div><!-- /.info -->
            						</figcaption>

            						 <img src="assets/images/brands/2.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div></div><div class="owl-item active" style="width: 233.6px;"><div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>Asus</h4>
            							</div><!-- /.info -->
            						</figcaption>

            						 <img src="assets/images/brands/3.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div></div><div class="owl-item active" style="width: 233.6px;"><div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>Dell</h4>
            							</div><!-- /.info -->
            						</figcaption>

            						<img src="assets/images/brands/4.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div></div><div class="owl-item active" style="width: 233.6px;"><div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>Gionee</h4>
            							</div><!-- /.info -->
            						</figcaption>

            						<img src="assets/images/brands/5.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div></div><div class="owl-item" style="width: 233.6px;"><div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>HP</h4>
            							</div><!-- /.info -->
            						</figcaption>

            						<img src="assets/images/brands/6.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div></div><div class="owl-item" style="width: 233.6px;"><div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>HTC</h4>
            							</div><!-- /.info -->
            						</figcaption>

            						<img src="assets/images/brands/3.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div></div><div class="owl-item" style="width: 233.6px;"><div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>IBM</h4>
            							</div><!-- /.info -->
            						</figcaption>

            						<img src="assets/images/blank.gif" data-echo="assets/images/brands/5.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div></div><div class="owl-item" style="width: 233.6px;"><div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>Lenova</h4>
            							</div><!-- /.info -->
            						</figcaption>

            						<img src="assets/images/blank.gif" data-echo="assets/images/brands/2.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div></div><div class="owl-item" style="width: 233.6px;"><div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>LG</h4>
            							</div><!-- /.info -->
            						</figcaption>

            						<img src="assets/images/blank.gif" data-echo="assets/images/brands/1.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div></div><div class="owl-item" style="width: 233.6px;"><div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>Micromax</h4>
            							</div><!-- /.info -->
            						</figcaption>

            						<img src="assets/images/blank.gif" data-echo="assets/images/brands/6.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div></div><div class="owl-item" style="width: 233.6px;"><div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>Microsoft</h4>
            							</div><!-- /.info -->
            						</figcaption>

            						<img src="assets/images/blank.gif" data-echo="assets/images/brands/4.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div></div></div></div><div class="owl-nav"><div class="owl-prev disabled"><i class="fa fa-chevron-left"></i></div><div class="owl-next"><i class="fa fa-chevron-right"></i></div></div><div class="owl-dots disabled"></div></div><!-- /.owl-carousel -->

            	</div>
            </section>

        </main><!-- #main -->
    </div><!-- #primary -->
</div>
@endsection