@extends('layout')
@section('title','Check out')
@section('content')
    <section class="banner_area">
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

    <section class="checkout_area section_gap">
        <div class="container">
            <div class="cupon_area">
                <div class="check_title">
                    <h2>
                        Have a coupon?
                        <a href="#">Click here to enter your code</a>
                    </h2>
                </div>
                <input type="text" placeholder="Enter coupon code" />
                <a class="tp_btn" href="#">Apply Coupon</a>
            </div>
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <form action="{{url("check-out")}}" class="row contact_form"  method="post" novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="first" name="customer_name" placeholder="Name" required/>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="telephone" placeholder="Phone number" required/>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" name="address" placeholder="Address" required/>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <select class="country_select" name="payment_method">
                                    <option value="paypal" >Paypal</option>
                                    <option value="cod" >COD</option>
                                    <option value="credit_card" >Credit card</option>
                                    <option value="bank_transfer" >Bank transfer</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <h3>Shipping Details</h3>
                                </div>
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                            </div>
                            <button class="site-btn btn-full" type="submit">Place Order</button>
                        </form>

                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li>
                                    <a href="#"
                                    >Product
                                        <span>Total</span>
                                    </a>
                                </li>
                                @foreach($cart as $c)
                                <li>
                                    <a href="#"
                                    >{{$c->product_name}}
                                        <span class="middle">x {{$c->cart_qty}}</span>
                                        <span class="last">{{($c->cart_qty*$c->price)}}</span>
                                    </a>
                                </li>
                                    @endforeach
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#"
                                    >Subtotal
                                        <span>${{$cart_total}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                    >Shipping
                                        <span>Free</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                    >Total
                                        <span>${{$cart_total}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
