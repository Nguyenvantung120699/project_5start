@extends('layout')



@section('content')
    <section class="home_banner_area mb-40">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="col-lg-12">
                        <p class="sub text-uppercase">{{trans('home.banner_content')}}</p>
                        <h3><span>Meet </span> Your  <br />Aesthetic  <span>Gaze</span></h3>
                        <h4>Bring the essence of art with high spiritual values</h4>
                        <a class="main_btn mt-40" href="">View Collection</a>
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
                            <h3>Money back gurantee</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-truck"></i>
                            <h3>Free Delivery</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-support"></i>
                            <h3>Alway support</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-blockchain"></i>
                            <h3>Secure payment</h3>
                        </a>
                        <p>Shall open divide a one</p>
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
                        <h2><span>Category Listing</span></h2>
                        <p>Click on the catalog you want to see to know more about our products</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($categories as $c)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <div class="product-img ">
                                <?php $product =\App\Product::where("category_id",$c->id)->take(1)->get(); ?>
                                @foreach($product as $p)
                                    <img class="img-fluid w-100" src="{{$p->thumbnail}}" alt="" />
                                @endforeach
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
                        <h3 class="text-uppercase mb-40"><b>All brand products "Gom Bat Trang"</b></h3>
                        <h2 class="text-uppercase"><b>50% off</b></h2>
                        <a href="{{url("/thuong-hieu/2")}}" class="main_btn mb-20 mt-5">Discover Now</a>
                        <p><b>Limited Time Offer</b></p>
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
                        <h2><span>Top Selling Products</span></h2>
                        <p>The products below are many people choose and love</p>
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
