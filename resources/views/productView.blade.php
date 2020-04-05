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
                        <h2>Product Details</h2>
                        <p>Very us move be blessed multiply night</p>
                    </div>
                    <div class="page_link">
                        <a href="#">Home</a>
                        <a href="#">Product Details</a>
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
                            <ol class="carousel-indicators">
                                <li
                                    data-target="#carouselExampleIndicators"
                                    data-slide-to="0"
                                    class="active"
                                >
                                    <img
                                        src="{{$product->thumbnail}}" style="width: 60px;height: 60px"
                                        alt=""
                                    />
                                </li>
                                <li
                                    data-target="#carouselExampleIndicators"
                                    data-slide-to="1"
                                >
                                    <img
                                        src="{{$product->thumbnail}}" style="width: 60px;height: 60px"
                                        alt=""
                                    />
                                </li>
                                <li
                                    data-target="#carouselExampleIndicators"
                                    data-slide-to="2"
                                >
                                    <img
                                        src="{{$product->thumbnail}}" style="width: 60px;height: 60px"
                                        alt=""
                                    />
                                </li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img
                                        class="d-block w-100"
                                        src="{{$product->thumbnail}}"
                                        alt="First slide"
                                    />
                                </div>
                                <div class="carousel-item">
                                    <img
                                        class="d-block w-100"
                                        src="{{$product->thumbnail}}"
                                        alt="Second slide"
                                    />
                                </div>
                                <div class="carousel-item">
                                    <img
                                        class="d-block w-100"
                                        src="{{$product->thumbnail}}"
                                        alt="Third slide"
                                    />
                                </div>
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
                                <a href="#"><span>Category</span> : {{$product->Category->category_name}}</a>
                            </li>
                            <li>
                                <p><a href="#"> <span>Brand</span> : {{$product->Brand->brand_name}}</a><br></p>
                                <a href="#"> <span>Qty</span> : {{$product->quantity}}</a>
                            </li>
                        </ul>
                        <p>
                            {{$product->product_desc}}
                        </p>
                        <form action="{{url("shopping/{$product->id}")}}" method="post">
                            @csrf

                            <div class="product_count">
                                <label for="qty">Quantity:</label>
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
                                <button class="main_btn" type="submit">Add to Cart</button>
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
                    >Description</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        id="profile-tab"
                        data-toggle="tab"
                        href="#profile"
                        role="tab"
                        aria-controls="profile"
                        aria-selected="false"
                    >Specification</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        id="contact-tab"
                        data-toggle="tab"
                        href="#contact"
                        role="tab"
                        aria-controls="contact"
                        aria-selected="false"
                    >Comments</a
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
                    >Reviews</a
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
                        Beryl Cook is one of Britain’s most talented and amusing artists
                        .Beryl’s pictures feature women of all shapes and sizes enjoying
                        themselves .Born between the two world wars, Beryl Cook eventually
                        left Kendrick School in Reading at the age of 15, where she went
                        to secretarial school and then into an insurance office. After
                        moving to London and then Hampton, she eventually married her next
                        door neighbour from Reading, John Cook. He was an officer in the
                        Merchant Navy and after he left the sea in 1956, they bought a pub
                        for a year before John took a job in Southern Rhodesia with a
                        motor company. Beryl bought their young son a box of watercolours,
                        and when showing him how to use it, she decided that she herself
                        quite enjoyed painting. John subsequently bought her a child’s
                        painting set for her birthday and it was with this that she
                        produced her first significant work, a half-length portrait of a
                        dark-skinned lady with a vacant expression and large drooping
                        breasts. It was aptly named ‘Hangover’ by Beryl’s husband and
                    </p>
                    <p>
                        It is often frustrating to attempt to plan meals that are designed
                        for one. Despite this fact, we are seeing more and more recipe
                        books and Internet websites that are dedicated to the act of
                        cooking for one. Divorce and the death of spouses or grown
                        children leaving for college are all reasons that someone
                        accustomed to cooking for more than one would suddenly need to
                        learn how to adjust all the cooking practices utilized before into
                        a streamlined plan of cooking that is more efficient for one
                        person creating less
                    </p>
                </div>
                <div
                    class="tab-pane fade"
                    id="profile"
                    role="tabpanel"
                    aria-labelledby="profile-tab"
                >
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    <h5>Width</h5>
                                </td>
                                <td>
                                    <h5>128mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Height</h5>
                                </td>
                                <td>
                                    <h5>508mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Depth</h5>
                                </td>
                                <td>
                                    <h5>85mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Weight</h5>
                                </td>
                                <td>
                                    <h5>52gm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Quality checking</h5>
                                </td>
                                <td>
                                    <h5>yes</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Freshness Duration</h5>
                                </td>
                                <td>
                                    <h5>03days</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>When packeting</h5>
                                </td>
                                <td>
                                    <h5>Without touch of hand</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Each Box contains</h5>
                                </td>
                                <td>
                                    <h5>60pcs</h5>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div
                    class="tab-pane fade"
                    id="contact"
                    role="tabpanel"
                    aria-labelledby="contact-tab"
                >
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="comment_list">
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img
                                                src="img/product/single-product/review-1.png"
                                                alt=""
                                            />
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <h5>12th Feb, 2017 at 05:56 pm</h5>
                                            <a class="reply_btn" href="#">Reply</a>
                                        </div>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                        ullamco laboris nisi ut aliquip ex ea commodo
                                    </p>
                                </div>
                                <div class="review_item reply">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img
                                                src="img/product/single-product/review-2.png"
                                                alt=""
                                            />
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <h5>12th Feb, 2017 at 05:56 pm</h5>
                                            <a class="reply_btn" href="#">Reply</a>
                                        </div>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                        ullamco laboris nisi ut aliquip ex ea commodo
                                    </p>
                                </div>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img
                                                src="img/product/single-product/review-3.png"
                                                alt=""
                                            />
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <h5>12th Feb, 2017 at 05:56 pm</h5>
                                            <a class="reply_btn" href="#">Reply</a>
                                        </div>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                        ullamco laboris nisi ut aliquip ex ea commodo
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <h4>Post a comment</h4>
                                <form
                                    class="row contact_form"
                                    action="contact_process.php"
                                    method="post"
                                    id="contactForm"
                                    novalidate="novalidate"
                                >
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="name"
                                                name="name"
                                                placeholder="Your Full name"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input
                                                type="email"
                                                class="form-control"
                                                id="email"
                                                name="email"
                                                placeholder="Email Address"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="number"
                                                name="number"
                                                placeholder="Phone Number"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                        <textarea
                            class="form-control"
                            name="message"
                            id="message"
                            rows="1"
                            placeholder="Message"
                        ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button
                                            type="submit"
                                            value="submit"
                                            class="btn submit_btn"
                                        >
                                            Submit Now
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="tab-pane fade show active"
                    id="review"
                    role="tabpanel"
                    aria-labelledby="review-tab"
                >
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row total_rate">
                                <div class="col-6">
                                    <div class="box_total">
                                        <h5>Overall</h5>
                                        <h4 >{{number_format($rate->avg('rate'),2)}}</h4>
                                        @if(!count($rate)==0)
                                            <h6>({{count($rate)}} Reviews)</h6>
                                        @else
                                            <h6>(No Reviews)</h6>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="rating_list">
                                        <h3>Based on {{count($rate)}} Reviews</h3>
                                        <ul class="list">
                                            <li>
                                                <a href="#"
                                                >5 Star
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i> {{count($rate->where("rate",5))}}</a
                                                >
                                            </li>
                                            <li>
                                                <a href="#"
                                                >4 Star
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i> {{count($rate->where("rate",4))}}</a
                                                >
                                            </li>
                                            <li>
                                                <a href="#"
                                                >3 Star
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i> {{count($rate->where("rate",3))}}</a
                                                >
                                            </li>
                                            <li>
                                                <a href="#"
                                                >2 Star
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i> {{count($rate->where("rate",2))}}</a
                                                >
                                            </li>
                                            <li>
                                                <a href="#"
                                                >1 Star
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i> {{count($rate->where("rate",1))}}</a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="review_list">
                                @forelse ($ratenew as $r)
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img
                                                src="img/product/single-product/review-1.png"
                                                alt=""
                                            />
                                        </div>
                                        <div class="media-body">
                                            <h4>{{$r->name}}</h4>
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
                                    </div>
                                    <p>
                                        {{$r->message}}
                                    </p>
                                </div>
                                    @empty
                                    <p>Chung no chua danh gia</p>
                                    @endforelse

                                    <div class="product_pagination">
                                        {!! $ratenew->links() !!}
                                    </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <h4>Add a Review</h4>
                                <p>Your Rating:</p>
                                <ul class="list">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </li>
                                </ul>
                                <p>Outstanding</p>
                                <form
                                    class="row contact_form"
                                    action="contact_process.php"
                                    method="post"
                                    id="contactForm"
                                    novalidate="novalidate"
                                >
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="name"
                                                name="name"
                                                placeholder="Your Full name"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input
                                                type="email"
                                                class="form-control"
                                                id="email"
                                                name="email"
                                                placeholder="Email Address"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="number"
                                                name="number"
                                                placeholder="Phone Number"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                        <textarea
                            class="form-control"
                            name="message"
                            id="message"
                            rows="1"
                            placeholder="Review"
                        ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button
                                            type="submit"
                                            value="submit"
                                            class="btn submit_btn"
                                        >
                                            Submit Now
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
