<nav class="woocommerce-breadcrumb">
    <a href="{{ route('home.index') }}">{{ trans('message.home') }}</a>
    <span class="delimiter"><i class="fa fa-angle-right"></i></span>
    @if (!empty($breadcrumb) && is_array($breadcrumb))
        @foreach ($breadcrumb as $item)
            @if (!empty($item['title_category']) && !empty($item['url']))
                <a href="{{ $item['url'] }}">{{ $item['title_category'] }}</a>
            @endif
            @if (!empty($item['title_product']) && !empty($item['url']))
                <span class="delimiter"></span>{{ $item['title_product'] }}
            @endif
        @endforeach
    @endif
</nav><!-- /.woocommerce-breadcrumb -->