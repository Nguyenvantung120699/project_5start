<!DOCTYPE html>

<html lang="zxx">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('html.head')
@include('html.head')
<body>

	<!-- Start Header Area -->
@include('html.header')
<!-- Header section end -->

<!-- Product section -->

<section class="product-section">


        @yield('content')


</section>

<!-- Product section end -->
@include('html.footer')