<!DOCTYPE html>
<html lang="en">


@include('html.head')
<body>

	<!-- Start Header Area -->
@include('html.header')
<!-- Header section end -->

<!-- Product section -->

<section class="product-section">


        @yield('content')


</section>
@include('html.js')
<!-- Product section end -->
@include('html.footer')
