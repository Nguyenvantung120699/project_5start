@extends("admin.layout")

@section("top_content")
<h2>Create Category</h2>
@endsection

@section("main_content")

<div id="loginbox">            
            <form id="loginform" class="form-vertical" action="index.html"  method="post">
				 <div class="control-group normal_text"> <h3><img src="{{asset("admin/html/img/logo.png")}}" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <input type="text" name="category_name" type="text" value="{{$categorys->category_name}}"
                               class="form-control cc-name @if($errors->has("category_name"))is-invalid @endif" placeholder="category_name" />
                               @if($errors->has("category_name"))
                                <p style="color:red">{{$errors->first("category_name")}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Submit</a></span>
                </div>
            </form>
        </div>
    @endsection