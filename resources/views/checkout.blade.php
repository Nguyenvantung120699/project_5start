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
                        <h2>{{trans('procced_checkout.product_checkout')}}</h2>
                        <p>{{trans('procced_checkout.product_checkout_introduce')}}</p>
                    </div>
                    <div class="page_link">
                        <a href="{{url("/")}}">{{trans('procced_checkout.home')}}</a>
                        <a href="{{url("/check-out")}}">{{trans('procced_checkout.product_checkout')}}</a>
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
                    {{trans('procced_checkout.have_a_coupon')}}
                        <a href="#">{{trans('procced_checkout.have_a_coupon2')}}</a>
                    </h2>
                </div>
                <input type="text" placeholder="{{trans('procced_checkout.enter_coupon_code')}}" />
                <a class="tp_btn" href="#">{{trans('procced_checkout.apply_coupon')}}</a>
            </div>
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>{{trans('procced_checkout.billing_details')}}</h3>
                        <form action="{{url("check-out")}}" class="row contact_form"  method="post" novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="first" name="customer_name" placeholder="{{trans('procced_checkout.name')}}" required/>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="telephone" placeholder="{{trans('procced_checkout.phone_number')}}" required/>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" name="address" placeholder="{{trans('procced_checkout.address')}}" required/>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <select class="country_select" name="payment_method">
                                    <option value="paypal" >{{trans('procced_checkout.paypal')}}</option>
                                    <option value="cod" >{{trans('procced_checkout.COD')}}</option>
                                    <option value="credit_card" >{{trans('procced_checkout.Credit_card')}}</option>
                                    <option value="bank_transfer" >{{trans('procced_checkout.Bank_transfer')}}</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <h3>{{trans('procced_checkout.Shipping_Details')}}</h3>
                                </div>
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="{{trans('procced_checkout.Order_Notes')}}"></textarea>
                            </div>
                            <button class="main_btn" type="submit">{{trans('procced_checkout.Place_Order')}}</button>
                        </form>

                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>{{trans('procced_checkout.Your_Order')}}</h2>
                            <ul class="list">
                                <li>
                                    <a href="#"
                                    >{{trans('procced_checkout.Product')}}
                                        <span>{{trans('procced_checkout.Total2')}}</span>
                                    </a>
                                </li>
                                @foreach($cart as $c)
                                <li>
                                    <a href="#"
                                    >{{$c->product_name}}
                                        <span class="middle">x {{$c->cart_qty}}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#"
                                    >{{trans('procced_checkout.Subtotal')}}
                                        <span>{{$cart_total}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                    >{{trans('procced_checkout.Shipping')}}
                                        <span>Free</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                    >{{trans('procced_checkout.Total')}}
                                        <span>{{$cart_total}}</span>
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
