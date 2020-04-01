@extends('layout')

@section('title',"Tim kiem")
@section('content')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <p> <div class="results">Showing <span>{{count($products)}}</span> results</div> </p>
                    </div>
                    <div class="page_link">
                        <a href="{{url("/")}}">Home</a>
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
                    </div>

                    <div class="latest_product_inner">
                        <div class="row">
                            @forelse($products as $p)
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
                                            <a href="" class="d-block">
                                                <h4>{{$p->product_name}}</h4>
                                            </a>
                                            <div class="mt-3">
                                                <span class="mr-4">{{$p->getprice()}}</span>
                                                <del>{{$p->getprice()}}</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>Khong tim thay san pham nao</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
