<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tạo đơn hàng</title>
    <link href="{{ asset('frontend/assets/vnpay/bootstrap.min.css') }}" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend/assets/vnpay/jumbotron-narrow.css') }}" rel="stylesheet">
    <script src="{{ asset('frontend/assets/vnpay/jquery-1.11.3.min.js') }}"></script>
</head>
<body>
<div class="container">
    <div class="header clearfix">
        <img width="250" height="180" src="data:image/png;base64,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" alt="">
        <h3 class="text-muted">Thanh toán qua VNPAY</h3>
    </div>
    <h3>Tạo đơn hàng</h3>
    <div class="table-responsive">
        <form action="{{ route('home.payment.vnpay') }}" id="create_form" method="post">
            @csrf
            <div class="form-group">
                <label for="amount">Số tiền</label>
                <input class="form-control" id="amount"
                name="amount" type="number" value="{{ $totalMoney }}" readonly/>
            </div>
            <div class="form-group">
                <label for="language">Loại hàng hóa </label>
                <select name="order_type" id="order_type" class="form-control" required>
                    <option selected value="billpayment">Thanh toán hóa đơn</option>
                </select>
            </div>
            <div class="form-group">
                <label for="order_desc">Nội dung thanh toán</label>
                <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2" placeholder="Nội dung thanh toán" required></textarea>
            </div>
            <div class="form-group" required>
                <label for="bank_code">Ngân hàng</label>
                <select name="bank_code" id="bank_code" class="form-control">
                    <option value="">Không chọn</option>
                    <option selected value="NCB"> Ngan hang NCB</option>
                    <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                    <option value="SCB"> Ngan hang SCB</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" id="btnPopup">Xác nhận thanh toán</button>
            <button type="button" class="btn btn-primary" onclick="history.back()">Quay trở lại</button>
        </form>
    </div>
    <p>
        &nbsp;
    </p>
    <footer class="footer">
        <p>&copy; VNPAY 2023</p>
    </footer>
</div>
<link href="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.css" rel="stylesheet"/>
<script src="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.js"></script>
</body>
</html>