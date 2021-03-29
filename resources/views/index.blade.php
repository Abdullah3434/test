<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Food Pharamacy</title>
<meta name="description" content="">
<meta name="robots" content="noindex, follow" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, follow" />
<!-- Place favicon.ico in the root directory -->
<link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/img/favicon.png">
<!--All Css Here-->

<!-- Bootstrap CSS-->

<link rel="stylesheet" href="{{url('/')}}/client/css/bootstrap.min.css">
<!-- Linearicon CSS-->
<link rel="stylesheet" href="{{url('/')}}/client/css/linearicons.min.css">
<!-- Font Awesome CSS-->
<link rel="stylesheet" href="{{url('/')}}/client/css/font-awesome.min.css">

<!-- Animate CSS-->
<link rel="stylesheet" href="{{url('/')}}/client/css/animate.css">
<!-- Owl Carousel CSS-->
<link rel="stylesheet" href="{{url('/')}}/client/css/owl.carousel.min.css">
<!-- Slick CSS-->
<link rel="stylesheet" href="{{url('/')}}/client/css/slick.css">
<!-- Meanmenu CSS-->
<link rel="stylesheet" href="{{url('/')}}/client/css/meanmenu.min.css">
<!-- Easyzoom CSS-->
<link rel="stylesheet" href="{{url('/')}}/client/css/easyzoom.css">
<!-- Venobox CSS-->
<link rel="stylesheet" href="{{url('/')}}/client/css/venobox.css">
<!-- Jquery Ui CSS-->
<link rel="stylesheet" href="{{url('/')}}/client/css/jquery-ui.css">

