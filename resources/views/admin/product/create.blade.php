@extends("admin.layout")

@section("top_content")
<h2>Create Product</h2>
@endsection

@section("main_content")

<div id="loginbox">            
            <form id="loginform" class="form-vertical" action="{{url("admin/product/store")}}" enctype="multipart/form-data"  method="post">
                @csrf
				 <div class="control-group normal_text"> <h3><img src="{{asset("admin/html/img/logo.png")}}" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <input type="text" name="product_name" type="text" value="{{old("product_name")}}"
                               class="form-control cc-name @if($errors->has("product_name"))is-invalid @endif" placeholder="product name" />
                               @if($errors->has("product_name"))
                                <p style="color:red">{{$errors->first("product_name")}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <input type="text" name="product_desc" type="text" value="{{old("product_desc")}}"
                               class="form-control cc-name @if($errors->has("product_desc"))is-invalid @endif" placeholder="product desc" />
                               @if($errors->has("product_desc"))
                                <p style="color:red">{{$errors->first("product_desc")}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <label for="cc-name" class="control-label mb-1"><h4>Product Thumbnail</h4></label>
                            <input name="thumbnail" type="file" value="{{old("thumbnail")}}" class="form-control cc-name">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <label for="cc-name" class="control-label mb-1"><h4>Gallery</h4></label>
                            <input name="gallery" type="file" value="{{old("gallery")}}" class="form-control cc-name">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <select name="category_id" style="width:77%;height:37px" required>
                            @php
                                $category = \App\Category::all();
                            @endphp
                            <option selected value=""></option>
                            @foreach($category as $c)
                            <option value="{{$c->id}}">{{$c->category_name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <select name="brand_id" style="width:77%;height:37px" required>
                            @php
                                $brand = \App\Brand::all();
                            @endphp
                            <option selected value=""></option>
                            @foreach($brand as $b)
                                    <option value="{{$b->id}}">{{$b->brand_name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <input type="number" name="price" type="text" value="{{old("price")}}"
                               class="form-control cc-name @if($errors->has("price"))is-invalid @endif" placeholder="price" />
                               @if($errors->has("price"))
                                <p style="color:red">{{$errors->first("price")}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                           <input type="number" name="quantity" type="text" value="{{old("quantity")}}"
                               class="form-control cc-name @if($errors->has("quantity"))is-invalid @endif" placeholder="quantity" />
                               @if($errors->has("quantity"))
                                <p style="color:red">{{$errors->first("quantity")}}</p>
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