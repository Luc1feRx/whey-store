@extends('frontend.layouts.master')

@section('addCss')
    <style>
        .price-range-slider {
        width:100%;
        float:left;
        padding:10px 20px;
        }

        .range-value {
                margin:0;
            }

            .range-value input {
                    width:100%;
                    background:none;
                    color: #000;
                    font-size: 16px;
                    font-weight: initial;
                    box-shadow: none;
                    border: none;
                    margin: 20px 0 20px 0;
                }
.range-bar {
		border: none;
		background: #000;
		height: 3px;	
		width: 96%;
		margin-left: 8px;
	}

    .ui-slider-range {
			background:#06b9c0;
	}
		
		.ui-slider-handle {
			border:none;
			border-radius:25px;
			background:#fff;
			border:2px solid #06b9c0;
			height:17px;
			width:17px;
			top: -0.52em;
			cursor:pointer;
		}
		.ui-slider-handle + span {
			background:#06b9c0;
		}
    </style>
@endsection

@section('content')
<div id="content" class="site-content" tabindex="-1">
    <div class="container">
        <nav class="woocommerce-breadcrumb"><a href="{{ route('home.index') }}">{{ trans('message.home') }}</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>{{ $category->name_category }}</nav>
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <header class="page-header">
                    <h1 class="page-title">{{ $category->name_category }}</h1>
                    <input type="text" hidden name="slug" value="{{ $category->slug_category }}" id="">
                </header>

                <div class="shop-control-bar">
                    <ul class="shop-view-switcher nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link " data-toggle="tab" title="List View" href="#list-view"><i class="fa fa-list"></i></a></li>
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
                    </ul>
                </div>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="grid" aria-expanded="true">
                
                        @include('frontend.category.productList')
                    </div>
                
                </div>
                <div class="">
                    {!! $products->appends(request()->all())->links('pagination::bootstrap-4') !!}
                </div>

            </main><!-- #main -->
        </div><!-- #primary -->

        @include('frontend.category.sidebar')

    </div><!-- .container -->
</div><!-- #content -->
@endsection

@section('addJs')
    <script>
        function setSelectedBrandsFromUrl() {
            var currentUrl = new URL(window.location);
            var selectedBrands = currentUrl.searchParams.get('brands');
            if (selectedBrands) {
                selectedBrands = selectedBrands.split(',');
                jQuery('.brand-filter').each(function() {
                    jQuery(this).prop('checked', selectedBrands.includes(jQuery(this).val()));
                });
            }
        }
        jQuery(document).ready(function() {
            setSelectedBrandsFromUrl();
            function updateUrlWithSelectedBrands() {
                var selectedBrands = jQuery('.brand-filter:checked').map(function() {
                    return jQuery(this).val();
                }).get().join(',');

                var currentUrl = new URL(window.location);
                if (selectedBrands.length > 0) {
                    currentUrl.searchParams.set('brands', selectedBrands);
                } else {
                    currentUrl.searchParams.delete('brands');
                }
                history.pushState({}, '', currentUrl);
            }
            // Your jQuery code here
            // When a filter checkbox changes
            jQuery('.brand-filter').on('change', function() {
                updateUrlWithSelectedBrands();
                var currentCategorySlug = jQuery('[name="slug"]').val();
                var selectedBrands = [];
                jQuery('.brand-filter:checked').each(function() {
                    selectedBrands.push(jQuery(this).val());
                });

                var data = {
                    brands: selectedBrands,
                    // Include other filter data if necessary
                };

                // Make the AJAX call
                jQuery.ajax({
                    url: '/products/brand-filter/' + currentCategorySlug, // Update this to your route
                    type: 'GET',
                    data: data,
                    success: function(response) {
                        // Update your product list with the response
                        jQuery('.products').html(response.view);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            // If you have a filter button, you can also trigger the AJAX call when it's clicked
            jQuery('#filter-button').on('click', function() {
                jQuery('.brand-filter').first().trigger('change');
            });

            // jQuery('.select-order').change(function(){
            //     var value = jQuery(this).find(':selected').val();

            //     if(value!=0){
            //         var url = value;
            //         window.location.replace(url);
            //     }
            // });
        });
        jQuery(function() {
            var urlParams = new URLSearchParams(window.location.search);
            jQuery(".price_slider").slider({
            range: true,
            min: urlParams.get('from')||500000, // Giá tiền tối thiểu
            max: urlParams.get('to')||2000000, // Giá tiền tối đa
            values: [500000, 1000000], // Giá trị khởi tạo ban đầu cho slider
            slide: function(event, ui) {
                jQuery(".price_label .from").text(ui.values[0] + "VNĐ");
                jQuery(".price_label .to").text(ui.values[1] + "VNĐ");

                // Cập nhật giá trị vào các thẻ input hidden
                console.log(jQuery('.price_label .input-from').val(ui.values[0]));
                jQuery('input[name="from"]').val(ui.values[0]);
                jQuery('input[name="to"]').val(ui.values[1]);
            }
        });
            // Cập nhật hiển thị giá khi trang được tải
            jQuery(".price_label .from").text(jQuery(".price_slider").slider("values", 0) + "VNĐ");
            jQuery(".price_label .to").text(jQuery(".price_slider").slider("values", 1) + "VNĐ");
            jQuery('input[name="from"]').val(jQuery(".price_slider").slider("values", 0));
            jQuery('input[name="to"]').val(jQuery(".price_slider").slider("values", 1));
        });
    </script>
@endsection