<!-- Nice Select CSS-->
<link rel="stylesheet" href="{{url('/')}}/client/css/nice-select.css">
<!-- Style CSS -->
<link rel="stylesheet" href="{{url('/')}}/client/css/style.css">
<!-- Responsive CSS -->
<link rel="stylesheet"  href="{{url('/')}}/client/css/responsive.css">
<!-- Modernizr Js -->
<script src="{{url('/')}}/client/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
<div class="wrapper"> 
  <!--Header Area Start-->
  <header>
    <div class="header-container">
      <div class="header-area header-absolute header-sticky pt-30 pb-30">
        <div class="container-fluid pl-50 pr-50">
          <div class="row"> 
            <!--Header Logo Start-->
            <div class="col-lg-3 col-md-3">
              <div class="logo-area"> <a href="index.html"> <img src="{{url('/')}}/client/img/logo.png" alt=""> </a> </div>
            </div>
            <!--Header Logo End--> 
            <!--Header Menu And Mini Cart Start-->
            <div class="col-lg-9 col-md-9 text-lg-right"> 
              <!--Main Menu Area Start-->
              <div class="header-menu">
                <nav>
                  <ul class="main-menu">
                    <li><a href="{{URL('/')}}/">home</a> </li>
                    <li><a href="{{URL('/')}}/shop">Shop</a></li>
                    <li><a href="{{URL('/')}}/aboutus">About Us</a></li>
                    <li><a href="{{URL('/')}}/blog">Blog</a></li>
                    <li><a href="{{URL('/')}}/contactus">Contact Us</a></li>
                  </ul>
                </nav>
              </div>
              <!--Main Menu Area End--> 
              <!--Header Option Start-->
              <div class="header-option">
                <div class="mini-cart-search">
                  <div class="mini-cart"> <a href="{{URL('/')}}/cart"> <span class="cart-icon"> <span class="cart-quantity">{{Session::has('cart') ? Session::get('cart')->totalQty : '0'}}</span> </span> <span class="cart-title">Your cart <br>
                    <strong>PKR {{number_format(Session::has('cart') ? Session::get('cart')->totalPrice : '0')}}</strong></span> </a> </div>
                  <div class="header-search">
                    <div class="search-box"> <a href="#"><i class="fa fa-search"></i></a>
                      <div class="search-dropdown">
                        <form action="#">
                          <input name="search" id="search" placeholder="" value="Search product..." type="text">
                          <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="currency">
                    <div class="currency-box"> @if(Session::has('username')) <a href="{{URL('/')}}/">{{session::get('name')}}</a>
                      <div class="currency-dropdown">
                        <ul class="menu-top-menu">
                          <li><a href="#">My Account</a></li>
                          <li><a href="#">MY Wishlist</a></li>
                          <li><a href="{{URL('/')}}/order/tracking/view">Order Tracking</a></li>
                          <li><a href="{{URL('/')}}/logout">logout</a></li>
                        </ul>
                      </div>
                      @else <a href="#"><i class="fa fa-th"></i></a>
                      <div class="currency-dropdown">
                        <ul class="menu-top-menu">
                          <li><a href="{{URL('/')}}/login">Log in</a></li>
                          <li><a href="{{URL('/')}}/signup">Join</a></li>
                        </ul>
                      </div>
                      @endif </div>
                  </div>
                </div>
              </div>
              <!--Header Option End--> 
            </div>
            <!--Header Menu And Mini Cart End--> 
          </div>
          <div class="row">
            <div class="col-12"> 
              <!--Mobile Menu Area Start-->
              <div class="mobile-menu d-lg-none"></div>
              <!--Mobile Menu Area End--> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <!--header End--> 
  <!--Slider Area Start-->
  <div class="slider-area">
    <div class="hero-slider owl-carousel"> 
      <!--Single Slider Start-->
      <div class="single-slider" style="background-image: url('{{ asset('/client/img/slider/home1-slider1.jpg')}}');">
        <div class="slider-progress"></div>
        <div class="container">
          <div class="hero-slider-content">
            <h1>Perfect Herbs <br>
              Sale In LookBook</h1>
            <div class="slider-border"></div>
            <p>Captain America: Civil War Christopher Markus and Stephen McFeely see the Hulk as the game over moment. </p>
            <div class="slider-btn"> <a href="{{URL('/')}}/shop">Shop Collection <i class="fa fa-chevron-right"></i></a> </div>
          </div>
        </div>
      </div>
      <!--Single Slider End--> 
      <!--Single Slider Start-->
      <div class="single-slider" style="background-image: url(img/slider/home1-slider2.jpg)">
        <div class="slider-progress"></div>
        <div class="container">
          <div class="hero-slider-content">
            <h1>2018 Herbs Trend</h1>
            <div class="slider-border"></div>
            <p>Captain America: Civil War Christopher Markus and Stephen McFeely see the Hulk as the game over moment. </p>
            <div class="slider-btn"> <a href="#">Shop Collection <i class="fa fa-chevron-right"></i></a> </div>
          </div>
        </div>
      </div>
      <!--Single Slider End--> 
    </div>
  </div>
  <!--Slider Area End--> 
  <!--Feature Area Start-->
  <div class="feature-area mt-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6"> 
          <!--Single Feature Start-->
          <div class="single-feature mb-35">
            <div class="feature-icon"> <span class="lnr lnr-rocket"></span> </div>
            <div class="feature-content">
              <h3>FREE SHIPPING</h3>
              <p>ALL ORDER OVER $100</p>
            </div>
          </div>
          <!--Single Feature End--> 
        </div>
        <div class="col-lg-4 col-md-6"> 
          <!--Single Feature Start-->
          <div class="single-feature mb-35">
            <div class="feature-icon"> <span class="lnr lnr-phone"></span> </div>
            <div class="feature-content">
              <h3>24/7 DEDICATED SUPPORT</h3>
              <p>0123 456 789</p>
            </div>
          </div>
          <!--Single Feature End--> 
        </div>
        <div class="col-lg-4 col-md-6"> 
          <!--Single Feature Start-->
          <div class="single-feature mb-35">
            <div class="feature-icon"> <span class="lnr lnr-redo"></span> </div>
            <div class="feature-content">
              <h3>MONEY BACK</h3>
              <p>IF THE ITEM DIDN’T SUIT YOU</p>
            </div>
          </div>
          <!--Single Feature End--> 
        </div>
      </div>
    </div>
  </div>
  <!--Feature Area End--> 
  <!--Categories Area Start-->
  <div class="categories-area mt-115">
    <div class="container">
      <div class="row"> 
        <!--Section Title Start-->
        <div class="col-12">
          <div class="section-title text-center mb-35"> <span>The Best collection</span>
            <h3>Shop By Categories</h3>
          </div>
        </div>
        <!--Section Title End--> 
      </div>
    </div>
    <div class="container-fluid pl-50 pr-50">
      <div class="row">
        <div class="cat-1 col-md-4">
          <div class="categories-img img-full mb-30"> 
          <a href="">
          <img src="{{url('/')}}/client/img/category/home1-category-1.jpg" alt="">
          </a>
            <div class="categories-content">
            @php
        
        $main_category = DB::select( DB::raw("SELECT DISTINCT main_category from product WHERE status = '1'  LIMIT 1" )
        );

        $result3 = DB::select("select* from product where main_category = 'Fashion' and status = '1' ");

        $p = count($result3);
        
        @endphp
        @if(count($main_category)>0)
            @foreach($main_category as $results)



            @php
                        $sub_category = $results->main_category;
                        
                        $sub = DB::select( DB::raw("SELECT DISTINCT sub_category from product WHERE main_category = :value"), array(
                        'value' => $sub_category,
                        ));
                        @endphp
                        
                        @if(count($sub)>0)
                        @foreach($sub as $results)


              
              <a href="{{URL('/')}}/product/{{$sub_category}}/{{$results->sub_category}}">
              {{$results->sub_category}}
              </a>
              
              @endforeach
              @endif

              @endforeach
              @endif
              @if(count($result3)>0)
            
              <h4><strong>{{$p}}</strong> ITEMS</h4>
              
              @endif
            </div>
          </div>
        </div>
        <div class="cat-2 col-md-8">
          <div class="row">
            <div class="cat-3 col-md-7">
              <div class="categories-img img-full mb-30"> <a href="#"><img src="{{url('/')}}/client/img/category/home1-category-2.jpg" alt="">
                <div class="categories-content">




                @php
        
        $main_category = DB::select( DB::raw("SELECT DISTINCT main_category from product WHERE status = :value  LIMIT 1" ), array(
        'value' => '1',
        
        ));

        $result3 = DB::select("select* from product where main_category = 'Mobiles' and status = '1' ");

        $p = count($result3);
        
        @endphp
        @if(count($main_category)>0)
            @foreach($main_category as $results)
              <h3>{{$results->main_category}}</h3>
              
              @endforeach
              @endif
              @if(count($result3)>0)
            
              <h4><strong>{{$p}}</strong> ITEMS</h4>
              
              @endif


                  
                </div>
                </a>
              </div>
            </div>
            <div class="cat-4 col-md-5">
              <div class="categories-img img-full mb-30"> <a href="#"><img  src="{{url('/')}}/client/img/category/home1-category-3.jpg" alt="">
                <div class="categories-content">



                @php
        
                $main_category = DB::select("select * from main_category LIMIT 1 ");

        $result3 = DB::select("select* from product where main_category = 'Gym' and status = '1'");

        $p = count($result3);
        
        @endphp
        @if(count($main_category)>0)
            @foreach($main_category as $results)
              <h3>{{$results->main_category}}</h3>
              
              @endforeach
              @endif
              @if(count($result3)>0)
            
              <h4><strong>{{$p}}</strong> ITEMS</h4>
              
              @endif




                </div>
                </a>
              </div>
            </div>
            <div class="cat-5 col-md-4">
              <div class="categories-img img-full mb-30"> <a href="#"><img  src="{{url('/')}}/client/img/category/home1-category-4.jpg" alt="">
                <div class="categories-content">



                @php
        
        $main_category = DB::select("select * from main_category LIMIT 1 ");

