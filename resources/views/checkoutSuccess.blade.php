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
                        <h2>Product Checkout</h2>
                        <p>Very us move be blessed multiply night</p>
                    </div>
                    <div class="page_link">
                        <a href="{{url("/")}}">Home</a>
                        <a href="{{url("/check-out")}}">Product Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="checkout-success" style="text-align: center ;padding-bottom: 100px">

    <img src="{{asset("img/success.jpg")}} " alt="" style="width: 70px;height: 70px">
    <h3>Thank you for your purchase!</h3>
    <p>We'll email you an order confirmation with details and tracking info.</p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Rate now
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rate box</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="review_box">
                        <h4>Add a Review</h4>
                        <p>Your Rating:</p>
                        <ul class="list">
                            <div id="review"></div>
                        </ul>

                        <form class="row contact_form" action="{{url("feedback")}}" method="post" id="contactForm" novalidate="novalidate">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="customer_name" placeholder="Your name"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="number" name="telephone" placeholder="Phone Number"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                        <textarea class="form-control" name="message" id="message" rows="1" placeholder="Review"></textarea>
                                </div>
                            </div>
                            <input hidden type="text" readonly id="starsInput" name="rate" class="form-control form-control-sm">
                            <div class="col-md-12 text-right">
                                <button type="submit" value="submit" class="btn submit_btn">Submit Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{url("/")}}" class="btn btn-primary"> Continue Shopping</a>
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

