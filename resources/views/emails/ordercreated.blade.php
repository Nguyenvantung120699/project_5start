@component('mail::message')
<html>
<body>
<div class="checkout-success" style="text-align: center ;padding-bottom: 100px">

    <img src="{{asset("https://previews.123rf.com/images/faysalfarhan/faysalfarhan1711/faysalfarhan171156257/89812926-success-validate-icon-isolated-on-orange-round-button-abstract-illustration.jpg")}} " alt="" style="width: 70px;height: 70px">
    <h3>Đặt Hàng Thành Công</h3>
    <p>vui lòng để lại những đánh giá của bạn về chúng tôi để chúng tôi có những cải tiến tốt hơn</p>
    <b>Xin Cảm ơn!</b>
    <!-- Modal -->
    <div>
    @foreach($cart as $p)
      <div style="border-top: 1px solid;padding-top:10%;">
      <span><h3>Thông tin Sản Phẩm</h3></span>
          <p>tên sp : {{$p->product_name}}</p>
          <div class="d-flex">
              <img
                  src="{{asset($p->thumbnail)}}"
                  alt=""
              />
          </div>
          <p>số lượng : {{$p->cart_qty}}</p>
          <p>giá : {{$p->price}}</p>
          </div>
        @endforeach
    <div class="container" style="border-top: 1px solid;padding-top:10%;">
    <span><h3>Thông tin đơn hàng</h3></span>
        <p>mã đơn : {{$order->id}}</p></br>
        <p>Tổng Tiền : {{$order->grand_total}}</p></br>
        <p>Phương Thức Thanh Toán : {{$order->payment_method}}</p></br>
        <p>Địa chỉ : {{$order->shipping_address}}</p></br>
        <p>Ngày đặt hàng : {{$order->created_at}}</p></br>
      </div>
    </div>
    <a href="{{url("/")}}" class="btn btn-primary">tiếp tục mua</a>
    </div>
</div>
</body>

</html>

@endcomponent