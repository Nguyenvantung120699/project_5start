@extends("admin.layout")

@section("top_content")
<h2>Create User</h2>
@endsection

@section("main_content")

<div id="loginbox">            
            <form id="loginform" class="form-vertical" action="{{url("admin/user/store")}}"  method="post">
                @csrf
				 <div class="control-group normal_text"> <h3><img src="{{asset("admin/html/img/logo.png")}}" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="name" type="text" value="{{old("name")}}"
                               class="form-control cc-name @if($errors->has("name"))is-invalid @endif" placeholder="name" />
                               @if($errors->has("name"))
                                <p style="color:red">{{$errors->first("name")}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-inbox"> </i></span><input type="email" name="email" type="text" value="{{old("email")}}"
                               class="form-control cc-name @if($errors->has("email"))is-invalid @endif" placeholder="email" />
                               @if($errors->has("email"))
                                <p style="color:red">{{$errors->first("email")}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-lock"> </i></span><input type="text" name="password" type="text" value="{{old("password")}}"
                               class="form-control cc-name @if($errors->has("password"))is-invalid @endif" placeholder="password" />
                               @if($errors->has("password"))
                                <p style="color:red">{{$errors->first("password")}}</p>
                            @endif
                        </div>
                    </div>
                </div>  
                <div class="form-actions">
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                        <span id="payment-button-amount">Gửi đi</span>
                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                    </button>
                </div>
            </form>
        </div>
    @endsection