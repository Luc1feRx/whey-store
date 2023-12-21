<div id="sidebar" class="sidebar" role="complementary">
    <form action="#" method="GET">
        <aside class="widget widget_electro_products_filter">
            <h3 class="widget-title">Filters</h3>
            <aside class="widget woocommerce widget_layered_nav">
                <h3 class="widget-title">{{ trans('message.brands') }}</h3>
                <ul>
                    @foreach ($brands as $brand)
                        <li style="">
                            <input name="brands[]" data-filters="brand" 
                            data-getslug="{{ $slug }}" type="checkbox" class="brand-filter" value="{{ $brand->id }}">
                            <label class="item">{{ $brand->name }}</label>
                            <span class="count">({{ $brand->products_count }})</span>
                        </li>
                    @endforeach
                </ul>
            </aside>
            {{-- <aside class="widget woocommerce widget_layered_nav">
                <h3 class="widget-title">{{ trans('message.priceFilter') }}</h3>
                <ul>
                    <li style="">
                        <input name="price[]" type="checkbox" value="(<500000)">
                        <label class="item"> < 500.000đ</label>
                    </li>
                    <li style="">
                        <input name="price[]" type="checkbox" value="(>=500000 AND <=1000000)">
                        <label class="item">500.000đ - 1.000.000đ</label>
                    </li>
                    <li style="">
                        <input name="price[]" type="checkbox" value="(>=1000000 AND <=1500000)">
                        <label class="item">1.000.000đ - 1.500.000đ</label>
                    </li>
                    <li style="">
                        <input name="price[]" type="checkbox" value="(>=1500000 AND <=2000000)">
                        <label class="item">1.500.000đ - 2.000.000</label>
                    </li>
                    <li style="">
                        <input name="price[]" type="checkbox" value="(>=2000000)">
                        <label class="item"> > 2.000.000</label>
                    </li>
                </ul>
            </aside> --}}
            <aside class="widget woocommerce widget_price_filter">
                <h3 class="widget-title">Giá</h3>
                <form action="{{ route('home.category', ['slug'=>$category->slug_category]) }}" method="GET">
                    <div class="price_slider_wrapper">
                        <div style="" class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                            <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
                            <span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 0%;"></span>
                            <span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;"></span>
                        </div>
                        <div class="price_slider_amount">
                            <div style="" class="price_label">Price: <span class="from">$428</span> &mdash; <span class="to">$3485</span></div>
                            <input type="hidden" name="from" value="428">
                            <input type="hidden" name="to" value="3485">
                            <div class="clear"></div>
                            <button type="submit" class="button">Filter</button>
                        </div>
                    </div>
                </form>
            </aside>
        </aside>
    </form>
</div>