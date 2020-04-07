@extends('layout')
@section('title',"Hủy Đơn thành công")

@section('content')

    <section class="banner_area" style="height: 300px">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div
                    class="banner_content d-md-flex justify-content-between align-items-center"
                >
                    <div class="mb-3 mb-md-0">
                        <h2>Hủy Đơn Thành Công</h2>
                        <p>Xin Cảm ơn</p>
                    </div>
                    <div class="page_link">
                        <a href="{{url("/")}}">Trang Chủ</a>
                        <a href="{{url("/check-out")}}">Hủy Đơn Thành Công</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="checkout-success" style="text-align: center ;padding-bottom: 100px">

    <img src="{{asset("img/success.jpg")}} " alt="" style="width: 70px;height: 70px">
    <h3>Hủy Đơn Hàng Thành Công</h3>
    <p>Chúng tôi rất tiếc khi bạn hủy đơn hàng vui lòng để lại những đánh giá của bạn về chúng tôi để chúng tôi có những cải tiến tốt hơn</p>
    <b>Xin Cảm ơn!</b>
    <!-- Modal -->
    <a href="{{url("/")}}" class="btn btn-primary">{{trans('checkout_success.Continue_Shopping')}}</a>
</div>
@endsection

