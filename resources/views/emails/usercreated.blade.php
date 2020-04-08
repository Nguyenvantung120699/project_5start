@component('mail::message')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset("css/bootstrap.css")}}">
  <link rel="stylesheet" href="{{asset("vendors/linericon/style.css")}}" >
  <link rel="stylesheet" href="{{asset("css/font-awesome.min.css")}}" >
  <link rel="stylesheet" href="{{asset("css/themify-icons.css")}}" >
  <link rel="stylesheet" href="{{asset("css/flaticon.css")}}" >
  <link rel="stylesheet" href="{{asset("vendors/owl-carousel/owl.carousel.min.css")}}" >
  <link rel="stylesheet" href="{{asset("vendors/lightbox/simpleLightbox.css")}}" >
  <link rel="stylesheet" href="{{asset("vendors/nice-select/css/nice-select.css")}}" >
  <link rel="stylesheet" href="{{asset("vendors/animate-css/animate.css")}}" >
  <link rel="stylesheet" href="{{asset("vendors/jquery-ui/jquery-ui.css")}}" >
  <!-- main css -->
  <link rel="stylesheet" href="{{asset("css/style.css")}}">
  <link rel="stylesheet" href="{{asset("css/responsive.css")}}" >

  <!--<script type="text/javascript" src="{{asset("js/jquery-3.4.1.js")}}"></script>
	<link rel="icon" type="image/png" href="{{ asset("login_v11/images/icons/favicon.ico")}}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset("login_v11/fonts/font-awesome-4.7.0/css/font-awesome.min.css")}}">
	<link rel="stylesheet" type="text/css" href="{{ asset("login_v11/fonts/Linearicons-Free-v1.0.0/icon-font.min.css")}}">
	<link rel="stylesheet" type="text/css" href="{{ asset("login_v11/vendor/animate/animate.css")}}">
	<link rel="stylesheet" type="text/css" href="{{ asset("login_v11/vendor/css-hamburgers/hamburgers.min.css")}}">
	<link rel="stylesheet" type="text/css" href="{{ asset("login_v11/vendor/select2/select2.min.css")}}">-->
  <link rel="stylesheet" type="text/css" href="{{ asset("login_v11/css/util.css")}}">
  <link rel="stylesheet" type="text/css" href="{{ asset("login_v11/vendor/bootstrap/css/bootstrap.min.css")}}">
  <link rel="stylesheet" type="text/css" href="{{ asset("login_v11/css/main.css")}}">

</head>

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

@component('mail::button', ['url' => ''])
@endcomponent

{{ config('app.name') }}
@endcomponent
