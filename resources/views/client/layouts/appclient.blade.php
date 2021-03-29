<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Food Pharmacy</title>
<meta name="description" content="">
<meta name="robots" content="noindex, follow" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, follow" />
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
<!-- Place favicon.ico in the root directory -->
<link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/client/img/favicon.png">
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
      <div class="header-area header-sticky pt-10 pb-10">
        <div class="container-fluid pl-50 pr-50">
          <div class="row"> 
            <!--Header Logo Start-->
            <div class="col-lg-3 col-md-3">
              <div class="logo-area"> <a href="{{url('/')}}/"> <img src="{{url('/')}}/client/img/logo.png" alt="Food Pharmacy"> </a> </div>
            </div>
            <!--Header Logo End--> 
            <!--Header Menu And Mini Cart Start-->
            <div class="col-lg-9 col-md-9 text-lg-right"> 
              <!--Main Menu Area Start-->
              <div class="header-menu">
                <nav>
                  <ul class="main-menu">
                    <li><a href="{{URL('/')}}/">home</a> </li>
                    <!--<li><a href="{{URL('/')}}/shop">Shop</a></li>-->
                    <li><a href="{{URL('/')}}/recommendation">TFP Recommendation</a></li>
                     <li><a href="{{URL('/')}}/blog">Blog</a></li>
                    
                    <li><a href="{{URL('/')}}/coaching">Coaching</a></li>
                    @if(Session::has('username'))
                    @else
                    
                    <li><a href="{{URL('/')}}/login">Log in</a></li>
                    <li><a href="{{URL('/')}}/signup">Signup</a></li>
                    @endif
                  </ul>
                </nav>
              </div>
              <!--Main Menu Area End--> 
              <!--Header Option Start-->
              <div class="header-option">
                <div class="mini-cart-search">
                  <div class="currency">
                    <div class="currency-box"> @if(Session::has('username')) <a href="#">{{session::get('name')}}</a>
                      <div class="currency-dropdown">
                        <ul class="menu-top-menu">
                          <!--<li><a href="#">My Account</a></li>-->
                          <!--<li><a href="{{URL('/')}}/view/wishlist">MY Wishlist</a></li>-->
                          <!--<li><a href="{{URL('/')}}/order/tracking/view">Order Tracking</a></li>-->
                          <li><a href="{{URL('/')}}/logout">logout</a></li>
                        </ul>
                        </div>
                        @else 
                        <!--<a href="#"><i class="fa fa-th"></i></a>-->
                        <!--<div class="currency-dropdown">-->
                        <!--<ul class="menu-top-menu">-->
                        <!--  <li><a href="{{URL('/')}}/login">Login</a></li>-->
                        <!--  <li><a href="{{URL('/')}}/signup">Signup</a></li>-->
                        <!--</ul>-->
                        <!--</div>-->
                        @endif 
                    </div>
                  </div>
                  <div class="mini-cart"> <a href="{{URL('/')}}/cart"> 
                    
                    <!-- <li><a class="cart" href="{{URL('/')}}/cart"></a>Your Cart is <span>{{Session::has('cart') ? Session::get('cart')->totalQty : '0'}}</span></li> --> 
                    
                    <span class="cart-icon"> <span class="cart-quantity">{{Session::has('cart') ? Session::get('cart')->totalQty : '0'}}</span> </span> <span class="cart-title">Your cart <br>
                    <strong>PKR {{Session::has('cart') ? Session::get('cart')->totalPrice : '0'}}</strong></span> </a> 
                    <!--Cart Dropdown Start--> 
                    <!-- <div class="cart-dropdown">
                                              <ul>
                                                  <li class="single-cart-item">     
                                                      <div class="cart-img">
                                                          <a href="single-product.html"><img src="{{url('/')}}/client/img/cart/cart1.jpg" alt=""></a>
                                                      </div>
                                                      <div class="cart-content">
                                                          <h5 class="product-name"><a href="single-product.html">Odio tortor consequat</a></h5>
                                                          <span class="cart-price">1 × $90.00</span>
                                                      </div>
                                                      <div class="cart-remove">
                                                          <a title="Remove" href="#"><i class="fa fa-times"></i></a>
                                                      </div>
                                                  </li>
                                                  <li class="single-cart-item">
                                                      <div class="cart-img">
                                                          <a href="single-product.html"><img src="{{url('/')}}/client/img/cart/cart2.jpg" alt=""></a>
                                                      </div>
                                                      <div class="cart-content">
                                                          <h5 class="product-name"><a href="single-product.html">Auctor sem</a></h5>
                                                          <span class="cart-price">1 × $100.00</span>
                                                      </div>
                                                      <div class="cart-remove">
                                                          <a title="Remove" href="#"><i class="fa fa-times"></i></a>
                                                      </div>
                                                  </li>
                                               </ul> 
                                              <p class="cart-subtotal"><strong>Subtotal:</strong> <span class="float-right">$190.00</span></p> 
                                              <p class="cart-btn">
                                                  <a href="cart.html">View cart</a>
                                                  <a href="checkout.html">Checkout</a>
                                              </p>
                                          </div> --> 
                    <!--Cart Dropdown End--> 
                  </div>
                  <div class="header-search">
                    <div class="search-box"> <a href="#"><i class="fa fa-search"></i></a>
                      <div class="search-dropdown">
                        <form action="#">
                          <input name="search" type="text">
                          <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                      </div>
                    </div>
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
  
  @yield('content') 
  <!--Footer Area Start-->
  <footer>
    <div class="footer-container"> 
      <!--Footer Top Area Start-->
      <div class="footer-top-area black-bg">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6"> 
              <!--Single Footer Widget Start-->
              <div class="single-footer-widget mb-40">
                <div class="footer-title">
                  <h3>My Account</h3>
                </div>
                <ul class="link-widget">
                  <li><a href="{{URL('/')}}/login">Login</a></li>
                  <li><a href="{{URL('/')}}/signup">Signup</a></li>
                </ul>
              </div>
              <!--Single Footer Widget End--> 
            </div>
            <div class="col-lg-4 col-md-6"> 
              <!--Single Footer Widget Start-->
              <div class="single-footer-widget mb-40">
                <div class="footer-title">
                  <h3>Information</h3>
                </div>
                <ul class="link-widget">
                  <li><a href="{{URL('/')}}/aboutus">About Us</a></li>
                  <li><a href="{{URL('/')}}/contactus">Contact us</a></li>
                  <li><a href="{{URL('/')}}/termsandcondition">Terms & Conditions</a></li>
                  <li><a href="{{URL('/')}}/privacypolicy">Privacy Policy</a></li>
                  <li><a href="{{URL('/')}}/FAQ">FAQS</a></li>
                </ul>
              </div>
              <!--Single Footer Widget End--> 
            </div>
            <div class="col-lg-4 col-md-6"> 
              <!--Single Footer Widget Start-->
              <div class="single-footer-widget mb-40">
                <div class="footer-title">
                  <h3>Quick Links</h3>
                </div>
                <ul class="link-widget">
                  <li><a href="{{URL('/')}}/vendor/signup">Vendor Signup</a></li>
                  <li><a href="{{URL('/')}}/vendor/login">Vendor Login</a></li>
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
                <div class="footer-logo"> <a href="{{url('/')}}/"><img src="{{url('/')}}/client/img/logo-footer.png" alt=""></a> </div>
              </div>
              <!--Single Footer Widget End--> 
            </div>
            <div class="col-lg-4 col-md-6"> 
              <!--Single Footer Widget Start-->
              <div class="single-footer-widget mb-30">
                <div class="footer-info">
                  <div class="icon"> <i class="fa fa-envelope-open-o"></i> </div>
                  <p>Email: <br>
                  <a href="mailto:thefoodpharmacyapp@gmail.com ">thefoodpharmacyapp@gmail.com </a>
                    </p>
                </div>
              </div>
              <!--Single Footer Widget End--> 
            </div>
            <div class="col-lg-4 col-md-6"> 
              <!--Single Footer Widget Start-->
              <div class="single-footer-widget mb-30">
                <div class="footer-info">
                  <div class="icon"> <i class="fa fa-mobile"></i> </div>
                  <p>Phone: <br>
                  <a class="mobilesOnly" href="tel:+923028437778">(+92) 302 843 7778</a>
                  </p>
                    
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
              <!--Footer Copyright Start-->
              <div class="footer-copyright">
                <p>Copyright © <a href="https://thefoodpharmacy.pk/">The FoodPharmacy</a> All Rights Reserved</p>
                <p>Powered By <a href="https://greengrapez.com/"><img src="{{url('/')}}/client/img/greengrapez.png" alt="Green Grapez"></a> </p>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="//geodata.solutions/includes/countrystatecity.js"></script> 



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
</body>
</html>
