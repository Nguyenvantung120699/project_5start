<!DOCTYPE html>
<html lang="en">


@include('html.head')
<body>

	<!-- Start Header Area -->
@include('html.header')
<!-- Header section end -->

<!-- Product section -->

<section class="product-section">

        @yield('content')


</section>
@include('html.js')
<!-- Product section end -->
@include('html.footer')

@yield('popup')
<!-- Modal -->
@if(!Auth::check())
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="container">
        <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
            <form action="#" method="post" class="login100-form validate-form">
                <span class="login100-form-title p-b-55">
                Login
                </span>
                @csrf
            <div class="modal-body">
                <div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
                    <input type="email" name="email" class="form-control input100" placeholder="email"/>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <span class="lnr lnr-envelope"></span>
                    </span>
                </div>
                <div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
                    <input type="password" name="password" class="form-control input100" placeholder="password"/>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <span class="lnr lnr-envelope"></span>
                    </span>
                </div>
            </div>
            <div class="contact100-form-checkbox m-l-4">
                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                <label class="label-checkbox100" for="ckb1">
                        Remember me
                </label>
                </div>
					
                <div class="container-login100-form-btn p-t-25">
                        <button id="loginBtn" type="button" class="login100-form-btn">
                                Login
                        </button>
                </div>

                <div class="text-center w-full p-t-42 p-b-22">
                        <span class="txt1">
                                Or login with
                        </span>
                </div>

                <a href="#" class="btn-face m-b-10">
                        <i class="fa fa-facebook-official"></i>
                        Facebook
                </a>

                <a href="#" class="btn-google m-b-10">
                        <img src="{{ asset("/login_v11/images/icons/icon-google.png")}}" alt="GOOGLE">
                        Google
                </a>
                <div class="text-center w-full p-t-115">
                        <span class="txt1">
                                Not a member?
                        </span>

                        <a class="txt1 bo1 hov1" href="{{ route('register') }}">
                                Register now					
                        </a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
    <script type="text/javascript">
        $("#loginBtn").bind("click",function () {
           $.ajax({
               url: "{{url("postLogin")}}",
               method: "POST",
               data: {
                   _token: $("input[name=_token]").val(),
                   email: $("input[name=email]").val(),
                   password: $("input[name=password]").val(),
               },
               success: function (res) {
                   if(res.status){
                        location.reload();
                   }else{
                       alert(res.message);
                   }
               }
           });
        });
    </script>
@endif
</body>
</html>