$result3 = DB::select("select* from product where main_category = 'Belts' and status = '1' ");

$p = count($result3);

@endphp
@if(count($main_category)>0)
    @foreach($main_category as $results)
      <h3>{{$results->main_category}}</h3>
      
      @endforeach
      @endif
      @if(count($result3)>0)
    
      <h4> <strong>{{$p}} </strong>ITEMS</h4>
      
      @endif



                </div>
                </a>
              </div>
            </div>
            <div class="cat-6 col-md-8">
              <div class="categories-img img-full mb-30"> <a href="#"><img  src="{{url('/')}}/client/img/category/home1-category-5.jpg" alt="">
                <div class="categories-content">



                @php
        
        $main_category = DB::select("select * from main_category LIMIT 1 ");

$result3 = DB::select("select* from product where main_category = 'Clothing' and status = '1' ");

$p = count($result3);

@endphp
@if(count($main_category)>0)
    @foreach($main_category as $results)
      <h3>{{$results->main_category}}</h3>
      
      @endforeach
      @endif
      @if(count($result3)>0)
    
      <h4><strong>{{$p}}</strong> ITEMS</h4>
      
      @endif




                </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Categories Area End--> 
  <!--Product Area Start-->
  <div class="product-area mt-85">
    <div class="container">
      <div class="row"> 
        <!--Section Title Start-->
        <div class="col-12">
          <div class="section-title text-center mb-35"> <span>The Most Trendy</span>
            <h3>Featured Products</h3>
          </div>
        </div>
        <!--Section Title End--> 
      </div>
      <div class="row">
        <div class="product-slider-active"> 
          
        @if(count($result)>0)
        @foreach($result as $results)
          <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12"> 
            <!--Single Product Start-->
            <div class="single-product mb-25">
              <div class="product-img img-full"> <a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->SKU}}"> <img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt=""> </a>
                <div class="product-action">
                  <ul>
                    <li><a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->SKU}}" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                    <li><a href="#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="product-content">
                <h2><a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->SKU}}">{{$results->name}}</a></h2>
                <div class="product-price">
                  <div class="price-box"> <span class="regular-price">PKR {{number_format($results->price)}}</span> </div>
                  <div class="add-to-cart"> <a href="#">Add To Cart</a> </div>
                </div>
              </div>
            </div>
            <!--Single Product End--> 
            
          </div>
          @endforeach
          @endif 
        </div>
      </div>
    </div>
  </div>
  <!--Product Area End--> 
  <!--Product Countdown Area Start-->
  <div class="product-countdown-area mt-105 ml-50 mr-50">
    <div class="container">
      <div class="row"> 
        <!--Section Title Start-->
        <div class="col-12">
          <div class="section-title text-center mb-30">
            <h3>Deal of The Day</h3>
          </div>
        </div>
        <!--Section Title End--> 
      </div>
      <div class="row">

        <div class="col-lg-8 col-md-10 col-12 ml-auto mr-auto mb-20"> 
          <!--Count Down Area Start-->
          <div class="count-down-area"> 
            <!--Count Down Start-->
            <div class="countdown-inner">
              <div class="count-box">
                <div class="pro-countdown" data-countdown="2020/07/31"></div>
              </div>
            </div>
            <!--Count Down End--> 
            <!--Count Down Start-->
            <div class="countdown-inner">
              <div class="count-box">
                <div class="pro-countdown" data-countdown="2033/10/01"></div>
              </div>
            </div>
            <!--Count Down End--> 
            <!--Count Down Start-->
            <div class="countdown-inner">
              <div class="count-box">
                <div class="pro-countdown" data-countdown="2033/10/01"></div>
              </div>
            </div>
            <!--Count Down End--> 
            <!--Count Down Start-->
            <div class="countdown-inner">
              <div class="count-box">
                <div class="pro-countdown" data-countdown="2033/10/01"></div>
              </div>
            </div>
            <!--Count Down End--> 
            <!--Count Down Start-->
            <div class="countdown-inner">
              <div class="count-box">
                <div class="pro-countdown" data-countdown="2033/10/01"></div>
              </div>
            </div>
            <!--Count Down End--> 
          </div>
          <!--Count Down Area End--> 
        </div>
        
      </div>
      <div class="row">
        <div class="offer-slider">

        @if(count($d)>0)
        @foreach($d as $results)
          <div class="col-md-2">  
            <!--Single Product Start-->
            <div class="single-product mb-25">
              <div class="product-img img-full"> <a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->sku}}"> 
                <img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}"  alt=""> </a> <span class="onsale">Sale!</span>
                <div class="product-action">
                  <ul>
                    <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                    <li><a href="#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="product-content">
                <h2><a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->sku}}">{{$results->name}}</a></h2>
                <div class="product-price">
                  <div class="price-box"> <span class="regular-price">PKR {{number_format($results->price)}}</span> </div>
                  <div class="add-to-cart"> <a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->sku}}">Detailed View</a> </div>
                </div>
              </div>
            </div>
            <!--Single Product End--> 
          </div>
          
          @endforeach
          @endif 
         
         
        </div>
      </div>
    </div>
  </div>
  <!--Product Countdown Area End--> 
  <!--Testimonial Area Start-->
  <div class="testimonial-area mt-75">
    <div class="container">
      <div class="row"> 
        <!--Section Title Start-->
        <div class="col-12">
          <div class="section-title text-center mb-35"> <span>We love our clients</span>
            <h3>What They’re Saying</h3>
          </div>
        </div>
        <!--Section Title End--> 
      </div>
      <div class="row testimonial-active owl-carousel">
        <div class="col-12"> 
          <!--Single Testimonial Start-->
          <div class="single-testimonial text-center">
            <div class="testimonial-img"> <img src="{{url('/')}}/client/img/testimonial/testimonial3.jpg" alt=""> </div>
            <div class="testimonial-content">
              <p>These guys have been absolutely outstanding. Perfect Themes and the best of all that you have many options to choose! Best Support team ever! Very fast responding! Thank you very much! I highly recommend this theme and these people!</p>
              <div class="testimonial-author">
                <h6>Katherine Sullivan <span>Customer</span></h6>
              </div>
            </div>
          </div>
          <!--Single Testimonial End--> 
        </div>
        <div class="col-12"> 
          <!--Single Testimonial Start-->
          <div class="single-testimonial text-center">
            <div class="testimonial-img"> <img src="{{url('/')}}/client/img/testimonial/testimonial2.jpg" alt=""> </div>
            <div class="testimonial-content">
              <p>These guys have been absolutely outstanding. Perfect Themes and the best of all that you have many options to choose! Best Support team ever! Very fast responding! Thank you very much! I highly recommend this theme and these people!</p>
              <div class="testimonial-author">
                <h6>Md Shohel <span>Customer</span></h6>
              </div>
            </div>
          </div>
          <!--Single Testimonial End--> 
        </div>
        <div class="col-12"> 
          <!--Single Testimonial Start-->
          <div class="single-testimonial text-center">
            <div class="testimonial-img"> <img src="{{url('/')}}/client/img/testimonial/testimonial1.jpg" alt=""> </div>
            <div class="testimonial-content">
              <p>These guys have been absolutely outstanding. Perfect Themes and the best of all that you have many options to choose! Best Support team ever! Very fast responding! Thank you very much! I highly recommend this theme and these people!</p>
              <div class="testimonial-author">
                <h6>Katherine Sullivan <span>Customer</span></h6>
              </div>
            </div>
          </div>
          <!--Single Testimonial End--> 
        </div>
      </div>
    </div>
  </div>
  <!--Testimonial Area End--> 
  <!--Brand Area Start-->
  <div class="brand-area mt-100">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="brand-active"> 
            <!--Single Brand Start-->
            <div class="single-brand img-full"> <a href="#"><img src="{{url('/')}}/client/img/brand/brand1.png" alt=""></a> </div>
            <!--Single Brand End--> 
            <!--Single Brand Start-->
            <div class="single-brand img-full"> <a href="#"><img src="{{url('/')}}/client/img/brand/brand2.png" alt=""></a> </div>
            <!--Single Brand End--> 
            <!--Single Brand Start-->
            <div class="single-brand img-full"> <a href="#"><img src="{{url('/')}}/client/img/brand/brand3.png" alt=""></a> </div>
            <!--Single Brand End--> 
            <!--Single Brand Start-->
            <div class="single-brand img-full"> <a href="#"><img src="{{url('/')}}/client/img/brand/brand4.png" alt=""></a> </div>
            <!--Single Brand End--> 
            <!--Single Brand Start-->
            <div class="single-brand img-full"> <a href="#"><img src="{{url('/')}}/client/img/brand/brand5.png" alt=""></a> </div>
            <!--Single Brand End--> 
            <!--Single Brand Start-->
            <div class="single-brand img-full"> <a href="#"><img src="{{url('/')}}/client/img/brand/brand3.png" alt=""></a> </div>
            <!--Single Brand End--> 
            <!--Single Brand Start-->
            <div class="single-brand img-full"> <a href="#"><img src="{{url('/')}}/client/img/brand/brand4.png" alt=""></a> </div>
            <!--Single Brand End--> 
            <!--Single Brand Start-->
            <div class="single-brand img-full"> <a href="#"><img src="{{url('/')}}/client/img/brand/brand5.png" alt=""></a> </div>
            <!--Single Brand End--> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Brand Area End--> 
  <!--Blog Area Start-->
  <div class="blog-area ml-50 mr-50 mt-105">
    <div class="container">
      <div class="row"> 
        <!--Section Title Start-->
        <div class="col-12">
          <div class="section-title text-center mb-35"> <span>From The Blogs</span>
            <h3>Our Latest Posts</h3>
          </div>
        </div>
        <!--Section Title End--> 
      </div>
      <div class="row">
        <div class="blog-slider-active">
          <div class="col-md-4"> 
            <!--Single Blog Start-->
            <div class="single-blog">
              <div class="blog-img img-full"> <a href="single-blog.html"> <img src="{{url('/')}}/client/img/blog/blog1.jpg" alt=""> </a> </div>
              <div class="blog-content">
                <div class="post-date">01/12/2018</div>
                <h3 class="post-title"><a href="single-blog.html">Blog image post</a></h3>
                <p class="post-description">Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero</p>
                <p class="post-author"> <img src="{{url('/')}}/client/img/icon/author.png" alt=""> <span>Posted by </span> <a href="#">admin </a> </p>
              </div>
            </div>
            <!--Single Blog End--> 
          </div>
          <div class="col-md-4"> 
            <!--Single Blog Start-->
            <div class="single-blog">
              <div class="blog-img img-full"> <a href="single-blog.html"> <img src="{{url('/')}}/client/img/blog/blog2.jpg" alt=""> </a> </div>
              <div class="blog-content">
                <div class="post-date">01/12/2018</div>
                <h3 class="post-title"><a href="single-blog.html">Post with Gallery</a></h3>
                <p class="post-description">Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero</p>
                <p class="post-author"> <img src="{{url('/')}}/client/img/icon/author.png" alt=""> <span>Posted by </span> <a href="#">admin </a> </p>
              </div>
            </div>
            <!--Single Blog End--> 
          </div>
          <div class="col-md-4"> 
            <!--Single Blog Start-->
            <div class="single-blog">
              <div class="blog-img img-full"> <a href="single-blog.html"> <img src="{{url('/')}}/client/img/blog/blog3.jpg" alt=""> </a> </div>
              <div class="blog-content">
                <div class="post-date">01/12/2018</div>
                <h3 class="post-title"><a href="single-blog.html">Post with Audio</a></h3>
                <p class="post-description">Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero</p>
                <p class="post-author"> <img src="{{url('/')}}/client/img/icon/author.png" alt=""> <span>Posted by </span> <a href="#">admin </a> </p>
              </div>
            </div>
            <!--Single Blog End--> 
          </div>
          <div class="col-md-4"> 
            <!--Single Blog Start-->
            <div class="single-blog">
              <div class="blog-img img-full"> <a href="single-blog.html"> <img src="{{url('/')}}/client/img/blog/blog4.jpg" alt=""> </a> </div>
              <div class="blog-content">
                <div class="post-date">01/12/2018</div>
                <h3 class="post-title"><a href="single-blog.html">Post with Video</a></h3>
                <p class="post-description">Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero</p>
                <p class="post-author"> <img src="{{url('/')}}/client/img/icon/author.png" alt=""> <span>Posted by </span> <a href="#">admin </a> </p>
              </div>
            </div>
            <!--Single Blog End--> 
          </div>
          <div class="col-md-4"> 
            <!--Single Blog Start-->
            <div class="single-blog">
              <div class="blog-img img-full"> <a href="single-blog.html"> <img src="{{url('/')}}/client/img/blog/blog5.jpg" alt=""> </a> </div>
              <div class="blog-content">
                <div class="post-date">01/12/2018</div>
                <h3 class="post-title"><a href="single-blog.html">Maecenas ultricies</a></h3>
                <p class="post-description">Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero</p>
                <p class="post-author"> <img src="{{url('/')}}/client/img/icon/author.png" alt=""> <span>Posted by </span> <a href="#">admin </a> </p>
              </div>
            </div>
            <!--Single Blog End--> 
          </div>
          <div class="col-md-4"> 
            <!--Single Blog Start-->
            <div class="single-blog">
              <div class="blog-img img-full"> <a href="single-blog.html"> <img src="{{url('/')}}/client/img/blog/blog1.jpg" alt=""> </a> </div>
              <div class="blog-content">
                <div class="post-date">01/12/2018</div>
                <h3 class="post-title"><a href="single-blog.html">Blog image post</a></h3>
                <p class="post-description">Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero</p>
                <p class="post-author"> <img src="{{url('/')}}/client/img/icon/author.png" alt=""> <span>Posted by </span> <a href="#">admin </a> </p>
              </div>
            </div>
            <!--Single Blog End--> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Blog Area End--> 
  <!--News Letter Area Start-->
  <div class="news-letter-area mt-120 mb-120">
    <div class="container">
      <div class="row"> 
        <!--Section Title Start-->
        <div class="col-12">
          <div class="section-title text-center mb-35">
            <h3>Send Newsletter</h3>
          </div>
        </div>
        <!--Section Title End--> 
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="news-latter-box">
            <p>Enter Your Email Address For Our Mailing List To Keep Your Self Update</p>
            <div class="news-letter-form text-center">
              <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="popup-subscribe-form validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                  <div id="mc-form" class="mc-form subscribe-form" >
                    <input id="mc-email" type="email" autocomplete="off" placeholder="Enter your email here" />
                    <button id="mc-submit">Subscribe <i class="fa fa-chevron-right"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--News Letter Area End--> 
  <!--Footer Area Start-->
  <footer>
    <div class="footer-container"> 
      <!--Footer Top Area Start-->
      <div class="footer-top-area black-bg">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6"> 
              <!--Single Footer Widget Start-->
              <div class="single-footer-widget mb-40">
                <div class="footer-title">
                  <h3>My Account</h3>
                </div>
                <ul class="link-widget">
                  <li><a href="about.html">About Us</a></li>
                  <li><a href="#">Team Member</a></li>
                  <li><a href="#">Career</a></li>
                  <li><a href="#">Specials</a></li>
                  <li><a href="shop.html">Best sellers</a></li>
                  <li><a href="#">Our stores</a></li>
                  <li><a href="contact.html">Contact us</a></li>
                </ul>
              </div>
              <!--Single Footer Widget End--> 
            </div>
            <div class="col-lg-3 col-md-6"> 
              <!--Single Footer Widget Start-->
              <div class="single-footer-widget mb-40">
                <div class="footer-title">
                  <h3>Information</h3>
                </div>
                <ul class="link-widget">
                  <li><a href="about.html">About Us</a></li>
                  <li><a href="contact.html">Contact Us</a></li>
                  <li><a href="#">My orders</a></li>
                  <li><a href="#">Terms & Conditions</a></li>
                  <li><a href="#">Returns & Exchanges</a></li>
                  <li><a href="#">Shipping & Delivery</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                </ul>
              </div>
              <!--Single Footer Widget End--> 
            </div>
            <div class="col-lg-3 col-md-6"> 
              <!--Single Footer Widget Start-->
              <div class="single-footer-widget mb-40">
                <div class="footer-title">
                  <h3>Quick Links</h3>
                </div>
                <ul class="link-widget">
                  <li><a href="#">Support Center</a></li>
                  <li><a href="#">Term & Conditions</a></li>
                  <li><a href="#">Shipping</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Help</a></li>
                  <li><a href="#">Products Return</a></li>
                  <li><a href="faq.html">FAQS</a></li>
                </ul>
              </div>
              <!--Single Footer Widget End--> 
            </div>
            <div class="col-lg-3 col-md-6"> 
              <!--Single Footer Widget Start-->
              <div class="single-footer-widget mb-40">
                <div class="footer-title">
                  <h3>Categories</h3>
                </div>
                <ul class="link-widget">
                  <li><a href="#">Bedroom</a></li>
                  <li><a href="#">Furniture</a></li>
                  <li><a href="#">Livingroom</a></li>
                  <li><a href="#">Mobiles & Tablets</a></li>
                  <li><a href="#">Men</a></li>
                  <li><a href="#">Women</a></li>
                  <li><a href="#">Accessories</a></li>
                </ul>
              </div>
              <!--Single Footer Widget End--> 
            </div>
          </div>
        </div>
      </div>
      <!--Footer Top Area End--> 
      <!--Footer Middle Area Start-->
      <div class="footer-middle-area black-bg">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6"> 
              <!--Single Footer Widget Start-->
              <div class="single-footer-widget mb-30">
                <div class="footer-logo"> <a href="index.html"><img src="{{url('/')}}/client/img/logo-footer.png" alt=""></a> </div>
              </div>
              <!--Single Footer Widget End--> 
            </div>
            <div class="col-lg-3 col-md-6"> 
              <!--Single Footer Widget Start-->
              <div class="single-footer-widget mb-30">
                <div class="footer-info">
                  <div class="icon"> <i class="fa fa-home"></i> </div>
                  <p>Address : No 40 Baria Sreet 15/2 NewYork City, NY, United States.</p>
                </div>
              </div>
              <!--Single Footer Widget End--> 
            </div>
            <div class="col-lg-3 col-md-6"> 
              <!--Single Footer Widget Start-->
              <div class="single-footer-widget mb-30">
                <div class="footer-info">
                  <div class="icon"> <i class="fa fa-envelope-open-o"></i> </div>
                  <p>Email: <br>
                    info@yourmail.com</p>
                </div>
              </div>
              <!--Single Footer Widget End--> 
            </div>
            <div class="col-lg-3 col-md-6"> 
              <!--Single Footer Widget Start-->
              <div class="single-footer-widget mb-30">
                <div class="footer-info">
                  <div class="icon"> <i class="fa fa-mobile"></i> </div>
                  <p>Phone: <br>
                    (+68) 123 456 7890</p>
                </div>
              </div>
              <!--Single Footer Widget End--> 
            </div>
          </div>
        </div>
      </div>
      <!--Footer Middle Area End--> 
      <!--Footer Bottom Area Start-->
      <div class="footer-bottom-area black-bg pt-50 pb-50">
        <div class="container">
          <div class="row">
            <div class="col-md-12"> 
              <!--Footer Payment Start-->
              <div class="footer-payments-image"> <img src="{{url('/')}}/client/img/payment/payment-icon.png" alt=""> </div>
              <!--Footer Payment End--> 
              <!--Footer Menu Start-->
              <div class="footer-menu text-center">
                <nav>
                  <ul>
                    <li><a href="#">Site Map</a></li>
                    <li><a href="#">Search Terms</a></li>
                    <li><a href="#">Advanced Search</a></li>
                    <li><a href="#">Orders and Returns</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </nav>
              </div>
              <!--Footer Menu End--> 
              <!--Footer Copyright Start-->
              <div class="footer-copyright">
                <p>Copyright © <a href="#">Herbsmore</a> All Rights Reserved</p>
              </div>
              <!--Footer Copyright End--> 
            </div>
          </div>
        </div>
      </div>
      <!--Footer Bottom Area End--> 
    </div>
  </footer>
  <!--Footer Area End--> 
