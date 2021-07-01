<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Thông tin thanh toán</title>
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('public/frontend/vnpay/assets/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{ asset('public/frontend/vnpay/assets/jumbotron-narrow.css') }}" rel="stylesheet">
        <script src="{{ asset('public/frontend/vnpay/assets/jquery-1.11.3.min.js') }}"></script>
    </head>
    <body>
        <!--Begin display -->
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">Thông tin đơn hàng</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>

                    <label> {{$vnpayData['vnp_TxnRef']}}</label>
                </div>
                <div class="form-group">
                    <label >Tên khách hàng:</label>

                    <label>{{ $hocvien->tenhv }}</label>
                </div>
                <div class="form-group">
                    <label >Tên khóa học:</label>
                    <label>{{ $p_tenkhonl }}</label>
                </div>
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label>{{number_format($vnpayData['vnp_Amount']/100),0,',','.' }}VNĐ</label>
                </div>
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label>{{$vnpayData['vnp_OrderInfo']}}</label>
                </div>
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div>
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label>{{$vnpayData['vnp_BankCode']}}</label>
                </div>
                <div class="form-group">
                    <label >Kết quả: Giao dịch thành công</label>
                    <br>
                    <a href="{{ URL::to('/gt') }}">
                        <button>Quay lại</button>
                    </a>
                </div>
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                <p>&copy; Quản lý Tiếng Anh 2020</p>
            </footer>
        </div>
    </body>
</html>
