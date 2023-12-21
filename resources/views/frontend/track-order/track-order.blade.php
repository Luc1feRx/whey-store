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
                        <form action="{{ route('home.trackOrder') }}" method="GET" class="track_order">
                            <p>{{ trans('message.trackOrder.info') }}</p>
                            <p class="form-row form-row-first">
                                <label for="orderid">{{ trans('message.checkout.phone') }}</label>
                                <input class="input-text" type="text" name="phone" id="orderid" value="{{ auth()->check() ? auth()->user()->phone : '' }}" placeholder="{{ trans('message.trackOrder.phone') }}">
                                @error('phone')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </p>

                            <p class="form-row form-row-last">
                                <label for="order_email">Email</label>
                                <input class="input-text" type="text" name="email" value="{{ auth()->check() ? auth()->user()->email : '' }}" id="order_email" placeholder="Email">
                                @error('email')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </p>

                            <div class="clear"></div>

                            <p class="form-row">
                                <input type="submit" class="button" value="Track">
                            </p>
                        </form>
                    </div>
                    @if (count($orders) > 0)
                        <table class="shop_table shop_table_responsive cart">
                            <thead>
                                <tr>
                                    <th class="product-name">{{ trans('message.trackOrder.user_name') }}</th>
                                    <th class="product-price">{{ trans('message.trackOrder.Address') }}</th>
                                    <th class="product-quantity">{{ trans('message.trackOrder.phone') }}</th>
                                    <th class="product-subtotal">{{ trans('message.trackOrder.payment_method') }}</th>
                                    <th class="product-subtotal">{{ trans('message.trackOrder.transaction_code') }}</th>
                                    <th class="product-subtotal">{{ trans('message.trackOrder.total') }}</th>
                                    <th class="product-subtotal">{{ trans('message.trackOrder.status') }}</th>
                                    <th class="product-subtotal">{{ trans('message.trackOrder.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr class="cart_item">

                                        <td data-title="Product" class="product-name">
                                            <span>{{ $item->user_name }}</span>
                                        </td>

                                        <td data-title="Product" class="product-name">
                                            <span>{{ $item->address }}</span>
                                        </td>

                                        <td data-title="Price" class="product-price">
                                            <span class="amount">{{ $item->phone }}</span>
                                        </td>

                                        <td data-title="Price" class="product-price">
                                            <span class="amount">{!! $item->payment_method == 1 ? '<img style="width: 150px; width: 70px;" src="\backend\dist\img\vnpay-logo-inkythuatso-01-13-16-26-42.jpg" alt="" srcset="">' : '' !!}</span>
                                        </td>

                                        <td data-title="Price" class="product-price">
                                            <span class="amount">{{ $item->transaction_code }}</span>
                                        </td>
                                        <td data-title="Price" class="product-price">
                                            <span class="amount">{{ \App\Helpers\Common::numberFormat($item->order_total) }} đ</span>
                                        </td>

                                        @php
                                            $arrStatus = [
                                                \App\Models\Order::RECEIVE => 'Tiếp nhận',
                                                \App\Models\Order::SUCCESS => 'Thành công',
                                                \App\Models\Order::PENDING => 'Đang vận chuyển',
                                                \App\Models\Order::CANCEL => 'Hủy đơn hàng'
                                            ]
                                        @endphp
                                        <td data-title="Price" class="product-price">
                                            <span class="amount">{{ $arrStatus[$item->status] }}</span>
                                        </td>

                                        <td data-title="Price" class="product-price">
                                            <a href="{{ route('home.getOrderDetail', ['id' => $item->id]) }}" class="btn btn-icon btn-sm tip" data-toggle="tooltip" title="Xem chi tiết đơn hàng"><i
                                                class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        @if (request()->has('phone') || request()->has('email'))
                            <p>Không có đơn hàng nào</p>
                        @endif
                    @endif
                </div><!-- .entry-content -->

            </article><!-- #post-## -->

        </main><!-- #main -->
    </div><!-- #primary -->


</div><!-- .col-full -->
@endsection

@section('addJs')
    
@endsection