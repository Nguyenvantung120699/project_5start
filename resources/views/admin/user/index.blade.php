@extends("admin.layout")

@section("top_content")
<h2>User Table Manage</h2>
<div>
    <div class="quick-actions_homepage">
        <div><a href="{{url('admin/user/create')}}"><button class="btn btn-success">Create User<i class="icon-plus"></i></button></a></div>
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
                    <th>email</th>
                    <th>name</th>
                    <th>email_verified_at</th>
                    <th>role</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse($user as $u)
                    <tr class="tr-shadow">
                        <td>{{$u->id}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email_verified_at}}</td>
                        <td>{{$u->role}}</td>
                        <td>
                            <div class="table-data-feature">
                                <form action="{{url("admin/user/edit",['id'=>$u->id])}}">
                                    <button class="btn btn-info"><i class="icon-pencil"></i>sửa</button>
                                </form>
                                <form action="{{url("admin/user/delete",['id'=>$u->id])}}">
                                    <button class="btn btn-danger"><i class="icon-info-sign"></i>xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                @empty
                    <p>Không có người dùng nào</p>
                @endforelse
                </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
@endsection