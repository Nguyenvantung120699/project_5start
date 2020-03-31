@extends('layout.layout')
@section('title','Product details')
@section('content')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div
                    class="banner_content d-md-flex justify-content-between align-items-center"
                >
                    <div class="mb-3 mb-md-0">
                        <h2>Cart</h2>
                        <p>Very us move be blessed multiply night</p>
                    </div>
                    <div class="page_link">
                        <a href="{{url("/")}}">Home</a>
                        <a href="#">Cart</a>
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
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
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
                                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                        class="increase items-count"
                                        type="button"
                                    >
                                        <i class="lnr lnr-chevron-up"></i>
                                    </button>
                                    <button
                                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                        class="reduced items-count"
                                        type="button"
                                    >
                                        <i class="lnr lnr-chevron-down"></i>
                                    </button>
                                </div>
                            </td>
                            <td>
                                <h5>${{($p->cart_qty*$p->price)}}</h5>
                            </td>
                        </tr>
                        @empty
                            <p>Khong co san pham trong gio hang</p>
                        @endforelse
                        <tr class="bottom_button">
                            <td>
                                <a class="gray_btn" href="{{url("/clear-cart")}}">Clear Cart</a>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="cupon_text">
                                    <input type="text" placeholder="Coupon Code" />
                                    <a class="main_btn" href="#">Apply</a>
                                    <a class="gray_btn" href="#">Close Coupon</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Subtotal</h5>
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
                                    <a class="gray_btn" href="#">Continue Shopping</a>
                                    <a class="main_btn" href="{{url("check-out")}}">Proceed to checkout</a>
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
