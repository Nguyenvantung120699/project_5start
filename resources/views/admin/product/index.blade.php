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
            <h5>Static table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
              </thead>
              <tbody>
                <tr class="even gradeA">
                  <td>Trident</td>
                  <td>Internet
                    Explorer 6</td>
                  <td>Win 98+</td>
                  <td class="center">6</td>
                  <td class="center">
                    <div> 
                        <a><button class="btn btn-info"><i class="icon-pencil"></i>sửa</button></a>
                        <a><button class="btn btn-danger"><i class="icon-info-sign"></i>xóa</button></a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
@endsection