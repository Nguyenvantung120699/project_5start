@extends("admin.layout")

@section("top_content")
<h2>Category Table Manage</h2>
<div>
    <div class="quick-actions_homepage">
        <div><a href="{{url('admin/category/create')}}"><button class="btn btn-success">Create Category<i class="icon-plus"></i></button></a></div>
    </div>
  </div>
@endsection

@section("main_content")
<hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Static table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>IMG</th>
                    <th>name</th>
                    <th>created at</th>
                    <th>updated at</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $c)
                    <tr class="tr-shadow">
                        <td>{{$c->id}}</td>
                        <td><img src="{{asset($c->image)}} " class="img-thumbnail"></td>
                        <td>{{$c->category_name}}</td>
                        <td>{{$c->created_at}}</td>
                        <td>{{$c->updated_at}}</td>
                        <td>
                            <div class="table-data-feature">
                                <form action="{{url("admin/category/edit",['id'=>$c->id])}}">
                                    <button class="btn btn-info"><i class="icon-pencil"></i>sửa</button>
                                </form>
                                <form action="{{url("admin/category/delete",['id'=>$c->id])}}">
                                    <button class="btn btn-danger"><i class="icon-info-sign"></i>xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                @empty
                    <p>Không có danh mục nào</p>
                @endforelse
                </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
@endsection
