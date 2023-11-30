<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: DejaVu Sans !important;
        }
        body{
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            color: #333;
        }
        .wrapper {
    width: 100%;
    }
    
    .content {
    display: flex;
    flex-direction: column;
    max-width: 420px;
    margin: auto;
    width: 100%;
    
    position: relative;
    overflow: hidden;
    }
    .d-flex{
    display: flex;
    
    }
    .flex-1{
    flex: 1;
    }
    .d-flex-row {
    display: flex;
    align-items: center;
    flex-direction: row;
    
    
    }
    .header {
    display: flex;
    
    flex-direction: column;
    background: linear-gradient(-90deg, #02aa93, #00b47e);
    padding: 20px 30px;
    height: 200px;
    }
    
    .m-icon {
    display: flex;
    color: #fff;
    background: #ffffff47;
    border-radius: 50%;
    width: 25px;
    height: 25px;
    justify-content: center;
    align-items: center;
    font-size: 18px;
    transition: all .3s;
    cursor: pointer;
    }
    
    
    i.material-icons {
    font-size: inherit;
    }
    
    .pageTitle {
    flex: 1;
    
    display: flex;
    color: #fff;
    font-weight: 600;
    font-size: 18px;
        padding: 0px 20px;
        letter-spacing: 1px;
    }
    
    .m-icon:hover {
    transform: scale(1.2);
    box-shadow: 0px 0px 18px #00000038;
    }
    
    .pro-img {
    width: 100px;
    }
    
    
    
    .pro-img img {
    width: 100%;
    }
    
    .p-top30 {
    padding-top: 30px;
    }
    
    .pro-details {
    display: flex;
    flex: 1;
    align-items: center;
    }
    
    .pro-detail-list {
    padding: 10px 0px 10px 20px;
    font-size: 18px;
    color: #fff;
    font-weight: 600;
    font-family: 'Lato', sans-serif;
    }
    
    .pro-title {
    margin-bottom: 10px;
    letter-spacing: 2px;
    }
    
    .pro-price {
    font-size: 24px;
    letter-spacing: 1px;
    }
    
    .pro-sub {
    background: #fff;
    color: #01ab90;
    width: 40px;
    display: inline-flex;
    justify-content: center;
    margin-left: 15px;
    border-radius: 5px 0px 5px 5px;
    font-size: 16px;
    padding: 2px;
    }
    .billing-details {
    padding: 20px;
    margin-top: 30px;
    }
    
    .billing-details-content {
    background: #ddf4f6;
    padding: 30px;
    border-radius: 20px 0px 20px 20px;
    
    }
    
    .bil-title {
    font-weight: 600;
    font-size: 18px;
    color: #0e8e92;
    letter-spacing: 1px;
    margin-bottom: 20px;
    }
    
    .billing-details-content table {
    width: 100%;
    color: #0e8e92;
        border-collapse: collapse;
    }
    
    table tr td {
    padding: 2px;
    letter-spacing: 1px;
    }
    
    table tr td i {
    width: 18px;
    vertical-align: middle;
    }
    
    td.right-t {
    text-align: right;
    font-weight: 600;
    letter-spacing: 1px;
    }
    tr.br-top td {
    border-top: 1px solid #01ac8f;
    padding: 5px 0px 0px;
    }
    tr.br-top td.right-t {
    font-size: 16px;
    }
    .list-content {
    border-left: 3px solid #00b47e;
    
    width: 100%;
    margin: 30px auto;
    }
    
    .list-icon {
    width: 40px;
    height: 40px;
    justify-content: center;
    align-items: center;
    background: linear-gradient(-90deg, #02aa93, #00b47e);
    color: #fff;
    font-size: 20px;
    border-radius: 0px 8px 8px 0px;
    }
    
    .list-content-item {margin-bottom: 20px;}
    
    .list-name {
    padding: 0px 20px;
    font-size: 16px;
    }
    
    .list-content-item:nth-child(4) {
    margin-bottom: 0px;
    }
    .list-edit {
    width: 30px;
    height: 30px;
    justify-content: center;
    align-items: center;
    background: #fdd9e2;
    color: #fff;
    border-radius: 6px 0px 6px 6px;
    font-size: 16px;
    transition: all .3s;
    cursor: pointer;
    margin-right: 20px;
    }
    
    .list-edit:hover {
    background: #dc99aa;
    }
    .btn {
    position: absolute;
    bottom: 0;
    right: 0;
    }
    
    .btn a {
    background: #01ab91;
    width: 100px;
    display: flex;
    color: #fff;
    font-size: 18px;
    text-decoration: none;
    padding: 6px;
    align-items: center;
    justify-content: center;
    border-radius: 20px 0px 0px 0px;
    transition: all .3s;
    cursor: pointer;
    }
    
    .btn a:hover {
    opacity: .7;
    }
    .card-content {
    position: absolute;
    top: 0;
    left: 100%;
    width: 149%;
    height: 101%;
    background: #fff;
    border-radius: 50%;
    transition: all .3s;
    }
    </style>
</head>
<body>
	<div class="wrapper">
		<div class="content">
			<div class="billing-details">
				<div class="billing-details-content">
					<div class="bil-title" style="font-family: DejaVu Sans;">Chi tiết đơn hàng</div>
                    <div class="bil-title" style="font-family: DejaVu Sans;">Customer: {{ $getOrder->user_name }}</div>
					 <table>
                        @foreach ($order_details as $detail)
                            <tr>
                                <td>{{ $detail->product_name }}</td>
                                
                                <td class="right-t">{{ \App\Helpers\Common::numberFormat($detail->order_detail_price)}} VND</td>
                            </tr>
                        @endforeach
                        <tr class="br-top">
                            <td style="font-family: DejaVu Sans;">Tổng tiền</td>
                            <td class="right-t">{{ \App\Helpers\Common::numberFormat($getOrder->order_total) }} VND</td>
                        </tr>
					 </table>
				</div>
			</div>
		</div>
	</div>

</body>
</html>