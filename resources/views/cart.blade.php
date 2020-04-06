@extends('layout')
@section('title','Product details')
@section('content')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div
                    class="banner_content d-md-flex justify-content-between align-items-center"
                >
                    <div class="mb-3 mb-md-0">
                        <h2>{{trans('cart.cart')}}</h2>
                        <p>{{trans('cart.cart_introduce')}}</p>
                    </div>
                    <div class="page_link">
                        <a href="{{url("/")}}">{{trans('cart.home')}}</a>
                        <a href="#">{{trans('cart.cart')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">{{trans('cart.product')}}</th>
                            <th scope="col">{{trans('cart.price')}}</th>
                            <th scope="col">{{trans('cart.quantity')}}</th>
                            <th scope="col">{{trans('cart.total')}}</th>
                            <th scope="col">XXXX</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($cart as $p)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img
                                            src="{{asset($p->thumbnail)}}"
                                            alt=""
                                        />
                                    </div>
                                    <div class="media-body">
                                        <p>{{$p->product_name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>${{$p->getprice()}}</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <input
                                        type="text"
                                        name="qty"
                                        id="sst"
                                        maxlength="12"
                                        value="{{$p->cart_qty}}"
                                        title="Quantity:"
                                        class="input-text qty"
                                    />
                                    <button
                                        class="increase items-count"
                                        type="button"
                                    >
                                        <a href="{{url("/increaseOne/{$p->id}")}}"> <i class="lnr lnr-chevron-up"></i></a>
                                    </button>

                                    @if( $p->cart_qty>1)
                                    <button class="reduced items-count" type="button" id="reduceOne"
                                    >
                                        <a  href="{{url("/reduceOne/{$p->id}")}}"> <i class="lnr lnr-chevron-down"></i></a>
                                    </button>
                                        @else
                                        <button class="reduced items-count" type="button" disabled="disabled"
                                        >
                                            <a > <i class="lnr lnr-chevron-down"></i></a>
                                        </button>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <h5>${{($p->cart_qty*$p->price)}}</h5>
                            </td>
                            <td>
                                <h5>
                                <a href="{{url("/deleteItemCart/{$p->id}")}}"><button class="btn btn-success"><i class="ti-trash"></i>{{trans('cart.delete')}}</button></a>
                                </h5>
                            </td>
                        </tr>
                        @empty
                            <p>{{trans('cart.empty')}}</p>
                        @endforelse
                        <tr class="bottom_button">
                            <td>
                                <a class="gray_btn" href="{{url("/clear-cart")}}">{{trans('cart.clear_cart')}}</a>
                                <a class="gray_btn" href="{{url("listOrder")}}">{{trans('cart.orders_purchased')}}</a>
                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>{{trans('cart.subtotal')}}</h5>
                            </td>
                            <td>
                                <h5>${{$cart_total}}</h5>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="checkout_btn_inner">
                                    <a class="gray_btn" href="#">{{trans('cart.continue_shopping')}}</a>
                                    <a class="main_btn" href="{{url("check-out")}}">{{trans('cart.proceed_to_checkout')}}</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
