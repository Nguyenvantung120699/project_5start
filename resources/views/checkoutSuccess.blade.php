@extends('layout')
@section('title',"Đặt hàng thành công")
@section('content')
    <section class="banner_area" style="height: 300px">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div
                    class="banner_content d-md-flex justify-content-between align-items-center"
                >
                    <div class="mb-3 mb-md-0">
                        <h2>Product Checkout</h2>
                        <p>Very us move be blessed multiply night</p>
                    </div>
                    <div class="page_link">
                        <a href="{{url("/")}}">Home</a>
                        <a href="{{url("/check-out")}}">Product Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="checkout-success" style="text-align: center ;padding-bottom: 100px">
    <img src="{{asset("img/success.jpg")}} " alt="" style="width: 70px;height: 70px">
    <h3>Thank you for your purchase!</h3>
    <p>We'll email you an order confirmation with details and tracking info.</p>
    <a href="{{url("/")}}" class="btn btn-primary"> Continue Shopping</a>
</div>
@endsection
