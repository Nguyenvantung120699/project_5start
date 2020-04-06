@extends('layout')
@section('title',"Đặt hàng thành công")
<link href="{{asset("css/font-awesome.min.css")}}" rel="stylesheet" type="text/css">
<script src="{{asset("js/jquery-3.2.1.min.js")}}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="dist/rating.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

@section('content')

    <section class="banner_area" style="height: 300px">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div
                    class="banner_content d-md-flex justify-content-between align-items-center"
                >
                    <div class="mb-3 mb-md-0">
                        <h2>{{trans('checkout_success.product_checkout')}}</h2>
                        <p>{{trans('checkout_success.product_checkout_introduce')}}</p>
                    </div>
                    <div class="page_link">
                        <a href="{{url("/")}}">{{trans('checkout_success.home')}}</a>
                        <a href="{{url("/check-out")}}">{{trans('checkout_success.product_checkout')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="checkout-success" style="text-align: center ;padding-bottom: 100px">

    <img src="{{asset("img/success.jpg")}} " alt="" style="width: 70px;height: 70px">
    <h3>{{trans('checkout_success.status')}}</h3>
    <p>{{trans('checkout_success.status2')}}</p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    {{trans('checkout_success.Rate_now')}}
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> {{trans('checkout_success.Rate_box')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="review_box">
                        <h4>{{trans('checkout_success.Add_a_Review')}}</h4>
                        <p>{{trans('checkout_success.Your_Rating')}}</p>
                        <ul class="list">
                            <div id="review"></div>
                        </ul>

                        <form class="row contact_form" action="{{url("feedback")}}" method="post" id="contactForm" novalidate="novalidate">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="customer_name" placeholder="{{trans('checkout_success.form1')}}"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="{{trans('checkout_success.form2')}}"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="number" name="telephone" placeholder="{{trans('checkout_success.form3')}}"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                        <textarea class="form-control" name="message" id="message" rows="1" placeholder="{{trans('checkout_success.form4')}}"></textarea>
                                </div>
                            </div>
                            <input hidden type="text" readonly id="starsInput" name="rate" class="form-control form-control-sm">
                            <div class="col-md-12 text-right">
                                <button type="submit" value="submit" class="btn submit_btn">{{trans('checkout_success.button')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{url("/")}}" class="btn btn-primary">{{trans('checkout_success.Continue_Shopping')}}</a>
</div>
    <script>
        $("#review").rating({
            "value": 5,
            "click": function (e) {
                console.log(e);
                $("#starsInput").val(e.stars);
            }
        });
    </script>
@endsection

