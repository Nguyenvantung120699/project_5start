@component('mail::message')
<html>
<body>
<div class="checkout-success" style="text-align: center ;padding-bottom: 100px">

    <img src="{{asset("img/success.jpg")}} " alt="" style="width: 70px;height: 70px">
    <h3>Hủy Đơn Hàng Thành Công</h3>
    <p>Chúng tôi sẽ cập nhật thông tin đơn hàng khi có thay đổi. vui lòng để lại những đánh giá của bạn về chúng tôi để chúng tôi có những cải tiến tốt hơn</p>
    <b>Xin Cảm ơn!</b>
    <!-- Modal -->
    <a href="{{url("/")}}" class="btn btn-primary">{{trans('checkout_success.Continue_Shopping')}}</a>
</div>
</body>

</html>
@endcomponent
