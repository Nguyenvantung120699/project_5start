@extends("admin.layout")

@section("top_content")
    <h2>Order Info</h2>

@endsection

@section("main_content")
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>Order Info</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID Order</th>
                            <th>Customer name</th>
                            <th>Shipping address</th>
                            <th>Telephone</th>
                            <th>Grand total</th>
                            <th>Payment Method</th>
                            <th>Created at</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="tr-shadow">
                                <td data-target="id" class="align-items-center align-middle">{{ $order->id }}</td>
                                <td data-target="product_name">{{ $order->customer_name }}</td>
                                <td data-target="brand_name">{{ $order->shipping_address}}</td>
                                <td data-target="category_name">{{ $order->telephone}}</td>
                                <td data-target="quantity" class="number">{{ $order->grand_total }}</td>
                                <td data-target="quantity" class="number">{{ $order->payment_method }}</td>
                                <td data-target="quantity" class="number">{{ $order->created_at}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>Product Order Info</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID Product</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($product as $p)
                            <tr class="tr-shadow">
                            <td data-target="id" class="align-items-center align-middle">{{ $p->id }}</td>
                            <td data-target="product_name">{{ $p->product_name }}</td>
                            <td data-target="category_name">{{$p->pivot->qty}}</td>
                            <td data-target="brand_name">{{ $p->price}}</td>
                            </tr>
                        @empty
                            <p>There are no orders!</p>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        <div><a href="{{url("admin/order")}}"><button class="btn btn-success">Ok</button></a></div>
        </div>
    </div>
@endsection