@extends('layout')
@section('title','Product details')
@section('content')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div
                    class="banner_content d-md-flex justify-content-between align-items-center"
                >
                    <div class="mb-3 mb-md-0">
                        <h2>{{trans('viewproduct.product_details')}}</h2>
                        <p>{{trans('viewproduct.product_details_introduce')}}</p>
                    </div>
                    <div class="page_link">
                        <a href="#">{{trans('viewproduct.home')}}</a>
                        <a href="#">{{trans('viewproduct.product_details')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_product_img">
                        <div
                            id="carouselExampleIndicators"
                            class="carousel slide"
                            data-ride="carousel"
                        >
                            @php
                                $gallery = $product->gallery;
                                $gallery = explode(",",$gallery);// string -> array
                            @endphp
                            <ol class="carousel-indicators">
                                <li
                                    data-target="#carouselExampleIndicators"
                                    data-slide-to="0"
                                    class="active"
                                >
                                    <img
                                        src="{{asset($product->thumbnail)}}" style="width: 60px;height: 60px"
                                        alt=""
                                    />
                                </li>
                                @foreach($gallery as $g)
                                <li
                                    data-target="#carouselExampleIndicators"
                                    data-slide-to="1"
                                >
                                    <img
                                        src="{{asset($g)}}" style="width: 60px;height: 60px"
                                        alt=""
                                    />
                                </li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img
                                        class="d-block w-100"
                                        src="{{asset($product->thumbnail)}}"
                                        alt="First slide"
                                    />
                                </div>
                                @foreach($gallery as $g)
                                <div class="carousel-item">
                                    <img
                                        class="d-block w-100"
                                        src="{{asset($g)}}"
                                        alt="Second slide"
                                    />
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{$product->product_name}}</h3>
                        <h2>${{$product->getprice()}}</h2>
                        <ul class="list">
                            <li>
                                <a href="#"><span>{{trans('viewproduct.category')}}</span> : {{$product->Category->category_name}}</a>
                            </li>
                            <li>
                                <p><a href="#"> <span>{{trans('viewproduct.brand')}}</span> : {{$product->Brand->brand_name}}</a><br></p>
                                <a href="#"> <span>{{trans('viewproduct.qty')}}</span> : {{$product->quantity}}</a>
                            </li>
                        </ul>
                        <p>
                            {{$product->product_desc}}
                        </p>
                        <form action="{{url("shopping/{$product->id}")}}" method="post">
                            @csrf

                            <div class="product_count">
                                <label for="qty">{{trans('viewproduct.quantity')}}:</label>
                                <input
                                    type="text"
                                    name="qty"
                                    id="sst"
                                    maxlength="12"
                                    value="1"
                                    title="Quantity:"
                                    class="input-text qty"
                                />
                                <button
                                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                    class="increase items-count"
                                    type="button"
                                >
                                    <i class="lnr lnr-chevron-up"></i>
                                </button>
                                <button
                                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                    class="reduced items-count"
                                    type="button"
                                >
                                    <i class="lnr lnr-chevron-down"></i>
                                </button>
                            </div>
                            <div class="card_area">
                                @if(!Auth::check())
                                    <a href="#" class="site-btn btn-line" data-toggle="modal" data-target="#myModal">
                                        <button class="main_btn" type="submit">{{trans('viewproduct.cart')}}</button>
                                    </a>
                                @else
                                <button class="main_btn" type="submit">{{trans('viewproduct.cart')}}</button>
                                @endif
                                <a class="icon_btn" href="#">
                                    <i class="lnr lnr lnr-diamond"></i>
                                </a>
                                <a class="icon_btn" href="#">
                                    <i class="lnr lnr lnr-heart"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a
                        class="nav-link"
                        id="home-tab"
                        data-toggle="tab"
                        href="#home"
                        role="tab"
                        aria-controls="home"
                        aria-selected="true"
                    >{{trans('viewproduct.description')}}</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link active"
                        id="review-tab"
                        data-toggle="tab"
                        href="#review"
                        role="tab"
                        aria-controls="review"
                        aria-selected="false"
                    >{{trans('viewproduct.reviews')}}</a
                    >
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div
                    class="tab-pane fade"
                    id="home"
                    role="tabpanel"
                    aria-labelledby="home-tab"
                >
                    <p>
                    {{trans('viewproduct.description1')}}
                    </p>
                    <p>
                    {{trans('viewproduct.description2')}}
                    </p>
                </div>
                    
                <div
                    class="tab-pane fade show active"
                    id="review"
                    role="tabpanel"
                    aria-labelledby="review-tab"
                >
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row total_rate">
                                <div class="col-6">
                                    <div class="box_total">
                                        <h5>{{trans('viewproduct.overall')}}</h5>
                                        <h4 >{{number_format($rate->avg('rate'),2)}}</h4>
                                        @if(!count($rate)==0)
                                            <h6>({{count($rate)}} {{trans('viewproduct.no_reviews1')}})</h6>
                                        @else
                                            <h6>({{trans('viewproduct.no_reviews2')}})</h6>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="rating_list">
                                        <h3>{{trans('viewproduct.based_on')}} {{count($rate)}} {{trans('viewproduct.no_reviews1')}}</h3>
                                        <ul class="list">
                                            <li>
                                                <a href="#"
                                                >5 {{trans('viewproduct.star')}}
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i> - {{count($rate->where("rate",5))}}</a
                                                >
                                            </li>
                                            <li>
                                                <a href="#"
                                                >4 {{trans('viewproduct.star')}}
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i> - {{count($rate->where("rate",4))}}</a
                                                >
                                            </li>
                                            <li>
                                                <a href="#"
                                                >3 {{trans('viewproduct.star')}}
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i> - {{count($rate->where("rate",3))}}</a
                                                >
                                            </li>
                                            <li>
                                                <a href="#"
                                                >2 {{trans('viewproduct.star')}}
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i> - {{count($rate->where("rate",2))}}</a
                                                >
                                            </li>
                                            <li>
                                                <a href="#"
                                                >1 {{trans('viewproduct.star')}}
                                                    <i class="fa fa-star"></i> - {{count($rate->where("rate",1))}}</a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <div class="card">
                            @forelse ($ratenew as $r)
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                                            <p class="text-secondary text-center">{{$r->created_at}}</p>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="media-body" style="color:#FFD700">
                                                <h5 style="color:black;">{{$r->name}}</h5>
                                                @if($r->rate==5)
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                @elseif($r->rate==4)
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                @elseif($r->rate==3)
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                @elseif($r->rate==2)
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    @else
                                                    <i class="fa fa-star"></i>
                                                @endif
                                            </div>
                                        <div class="clearfix"></div>
                                            <p>
                                                {{$r->message}}
                                            </p>
                                                <p>
                                                    <a class="float-right btn btn-info text-white ml-2"> <i class="fa fa-reply"></i>{{trans('viewproduct.reply')}}</a>
                                                    <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i>{{trans('viewproduct.like')}}</a>
                                            </p>
                                        </div>
                                        @empty
                                        <p>{{trans('viewproduct.feedback')}}</p>
                                        @endforelse

                                        <div class="product_pagination">
                                            {!! $ratenew->links() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