</div>

<!--All Js Here--> 
<!--Jquery 1.12.4--> 
<script  src="{{url('/')}}/client/js/vendor/jquery-1.12.4.min.js"></script> 
<!--Popper--> 
<script  src="{{url('/')}}/client/js/popper.min.js"></script> 
<!--Bootstrap--> 
<script src="{{url('/')}}/client/js/bootstrap.min.js"></script> 
<!--Imagesloaded--> 
<script src="{{url('/')}}/client/js/imagesloaded.pkgd.min.js"></script> 
<!--Isotope--> 
<script src="{{url('/')}}/client/js/isotope.pkgd.min.js"></script> 
<!--Waypoints--> 
<script src="{{url('/')}}/client/js/waypoints.min.js"></script> 
<!--Counterup--> 
<script src="{{url('/')}}/client/js/jquery.counterup.min.js"></script> 
<!--Carousel--> 
<script  src="{{url('/')}}/client/js/owl.carousel.min.js"></script> 
<!--Slick--> 
<script  src="{{url('/')}}/client/js/slick.min.js"></script> 
<!--Meanmenu--> 
<script src="{{url('/')}}/client/js/jquery.meanmenu.min.js"></script> 
<!--Easyzoom--> 
<script src="{{url('/')}}/client/js/easyzoom.min.js"></script> 
<!--Nice Select--> 
<script src="{{url('/')}}/client/js/jquery.nice-select.min.js"></script> 
<!--ScrollUp--> 
<script src="{{url('/')}}/client/js/jquery.scrollUp.min.js"></script> 
<!--Wow--> 
<script src="{{url('/')}}/client/js/wow.min.js"></script> 
<!--Venobox--> 
<script src="{{url('/')}}/client/js/venobox.min.js"></script> 
<!--Jquery Ui--> 
<script src="{{url('/')}}/client/js/jquery-ui.js"></script> 
<!--Countdown--> 
<script src="{{url('/')}}/client/js/jquery.countdown.min.js"></script> 
<!--Plugins--> 
<script src="{{url('/')}}/client/js/plugins.js"></script> 
<!--Main Js--> 
<script src="{{url('/')}}/client/js/main.js"></script> 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="//geodata.solutions/includes/countrystatecity.js"></script>
</body>
</html>
