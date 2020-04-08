@extends("admin.layout")

@section("top_content")
    <h2>Order Manage</h2>

@endsection

@section("main_content")
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>Order Manage</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer name</th>
                            <th>Shipping address</th>
                            <th>Telephone</th>
                            <th>Grand total</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($order as $p)
                            <tr class="tr-shadow">
                                <td data-target="id" class="align-items-center align-middle">{{ $p->id }}</td>
                                <td data-target="product_name">{{ $p->customer_name }}</td>
                                <td data-target="brand_name">{{ $p->shipping_address}}</td>
                                <td data-target="category_name">{{ $p->telephone}}</td>
                                <td data-target="quantity" class="number">{{ $p->grand_total }}</td>
                                <td data-target="quantity" class="number">{{ $p->payment_method }}</td>
                                <td style="color:red;"><!-- Default unchecked -->
                                @if($p->status==0)
                                    <b >chưa xác nhận</b>
                                @endif
                                @if($p->status==1)
                                    <b >đã xác nhận</b>
                                @endif
                                @if($p->status==2)
                                    <b >đang vận chuyển</b>
                                @endif
                                @if($p->status==3)
                                    <b>đã giao hàng</b>
                                @endif
                                @if($p->status==4)
                                <b >đã hủy</b>
                                @endif
                                <form  action="{{url("admin/statusOrder",['id'=>$p->id])}}"  method="post" novalidate="novalidate">
                                    @csrf
                                    <div class="col-md-12 form-group p_star">
                                        <select class="country_select" name="status">
                                        <option selected value=""></option>
                                            <option value="0">chưa xác nhận</option>
                                            <option value="1">xác nhận</option>
                                            <option value="2">đang vận chuyển</option>
                                            <option value="3">đã giao</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-secondary">yes</button>
                                </form>
                                </td>
                                <td>{{ $p->created_at }}</td>
                                <td>{{ $p->updated_at }}</td>
                            </tr>
                        @empty
                            <p>There are no orders!</p>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection