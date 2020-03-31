@extends("admin.layout")

@section("top_content")
<h2>Product Table Manage</h2>
<div>
    <div class="quick-actions_homepage">
        <div><a href="{{url('admin/product/create')}}"><button class="btn btn-success">Create Product<i class="icon-plus"></i></button></a></div>
    </div>
  </div>  
@endsection

@section("main_content")
<hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Product Manage</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $p)
                    <tr class="tr-shadow">
                        <td data-target="id" class="align-items-center align-middle">{{ $p->id }}</td>
                        <td data-target="product_name">{{ $p->product_name }}</td>
                        <td data-target="brand_name">{{ $p->Brand->brand_name }}</td>
                        <td data-target="category_name">{{ $p->Category->category_name }}</td>
                        <td data-target="quantity" class="number">{{ $p->quantity }}</td>
                        <td data-target="price" class="number">{{ number_format($p->price, 2) }}</td>
                        <td>{{ $p->created_at }}</td>
                        <td>{{ $p->updated_at }}</td>
                        <td>
                            <div class="table-data-feature">
                                <form action="{{url("admin/product/edit",['id'=>$p->id])}}">
                                    <button class="btn btn-info"><i class="icon-pencil"></i>sửa</button>
                                </form>
                                <form action="{{url("admin/product/delete",['id'=>$p->id])}}">
                                    <button class="btn btn-danger"><i class="icon-info-sign"></i>xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <p>Không có sản phẩm</p>
                @endforelse
                </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
@endsection