@extends('frontend.layouts.master')

@section('content')
<div class="container">

    <nav class="woocommerce-breadcrumb"><a href="{{ route('home.index') }}">{{ trans('message.home') }}</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>{{ trans('message.cart.title') }}</nav>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            @if (!empty($carts))
                <article class="page type-page status-publish hentry">
                    <header class="entry-header"><h1 itemprop="name" class="entry-title">{{ trans('message.cart.title') }}</h1></header><!-- .entry-header -->

                    <form>

                        <table class="shop_table shop_table_responsive cart">
                            <thead>
                                <tr>
                                    <th class="product-remove">&nbsp;</th>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">{{ trans('message.cart.Product') }}</th>
                                    <th class="product-name">{{ trans('message.cart.flavor') }}</th>
                                    <th class="product-price">{{ trans('message.cart.Price') }}</th>
                                    <th class="product-quantity">{{ trans('message.cart.Quantity') }}</th>
                                    <th class="product-subtotal">{{ trans('message.cart.Total') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($carts as $key => $item)
                                    <tr class="cart_item">

                                        <td class="product-remove">
                                            <a class="remove" data-row-id="{{ $key }}" data-url="{{ route('home.cart.delete', ['id'=>$key]) }}">×</a>
                                        </td>
                                        {{-- {{ route('home.product-detail', ['slug'=>$item->options->slug]) }} --}}
                                        <td class="product-thumbnail">
                                            <a href=""><img width="180" height="180" src="{{ asset('storage/' . $item->options->image) }}" alt=""></a>
                                        </td>
{{-- {{ route('home.product-detail', ['slug'=>$item->options->slug]) }} --}}
                                        <td data-title="Product" class="product-name">
                                            <a href="">{{ $item->name }}</a>
                                        </td>

                                        <td data-title="Product" class="product-name">
                                            <span>{{ $item->options->flavor }}</span>
                                        </td>

                                        <td data-title="Price" class="product-price">
                                            <span class="amount">{{ \App\Helpers\Common::numberFormat($item->price) }} đ</span>
                                        </td>

                                        <td data-title="Quantity" class="product-quantity">
                                            <div class="quantity buttons_added">
                                                <input type="button" class="minus" data-price="{{ $item->price }}" data-url="{{  route('home.cart.update', ['id' => $key]) }}" data-product-id="{{  $item->id }}" value="-">
                                                <label>{{ __('message.quantity') }}</label>
                                                <input type="number" size="4" class="input-text qty text" title="Qty" value="{{ $item->qty }}" name="quantity" max="29" min="0" step="1">
                                                <input type="button" data-price="{{ $item->price }}" data-url="{{  route('home.cart.update', ['id' => $key]) }}" data-product-id="{{  $item->id }}" class="plus" value="+">
                                            </div>
                                        </td>

                                        <td data-title="Total" class="product-subtotal">
                                            <span class="amount productTotalAmount_{{ $key }}">{{ \App\Helpers\Common::numberFormat($item->price * $item->qty) }} đ</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                    <div class="cart-collaterals">

                        <div class="cart_totals ">

                            <h2>{{ trans('message.cart.cartTotal') }}</h2>

                            <table class="shop_table shop_table_responsive">

                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>{{ trans('message.cart.subTotal') }}</th>
                                        <td data-title="Subtotal"><span class="sub-amount amount">{{ \Cart::subtotal(0) }} đ</span></td>
                                    </tr>


                                    <tr class="shipping">
                                        <th>{{ __('message.discount.sku') }}</th>
                                        <td data-title="Shipping"> <span class="percentage amount">{{ session()->get('discount_name') }}</span> <input type="hidden" class="shipping_method" value="international_delivery" id="shipping_method_0" data-index="0" name="shipping_method[0]">

                                            <form method="post" action="" class="woocommerce-shipping-calculator">

                                                <p><a data-toggle="collapse" aria-controls="calculator" href="#calculator" aria-expanded="false" class="shipping-calculator-button">{{ trans('message.discount.applyDiscount') }}</a></p>

                                                <div id="calculator" class="shipping-calculator-form collapse">
                                                    <p id="calc_shipping_postcode_field" class="form-row form-row-wide validate-required">
                                                        <input type="text" id="calc_shipping_postcode" name="discount_code" placeholder="{{ trans('message.discount.placeholderApplyDiscount') }}" value="" class="input-text">
                                                    </p>

                                                    <p><button class="button" type="submit">{{ trans('message.discount.applyDiscount') }}</button></p>

                                                    <input type="hidden" value="1eafc42c5e" name="_wpnonce"><input type="hidden" value="/electro/cart/" name="_wp_http_referer">
                                                </div>
                                            </form>
                                        </td>
                                    </tr>

                                    <tr class="order-total">
                                        <th>{{ trans('message.cart.subTotal') }}</th>
                                        <td data-title="Total"><strong><span class="sub-amount amount">{{ \Cart::subtotal(0) }} đ</span></strong> </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="wc-proceed-to-checkout">
                                {{-- Proceed to Checkout --}}
                                <a class="checkout-button button alt wc-forward" href="checkout.html" style="margin-bottom: 25px;">{{ trans('message.cart.proceedToCheckout') }}</a>
                            </div>
                        </div>
                    </div>
                </article>
            @endif
        </main><!-- #main -->
    </div><!-- #primary -->
</div>    
@endsection

@section('addJs')
    <script>
        jQuery(document).ready(function (){
            jQuery('.woocommerce-shipping-calculator').submit(function (e) {
                e.preventDefault();

                var discount_code = jQuery('input[name="discount_code"]').val();

                    // Gửi dữ liệu lên server
                    jQuery.ajax({
                        type: "POST",
                        url: "{{ route('home.applyDiscount') }}", // Đặt đúng đường dẫn của endpoint xử lý form trên server
                        headers: {
                            "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr('content'), // Thêm token CSRF vào tiêu đề
                        },
                        data: {
                            discount_code: discount_code,
                        },
                        success: function(response) {
                            // Xử lý kết quả thành công
                            if(response.code == 200){
                                toastr["success"](response.msg);
                                jQuery(".sub-amount").text(response.totalMoney+ " đ");
                                jQuery('.percentage').text(response.nameDiscount);
                            }else{
                                toastr["error"](response.msg);
                            }
                        },
                        error: function(error) {
                            // Xử lý lỗi
                            toastr["error"](response.msg);
                        }
                    });
            });

            jQuery('.remove').on('click', function(e) {
                e.preventDefault();

                // Lấy thông tin từ thuộc tính data
                var rowId = jQuery(this).data('row-id');
                var url = jQuery(this).data('url');

                // Gửi yêu cầu Ajax để xóa sản phẩm
                jQuery.ajax({
                    type: 'DELETE', // Phương thức HTTP DELETE
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        row_id: rowId
                    },
                    success: function(response) {
                        // Xử lý kết quả nếu cần

                        // Cập nhật giao diện hoặc thông báo thành công
                        console.log(response);

                        // Ví dụ: Reload trang sau khi xóa sản phẩm
                        location.reload();
                    },
                    error: function(error) {
                        // Xử lý lỗi nếu cần
                        console.log(error);
                    }
                });
            });

            jQuery('.plus').on('click', function() {
                // Lấy giá trị hiện tại từ input
                var currentValue = parseInt(jQuery(this).prev('.qty').val());
                // Tăng giá trị
                var newValue = currentValue + 1;

                // Cập nhật giá trị trong input
                jQuery(this).prev('.qty').val(newValue);

                updateCart(jQuery(this));
            });

            // Xử lý khi nhấn vào nút "minus"
            jQuery('.minus').on('click', function() {
                // Lấy giá trị hiện tại từ input
                var currentValue = parseInt(jQuery(this).closest('.quantity').find('.qty').val());

                // Kiểm tra nếu giá trị hiện tại là 0, không làm gì cả
                if (currentValue <= 1) {
                    return;
                }

                // Giảm giá trị
                var newValue = currentValue - 1;

                // Cập nhật giá trị trong input
                jQuery(this).closest('.quantity').find('.qty').val(newValue);

                // Gọi hàm cập nhật giỏ hàng (nếu cần)
                updateCart(jQuery(this));
            });

            function updateCart(button) {
                var url = button.data('url');
                var productId = button.data('product-id');
                var quantity = button.closest('.quantity').find('.qty').val();
                var price = button.data('price');

                // Gửi yêu cầu AJAX để cập nhật giỏ hàng
                jQuery.ajax({
                    type: "POST",
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        product_id: productId,
                        quantity: quantity,
                        price: price
                    },
                    success: function(response) {
                        // Xử lý kết quả nếu cần
                        // Cập nhật số tiền hiển thị cho sản phẩm cụ thể
                        jQuery(".productTotalAmount_" + response.id).text(response.totalItem +' đ');

                        // Cập nhật tổng cả giỏ hàng
                        jQuery('.sub-amount').text(response.totalMoney + ' đ');
                        jQuery('.cart-items-count').text(response.cartCount);
                        
                    },
                    error: function(error) {
                        // Xử lý lỗi nếu cần
                        console.log(error);
                    }
                });
            }
        })
    </script>
@endsection