@extends("admin.layout")

@section("top_content")
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div class="quick-actions_homepage">
    <h2>Category Table Manage</h2>
      <ul class="quick-actions">
        <li class="bg_lb"> <a href="interface.html"> <i class="icon-pencil"></i>Create Category</a> </li>
      </ul>
    </div>
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
                <tr class="odd gradeX">
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0</td>
                  <td>Win 95+</td>
                  <td class="center"> 4</td>
                  <td class="center">X</td>
                </tr>
                <tr class="even gradeC">
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.0</td>
                  <td>Win 95+</td>
                  <td class="center">5</td>
                  <td class="center">C</td>
                </tr>
                <tr class="odd gradeA">
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.5</td>
                  <td>Win 95+</td>
                  <td class="center">5.5</td>
                  <td class="center">A</td>
                </tr>
                <tr class="even gradeA">
                  <td>Trident</td>
                  <td>Internet
                    Explorer 6</td>
                  <td>Win 98+</td>
                  <td class="center">6</td>
                  <td class="center">A</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
@endsection