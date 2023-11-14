@extends('frontend.layouts.master')


@section('content')
    <div class="container">

        <nav class="woocommerce-breadcrumb"><a href="{{ route('home.index') }}">{{ trans('message.home') }}</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>{{ trans('message.checkout.title') }}</nav>

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <article class="page type-page status-publish hentry">
                    <header class="entry-header"><h1 itemprop="name" class="entry-title">{{ trans('message.checkout.title') }}</h1></header><!-- .entry-header -->

                    <form enctype="multipart/form-data" action="{{ route('home.payment') }}" class="checkout woocommerce-checkout" method="post" name="checkout">
                        {{ csrf_field() }}
                        <div id="customer_details" class="col2-set">
                            <div class="col-1">
                                <div class="woocommerce-billing-fields">

                                    <h3>{{ trans('message.checkout.detail') }}</h3>

                                    <p id="billing_first_name_field" class="form-row form-row form-row-first validate-required"><label class="" for="billing_first_name">{{ trans('message.checkout.first_name') }} <abbr title="required" class="required">*</abbr></label><input type="text" value="{{ Auth::check() ? Auth::user()->first_name : '' }}" placeholder="" id="billing_first_name" name="first_name" class="input-text "></p>
                                    @error('first_name')
                                        <span class="error">{{ $message }}</span>
                                    @enderror

                                    <p id="billing_last_name_field" class="form-row form-row form-row-last validate-required"><label class="" for="billing_last_name">{{ trans('message.checkout.last_name') }} <abbr title="required" class="required">*</abbr></label><input type="text" value="{{ Auth::check() ? Auth::user()->last_name : '' }}" placeholder="" id="billing_last_name" name="last_name" class="input-text "></p><div class="clear"></div>
                                    @error('last_name')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                    <p id="billing_email_field" class="form-row form-row form-row-first validate-required validate-email"><label class="" for="billing_email">Email <abbr title="required" class="required">*</abbr></label><input type="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" placeholder="" id="billing_email" name="email" class="input-text "></p>
                                    @error('email')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                    <p id="billing_phone_field" class="form-row form-row form-row-last validate-required validate-phone"><label class="" for="billing_phone">{{ trans('message.checkout.phone') }} <abbr title="required" class="required">*</abbr></label><input type="tel" value="{{ Auth::check() ? Auth::user()->phone : '' }}" placeholder="" id="billing_phone" name="phone" class="input-text "></p><div class="clear"></div>
                                    @error('phone')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                    <div class="clear"></div>

                                    @if (!auth()->check())
                                    <p class="form-row form-row-wide create-account"><a href="{{ route('home.login') }}">Create an account?</a></p>
                                    @endif

                                </div>
                            </div>

                            <div class="col-2">
                                <div class="woocommerce-shipping-fields">
                                    <p id="order_comments_field" class="form-row form-row notes"><label class="" for="order_comments">{{ trans('message.checkout.note') }}</label><textarea cols="5" rows="2" placeholder="Notes about your order, e.g. special notes for delivery." id="order_comments" class="input-text " name="note"></textarea></p>
                                    <p id="billing_address_1_field" class="form-row form-row form-row-wide address-field validate-required"><label class="" for="billing_address_1">{{ trans('message.checkout.address') }} <abbr title="required" class="required">*</abbr></label><input type="text" value="" placeholder="Street address" id="billing_address_1" name="address" class="input-text "></p>
                                    @error('address')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <h3 id="order_review_heading">{{ trans('message.checkout.MyOrder') }}</h3>

                        <div class="woocommerce-checkout-review-order" id="order_review">
                            <table class="shop_table woocommerce-checkout-review-order-table">
                                <thead>
                                    <tr>
                                        <th class="product-name">{{ trans('message.checkout.product') }}</th>
                                        <th class="product-total">{{ trans('message.checkout.total') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (\Cart::content() as $cart)
                                        <tr class="cart_item">
                                            <td class="product-thumbnail">
                                                <a href=""><img width="180" height="180" src="{{ asset('storage/' . $cart->options->image) }}" alt=""></a>
                                            </td>
                                            <td class="product-name">
                                                {{ $cart->name }}
                                                <strong class="product-quantity">× {{ $cart->qty }}</strong>
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">{{ \App\Helpers\Common::numberFormat($cart->price) }} đ</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="order-total">
                                        <th>{{ trans('message.checkout.total') }}</th>
                                        <td><strong><span class="amount">{{ \Cart::subtotal(0) }} đ</span></strong> </td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="woocommerce-checkout-payment" id="payment">
                                <ul class="wc_payment_methods payment_methods methods">
                                    {{-- <li class="wc_payment_method payment_method_bacs">
                                        <input type="radio" data-order_button_text="" checked="checked" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs">
                                        <label for="payment_method_bacs">Direct Bank Transfer</label>
                                        <div class="payment_box payment_method_bacs">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                        </div>
                                    </li>
                                    <li class="wc_payment_method payment_method_cheque">
                                        <input type="radio" data-order_button_text="" value="cheque" name="payment_method" class="input-radio" id="payment_method_cheque">
                                        <label for="payment_method_cheque">Cheque Payment 	</label>
                                        <div style="display:none;" class="payment_box payment_method_cheque">
                                            <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                        </div>
                                    </li>
                                    <li class="wc_payment_method payment_method_cod">
                                        <input type="radio" data-order_button_text="" value="cod" name="payment_method" class="input-radio" id="payment_method_cod">

                                        <label for="payment_method_cod">Cash on Delivery</label>
                                        <div style="display:none;" class="payment_box payment_method_cod">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </li> --}}
                                    {{-- <li class="wc_payment_method payment_method_paypal">
                                        <input type="radio" data-order_button_text="Proceed to PayPal" value="paypal" name="payment_method" class="input-radio" id="payment_method_paypal">

                                        <label for="payment_method_paypal">PayPal <img alt="PayPal Acceptance Mark" src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg"><a title="What is PayPal?" onclick="javascript:window.open('https://www.paypal.com/us/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;" class="about_paypal" href="https://www.paypal.com/us/webapps/mpp/paypal-popup">What is PayPal?</a></label>
                                        <div style="display:none;" class="payment_box payment_method_paypal">
                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                        </div>
                                    </li> --}}
                                    <li class="wc_payment_method payment_method_paypal">
                                        <input type="radio" checked data-order_button_text="Proceed to PayPal" value="1" name="payment_method" class="input-radio" id="payment_method_paypal">

                                        <label for="payment_method_paypal">VNPAY <img alt="PayPal Acceptance Mark" src="data:image/png;base64,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"></label>
                                    </li>
                                </ul>
                                <div class="form-row place-order">
                                    <input type="submit" data-value="Place order" value="{{ trans('message.checkout.place_order') }}" class="button alt">
                                </div>
                            </div>
                        </div>
                    </form>
                </article>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .container -->
@endsection

@section('addJs')
    
@endsection