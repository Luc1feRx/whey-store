@extends('frontend.layouts.master')


@section('content')
<div class="container">

    <nav class="woocommerce-breadcrumb">
        <a href="home.html">Home</a>
        <span class="delimiter"><i class="fa fa-angle-right"></i></span>{{ trans('message.trackOrder.title') }}
    </nav><!-- .woocommerce-breadcrumb -->

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <article id="post-2181" class="post-2181 page type-page status-publish hentry">

                <div class="entry-content" itemprop="mainContentOfPage">
                    @if (count($order_details) > 0)
                        <table class="shop_table shop_table_responsive cart">
                            <thead>
                                <tr>
                                    <th class="product-price">Hình ảnh</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Loại sản phẩm</th>
                                    <th class="product-subtotal">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order_details as $item)
                                    <tr class="cart_item">

                                        <td class="product-thumbnail">
                                            <a href=""><img width="180" height="180" src="{{ asset('storage/' . $item->product_thumbnail) }}" alt=""></a>
                                        </td>

                                        <td data-title="Product" class="product-name">
                                            <span>{{ $item->product_name }}</span>
                                        </td>

                                        <td data-title="Price" class="product-price">
                                            <span class="amount">{{ $item->order_detail_quantity }}</span>
                                        </td>

                                        <td data-title="Price" class="product-price">
                                            <span class="amount">{{ $item->flavor_name }}</span>
                                        </td>

                                        <td data-title="Price" class="product-price">
                                            <span class="amount">{{ \App\Helpers\Common::numberFormat($item->order_detail_price * $item->order_detail_quantity) }} đ</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Không có sản phẩm nào</p>
                    @endif
                </div><!-- .entry-content -->

            </article><!-- #post-## -->

        </main><!-- #main -->
    </div><!-- #primary -->


</div><!-- .col-full -->
@endsection

@section('addJs')
    
@endsection