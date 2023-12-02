<div style="width: 100%;max-width: 600px;margin:0 auto">
    <div style="height: 55px;background: #000;padding: 10px">
        <div style="width: 50%">
            <a href="">
                <img style="height: 55px" src="http://tranining.previewcode.net/images/icon/Logo.png">
            </a>
        </div>
        <div style="width: 50%"></div>
    </div>
    <div style="background: white;padding: 15px;border:1px solid #dedede;">
        <h2 style="margin:10px 0;border-bottom: 1px solid #dedede;padding-bottom: 10px;">Danh sách sản phẩm bạn đã mua</h2>
        <div>
            @foreach($shopping as $key => $item)
                <div style="border-bottom: 1px solid #dedede;padding-bottom: 10px;padding-top: 10px;">
                    <div style="width: 80%;float: right;">
                        <h4 style="margin:10px 0">{{ $item->name }}</h4>
                        <p style="margin: 4px 0;font-size: 14px;">Loại sản phẩm: <span>{{ $item->options->flavor }}</span></p>
                        <p style="margin: 4px 0;font-size: 14px;">Giá <span>{{  number_format($item->price,0,',','.') }} đ</span></p>
                        <p style="margin: 4px 0;font-size: 14px;">Sô lượng <span>{{  $item->qty }}</span></p>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            @endforeach
            <h2>Tổng tiền : <b>{{ \Cart::subtotal(0) }}</b></h2>
        </div>
        <div>
            <p>Đây là email tự động xin vui không không trả lời vào email này</p>
        </div>
    </div>
    <div style="background: #f4f5f5;box-sizing: border-box;padding: 15px">
        <p style="margin:2px 0;color: #333">Email : admin@gmail.com</p>
        <p style="margin:2px 0;color: #333">Phone : 0928817228</p>
    </div>
</div>