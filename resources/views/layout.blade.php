<!DOCTYPE html>

<html lang="zxx">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('html.head')
<body>

	<!-- Start Header Area -->
@include('html.header')
<!-- Header section end -->

<!-- Product section -->

<section class="product-section">

    <div class="container">

        @yield('content')

    </div>

</section>

<!-- Product section end -->
@include('html.footer')