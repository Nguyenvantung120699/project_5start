@extends('layout')



@section('content')
    <section class="home_banner_area mb-40">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="col-lg-12">
                        <p class="sub text-uppercase">{{trans('home.banner_content')}}</p>
                        <h3><span>{{trans('home.banner_content_1')}} </span> {{trans('home.banner_content_2')}}  <br />{{trans('home.banner_content_3')}}  <span>{{trans('home.banner_content_4')}}</span></h3>
                        <h4>{{trans('home.banner_content_5')}}</h4>
                        <a class="main_btn mt-40" href="">{{trans('home.button_banner_content')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!-- Start feature Area -->
    <section class="feature-area section_gap_bottom_custom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-money"></i>
                            <h3>{{trans('home.list_service_money')}}</h3>
                        </a>
                        <p>{{trans('home.service_money')}}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-truck"></i>
                            <h3>{{trans('home.list_service_delivery')}}</h3>
                        </a>
                        <p>{{trans('home.service_delivery')}}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-support"></i>
                            <h3>{{trans('home.list_service_support')}}</h3>
                        </a>
                        <p>{{trans('home.service_support')}}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-blockchain"></i>
                            <h3>{{trans('home.list_service_payment')}}</h3>
                        </a>
                        <p>{{trans('home.service_payment')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End feature Area -->

    <!--================ Feature Product Area =================-->
    <section class="feature_product_area section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>{{trans('home.category_list')}}</span></h2>
                        <p>{{trans('home.category_list_introduce')}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($categories as $c)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <div class="product-img ">
                                    <img class="img-fluid w-100" src="{{asset($c->image)}}" alt="" />
                                <div class="p_icon">
                                    <a href="{{url("/danh-muc/{$c->id}")}}">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a href="">
                                        <i class="ti-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-btm">
                                <a class="d-block">
                                    <h4>{{$c->category_name}}</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================ Offer Area =================-->
    <section class="offer_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="offset-lg-4 col-lg-6 text-center">
                    <div class="offer_content">
                        <h3 class="text-uppercase mb-40"><b>{{trans('home.text_offer')}}</b></h3>
                        <h2 class="text-uppercase"><b>{{trans('home.offer_sale_off')}}</b></h2>
                        <a href="{{url("/thuong-hieu/2")}}" class="main_btn mb-20 mt-5">{{trans('home.button_offer')}}</a>
                        <p><b>{{trans('home.time_offer')}}</b></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Offer Area =================-->
    <section style="padding-top:5%" class="feature_product_area section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>{{trans('home.product_selling')}}</span></h2>
                        <p>{{trans('home.product_selling_introduce')}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($purchased as $p)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <div class="product-img">
                                <img
                                    class="card-img"
                                    src="{{asset($p->thumbnail)}}"
                                    alt=""
                                />
                                <div class="p_icon">
                                    <a href="{{url("san-pham/{$p->id}")}}">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-heart"></i>
                                    </a>
                                    <a href="{{url("shopping/{$p->id}")}}">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-btm">
                                <a href="#" class="d-block">
                                    <h4>{{$p->product_name}}</h4>
                                </a>
                                <div class="mt-3">
                                    <span class="mr-4">{{$p->price}}</span>
                                    <del>{{$p->price}}</del>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
