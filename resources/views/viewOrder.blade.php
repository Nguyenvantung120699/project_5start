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
                        <h2>Order</h2>
                        <p>Very us move be blessed multiply night</p>
                    </div>
                    <div class="page_link">
                        <a href="{{url("/")}}">Home</a>
                        <a href="#">Order</a>
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
                        @php $total = 0; @endphp
                        @forelse($product as $p)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{asset($p->thumbnail)}}" alt=""
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
                                            value="{{$p->pivot->qty}}"
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
                                    <h5>${{$p->pivot->qty*$p->price}}</h5>
                                </td>
                            </tr>
                            @php $total+=($p->pivot->qty*$p->price) @endphp
                        @empty
                            <p>Khong co san pham trong gio hang</p>
                        @endforelse
                        <tr>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>${{$total}}</h5>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
