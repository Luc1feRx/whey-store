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

                <header class="entry-header">
                    <h1 class="entry-title" itemprop="name">{{ trans('message.trackOrder.title') }}</h1>
                </header><!-- .entry-header -->

                <div class="entry-content" itemprop="mainContentOfPage">
                    <div class="woocommerce">
                        <form action="#" method="post" class="track_order">

                            <p>To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>

                            <p class="form-row form-row-first">
                                <label for="orderid">{{ trans('message.checkout.phone') }}</label>
                                <input class="input-text" type="text" name="phone" id="orderid" placeholder="{{ trans('message.trackOrder.placeholder-phone') }}">
                            </p>

                            <p class="form-row form-row-last">
                                <label for="order_email">Email</label>
                                <input class="input-text" type="text" name="email" id="order_email" placeholder="Email you used during checkout.">
                            </p>

                            <div class="clear"></div>

                            <p class="form-row">
                                <input type="submit" class="button" name="track" value="Track">
                            </p>
                        </form>
                    </div>
                    <table class="shop_table shop_table_responsive cart">
                        <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">{{ trans('message.trackOrder.user_name') }}</th>
                                <th class="product-name">{{ trans('message.') }}</th>
                                <th class="product-price">{{ trans('message.cart.Price') }}</th>
                                <th class="product-quantity">{{ trans('message.cart.Quantity') }}</th>
                                <th class="product-subtotal">{{ trans('message.cart.Total') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                                <tr class="cart_item">

                                    <td class="product-thumbnail">
                                        <a href=""><img width="180" height="180" src="" alt=""></a>
                                    </td>

                                    <td data-title="Product" class="product-name">
                                        <a href=""></a>
                                    </td>

                                    <td data-title="Product" class="product-name">
                                        <span></span>
                                    </td>

                                    <td data-title="Price" class="product-price">
                                        <span class="amount"></span>
                                    </td>

                                    <td data-title="Quantity" class="product-quantity">
                                        {{-- <div class="quantity buttons_added">
                                            <input type="button" class="minus" data-price="{{ $item->price }}" data-url="{{  route('home.cart.update', ['id' => $key]) }}" data-product-id="{{  $item->id }}" value="-">
                                            <label>{{ __('message.quantity') }}</label>
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="{{ $item->qty }}" name="quantity" max="29" min="0" step="1">
                                            <input type="button" data-price="{{ $item->price }}" data-url="{{  route('home.cart.update', ['id' => $key]) }}" data-product-id="{{  $item->id }}" class="plus" value="+">
                                        </div>
                                    </td> --}}

                                    <td data-title="Total" class="product-subtotal">
                                        <span class="amount productTotalAmount_"></span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- .entry-content -->

            </article><!-- #post-## -->

        </main><!-- #main -->
    </div><!-- #primary -->


</div><!-- .col-full -->
@endsection

@section('addJs')
    
@endsection