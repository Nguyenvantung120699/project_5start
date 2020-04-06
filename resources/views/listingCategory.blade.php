@extends('layout')
@section('title','Listing')
@section('content')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>{{$category->category_name}}</h2>
                        <p>{{trans('category.category_introduce')}}</p>
                    </div>
                    <div class="page_link">
                        <a href="{{url("/")}}">{{trans('category.home')}}</a>
                        <a href="#">{{trans('category.shop_category')}}</a>
                        <a href="#">{{$category->category_name}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cat_product_area section_gap">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="product_top_bar">
                        <div class="left_dorp">
                            <select class="sorting">
                                <option value="1">{{trans('category.default_sorting')}}</option>
                                <option value="2">{{trans('category.default_sorting1')}}</option>
                                <option value="4">{{trans('category.default_sorting2')}}</option>
                            </select>
                            <select class="show">
                                <option value="1">{{trans('category.show')}}</option>
                                <option value="2">{{trans('category.show2')}}</option>
                                <option value="4">{{trans('category.show3')}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="latest_product_inner">
                        <div class="row">
                            @foreach($products as $p)
                            <div class="col-lg-4 col-md-6">
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
                                        <a href="{{url("san-pham/{$p->id}")}}" class="d-block">
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
                </div>

                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>{{trans('category.name')}}</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @foreach($categories as $c)
                                       <li> <a href="{{url("danh-muc/{$c->id}")}}">{{$c->category_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>

                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>{{trans('category.brand_name')}}</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @foreach($brands as $b)
                                        <li> <a href="{{url("thuong-hieu/{$b->id}")}}">{{$b->brand_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
