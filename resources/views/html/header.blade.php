<header class="header_area">
    <div class="top_menu">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="float-left">
              <p>Phone: +84 256 25 235</p>
              <p>email: info@eiser.com</p>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="float-right">
              <ul class="right_side">
                <li>
                  <a href="{{url("cart")}}">
                    gift card
                  </a>
                </li>
                <li>
                  <a href="#">
                    track order
                  </a>
                </li>
                <li>
                  <a href="{{url("contact")}}">
                    Contact Us
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="main_menu">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="{{url("/")}}">
            <img src="{{asset("img/logo.png")}}" alt="" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
            <div class="row w-100 mr-0">
              <div class="col-lg-7 pr-0">
                <ul class="nav navbar-nav center_nav pull-right">
                  <li class="nav-item">
                    <a class="nav-link" href="{{url("/")}}">Home</a>
                  </li>
                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">Category</a>
                    <ul class="dropdown-menu">
                        @foreach(\App\Category::all() as $c)
                      <li class="nav-item">
                        <a class="nav-link" href="{{url("/danh-muc/{$c->id}")}}">{{$c->category_name}}</a>
                      </li>
                            @endforeach
                    </ul>
                  </li>

                    <li class="nav-item submenu dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Brand</a>
                        <ul class="dropdown-menu">
                            @foreach(\App\Brand::all() as $c)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url("/thuong-hieu/{$c->id}")}}">{{$c->brand_name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">Blog</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Blog Details</a>
                      </li>
                    </ul>
                  </li>

                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">Pages</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="#">Tracking</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Elements</a>
                      </li>
                    </ul>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{url("contact")}}">Contact</a>
                  </li>
                </ul>
              </div>

              <div class="col-lg-5 pr-0">
                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                  <li class="nav-item submenu dropdown">
{{--                  <form action="">--}}
{{--                    <a href="#" href="#" class="icons nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"--}}
{{--                      aria-expanded="false">--}}
{{--                      <i class="ti-search" aria-hidden="true"></i>--}}
{{--                      <ul class="dropdown-menu">--}}
{{--                      <li class="nav-item">--}}
{{--                        <input type="text" class="form-control" name="search" required placeholder="search">--}}
{{--                      </li>--}}
{{--                    </ul>--}}
{{--                    </a>--}}
{{--                  </form>--}}
                  </li>

                  <li class="nav-item">
                      <form class="form-inline "  style="width: 250px;padding-top:22px" method="get" action="{{asset('search')}}">
                          <input class="form-control form-control-sm ml-3 w-75 " name="key"  type="text"  placeholder="Search"
                                 aria-label="Search" >
                          <button style="height: 30px;width: 30px" type="submit"> <span class="fa fa-search form-control-feedback"></span></button>
                      </form>
                  </li>

                  <li class="nav-item">
                    <a href="{{url("/cart")}}" class="icons">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </li>

                  <li class="nav-item submenu dropdown">
                    <a href="#" class="icons nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">
                      <i class="ti-user" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="#">My Account</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{url("/admin/home")}}">Admin</a>
                      </li>
                    </ul>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="icons">
                      <i class="ti-heart" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>

  </header>
