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
                        <h2>Orders Purchased</h2>
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
                            <th scope="col">Order #</th>
                            <th scope="col">Customer_name</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Payment_method</th>
                            <th scope="col">Grand_total</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($listOrder as $p)
                            <tr>
                                <td><a href="{{url("/viewOrder/{$p->id}")}}"># {{$p->id}}</a></td>
                                <td>{{$p->customer_name}}</td>
                                <td>{{$p->telephone}}</td>
                                <td>{{$p->payment_method}}</td>
                                <td>{{$p->grand_total}}</td>
                            </tr>
                        @empty
                            <h3>Không có đơn hàng</h3>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
