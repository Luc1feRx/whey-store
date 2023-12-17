@extends('frontend.layouts.master')

@section('addCss')
<style>
    .tracker {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      background: #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .tracker-step {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }
    .tracker-step .icon {
      width: 40px;
      height: 40px;
      border: 2px solid #4CAF50;
      border-radius: 50%;
      color: #4CAF50;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 8px;
    }
    .tracker-step.active .icon {
      background-color: #4CAF50;
      color: white;
    }
    .tracker-line {
      height: 2px;
      background: #4CAF50;
      flex-grow: 1;
    }
    .tracker-text {
      font-size: 14px;
      color: #333;
    }
    .tracker-time {
      font-size: 12px;
      color: #666;
    }
  </style>
@endsection

@section('content')
<div class="container">

    <nav class="woocommerce-breadcrumb">
        <a href="{{ route('home.index') }}">{{ trans('message.home') }}</a>
        <span class="delimiter"><i class="fa fa-angle-right"></i></span>{{ trans('message.trackOrder.title') }}
    </nav><!-- .woocommerce-breadcrumb -->

    <div id="primary" class="content-area">
        <div class="tracker">
            @if ($order->order_status !== 0)
                <div class="tracker-step {{ $order->order_status == 1 ? 'active' : '' }}">
                    <div class="icon">✓</div>
                    <div class="tracker-text">{{ trans('message.trackOrder.status_order.order') }}</div>
                    <div class="tracker-time">{{ $order->order_status == 1 ? date("H:i:s d/m/Y", strtotime($order->order_times_updated_at ?? $order->order_updated_at)) : '' }}</div>
                    </div>
                    <div class="tracker-line"></div>
                    <div class="tracker-step {{ $order->order_status == 3 ? 'active' : '' }}">
                    <div class="icon">✓</div>
                    <div class="tracker-text">{{ trans('message.trackOrder.status_order.shipping') }}</div>
                    <div class="tracker-time">{{ $order->order_status == 3 ? date("H:i:s d/m/Y", strtotime($order->order_times_updated_at ?? $order->order_updated_at)) : '' }}</div>
                    </div>
                    <div class="tracker-line"></div>
                    <div class="tracker-step {{ $order->order_status == 2 ? 'active' : '' }}">
                    <div class="icon">✓</div>
                    <div class="tracker-text">{{ trans('message.trackOrder.status_order.done') }}</div>
                    <div class="tracker-time">{{ $order->order_status == 2 ? date("H:i:s d/m/Y", strtotime($order->order_times_updated_at ?? $order->order_updated_at)) : '' }}</div>
                </div>
                @else
                <div class="tracker-text" style="color: red; font-size: 25px; font-weight: 700">{{ trans('message.trackOrder.status_order.cancel') }}</div>
            @endif
        </div>
        <main id="main" class="site-main">

            <article id="post-2181" class="post-2181 page type-page status-publish hentry">

                <div class="entry-content" itemprop="mainContentOfPage">
                    @if (count($order_details) > 0)
                        <table class="shop_table shop_table_responsive cart">
                            <thead>
                                <tr>
                                    <th class="product-price"></th>
                                    <th class="product-name">{{ trans('message.cart.Product') }}</th>
                                    <th class="product-quantity">{{ trans('message.cart.Quantity') }}</th>
                                    <th class="product-subtotal">{{ trans('message.cart.flavor') }}</th>
                                    <th class="product-subtotal">{{ trans('message.cart.subTotal') }}</th>
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