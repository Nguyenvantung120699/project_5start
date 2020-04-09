@component('mail::message')
<html>

<body>
<div class="checkout-success" style="text-align: center ;padding-bottom: 100px">

    <img src="{{asset("img/success.jpg")}} " alt="" style="width: 70px;height: 70px">
    <h3>Cảm Ơn Bạn đã Đăng Kí Tài Khỏan Trên Hệ Thống của chúng tôi</h3>
    <p>Vui lòng giữ bảo mật thông tin tài khoản để trách các trường hợp xảy ra rủi ro</p>
    <b>Xin Cảm ơn!</b>
    <!-- Modal -->
    <a href="{{url("/")}}" class="btn btn-primary">Khám Phá Ngay</a>
</div>
</body>

</html>
@endcomponent
