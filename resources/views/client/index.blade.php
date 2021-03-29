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
<!-- slider CSS -->
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<!-- slider CSS -->
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- Responsive CSS -->
<link rel="stylesheet"  href="{{url('/')}}/client/css/slider.css">

<script src="{{url('/')}}/client/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
<div class="wrapper"> 
  <!--Header Area Start-->
  <header>
    <div class="header-container">
      <div class="header-area header-absolute pt-30 pb-30">
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
                    <!--<li><a href="{{URL('/')}}/shop">Shop</a></li>-->
                    <li><a href="{{URL('/')}}/recommendation">TFP Recommendation</a></li>
                     <li><a href="{{URL('/')}}/blog">Blog</a></li>
                   
                    <li><a href="{{URL('/')}}/coaching">Coaching</a></li>
                     @if(Session::has('username'))
                    @else
                    
                    <li><a href="{{URL('/')}}/login">Log in</a></li>
                    <li><a href="{{URL('/')}}/signup">Sign up</a></li>
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
                      <!--  <ul class="menu-top-menu">--> 
                      <!--    <li><a href="{{URL('/')}}/login">Log in</a></li>--> 
                      <!--    <li><a href="{{URL('/')}}/signup">Signup</a></li>--> 
                      <!--  </ul>--> 
                      <!--</div>-->
                      @endif </div>
                  </div>
                  <div class="mini-cart"> <a href="{{URL('/')}}/cart"> <span class="cart-icon"> <span class="cart-quantity"> {{Session::has('cart') ? Session::get('cart')->abc: '0'}} </span> </span> <span class="cart-title">Your cart <br>
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
		
    <div class="owl-carousel owl-theme">
  <div class="owl-slide d-flex align-items-center cover" style="background-image: url(client/img/VEGETABLE.jpg);">
    <div class="container">
      <div class="row justify-content-center justify-content-md-start">
        <div class="col-12 col-md-12 static">
          <div class="owl-slide-text">
            <h2 class="owl-slide-animated owl-slide-title">Let food be thy medicine, and let medicine be thy food.</h2>
            <div class="owl-slide-animated owl-slide-subtitle mb-3">
              Hippocrates
            </div>
            </div>
        </div>
      </div>
    </div>
  </div><!--/owl-slide-->

  <div class="owl-slide d-flex align-items-center cover" style="background-image: url(client/img/FRUITS.jpg);">
    <div class="container">
      <div class="row justify-content-center justify-content-md-start">
        <div class="col-12 col-md-12 static">
          <div class="owl-slide-text">
            <h2 class="owl-slide-animated owl-slide-title">I digest therefore I am.</h2>
            <div class="owl-slide-animated owl-slide-subtitle mb-3">
              Sonia Salim
              </div>
            
            </div>
        </div>
      </div>
    </div>
  </div><!--/owl-slide-->

  <div class="owl-slide d-flex align-items-center cover" style="background-image: url(client/img/GRAINS.jpg);">
    <div class="container">
      <div class="row justify-content-center justify-content-md-start">
        <div class="col-12 col-md-12 static">
          <div class="owl-slide-text">
            <h2 class="owl-slide-animated owl-slide-title">After working for your food all day long, make your food work for you.</h2>
            <div class="owl-slide-animated owl-slide-subtitle mb-3">
              Sonia Salim
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!--/owl-slide-->
  
  <div class="owl-slide d-flex align-items-center cover" style="background-image: url(client/img/WHOLE.jpg);">
    <div class="container">
      <div class="row justify-content-center justify-content-md-start">
        <div class="col-12 col-md-12 static">
          <div class="owl-slide-text">
            <h2 class="owl-slide-animated owl-slide-title">Hiring a Health Coach today is an investment in your total well-being. You will reap the rewards immediately, and enjoy the health gains forever-more.</h2>
            <div class="owl-slide-animated owl-slide-subtitle mb-3">
              Sonia Salim
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!--/owl-slide-->
</div>
    
		
  <!--Feature Area Start-->
  <div class="feature-area mt-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6"> 
          <!--Single Feature Start-->
          <div class="single-feature mb-35">
            <div class="feature-icon"> <span><img src="{{URL('/')}}/client/img/certified.png" alt="icon"></span> </div>
            <div class="feature-content">
              <h3>Integrative Nutrition Health Coach</h3>
            </div>
          </div>
          <!--Single Feature End--> 
        </div>
        <div class="col-lg-4 col-md-6"> 
          <!--Single Feature Start-->
          <div class="single-feature mb-35">
            <div class="feature-icon"> <span><img src="{{URL('/')}}/client/img/bespoke.png" alt="icon"></span> </div>
            <div class="feature-content">
              <h3>Bespoke Meal plans</h3>
            </div>
          </div>
          <!--Single Feature End--> 
        </div>
        <div class="col-lg-4 col-md-6"> 
          <!--Single Feature Start-->
          <div class="single-feature mb-35">
            <div class="feature-icon"> <span><img src="{{URL('/')}}/client/img/recommendation.png" alt="icon"></span> </div>
            <div class="feature-content">
              <h3>Top recommendations for your well-being</h3>
            </div>
          </div>
          <!--Single Feature End--> 
        </div>
      </div>
    </div>
  </div>
  <!--Feature Area End-->
  
    <!--Feature Area Start-->
  <div class="feature-area mt-20">
    <div class="container">
      <div class="row">
          <div class="col-12">
          <div class="section-title text-center mb-35">
            <h3>Sign up Process</h3>
          </div>
        </div>
        <div class="col-lg-4 col-md-6"> 
          <!--Single Feature Start-->
          <div class="single-feature mb-35">
            <div class="feature-icon"> <span><img src="{{URL('/')}}/client/img/signup.png" alt="icon"></span> </div>
            <div class="feature-content">
              <h3>Click to sign up button</h3>
            </div>
          </div>
          <!--Single Feature End--> 
        </div>
        <div class="col-lg-4 col-md-6"> 
          <!--Single Feature Start-->
          <div class="single-feature mb-35">
            <div class="feature-icon"> <span><img src="{{URL('/')}}/client/img/submit.png" alt="icon"></span> </div>
            <div class="feature-content">
              <h3>Fill the relevant detail</h3>
            </div>
          </div>
          <!--Single Feature End--> 
        </div>
        <div class="col-lg-4 col-md-6"> 
          <!--Single Feature Start-->
          <div class="single-feature mb-35">
            <div class="feature-icon"> <span><img src="{{URL('/')}}/client/img/dashboard.png" alt="icon"></span> </div>
            <div class="feature-content">
              <h3>Redirect to TFP dashboard</h3>
            </div>
          </div>
          <!--Single Feature End--> 
        </div>
      </div>
    </div>
  </div>
  <!--Feature Area End-->
  <!--Feature Area Start-->
  <div class="feature-area mt-120">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="section-title text-center mb-35">
            <h3>Download the App</h3>
          </div>
        </div>
        <div class="col-lg-4 col-sm-12">
          <div class="coaching text-center"> <img src="{{URL('/')}}/client/img/IOS.png" alt="img" style="width:100%"> </div>
        </div>
        <div class="col-lg-4 col-sm-12">
          <div class="coaching text-center"> <img src="{{URL('/')}}/client/img/GOOGLE PLAY.png" alt="img" style="width:100%"> </div>
        </div>
      </div>
    </div>
  </div>
  <!--Feature Area Start--> 
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
      <div class="row testimonial-active owl-carousel owl-theme" style="margin-left:0px;">
        <div class="col-12"> 
          <!--Single Testimonial Start-->
          <div class="single-testimonial text-center">
            <div class="testimonial-content">
              <p>I had PCOS. I was addicted to sugar and noticed I had gained a significant amount of weight over the course of a year. I realised I had to do something NOW! A friend recommended Sonia Salim and told me she was a health coach rather than a nutritionist. Her plans and the factual information she told me about PCOS opens my eyes about the adverse affects of added sugar in overall health. I started to see cookies and brownies differently and completely unnecessary as an everyday treat. The whole foods I was assigned on the easy to follow plans kept me full and satisfied and eventually regulated my monthly cycle</p>
            </div>
          </div>
          <!--Single Testimonial End--> 
        </div>
        <div class="col-12"> 
          <!--Single Testimonial Start-->
          <div class="single-testimonial text-center">
            <div class="testimonial-content">
              <p>Whilst I was going through a separation with my husband of 20 years, I reached out to food to help me fill the void and avoid making a final decision. I was on an emotional journey as I had to face up to some truths that I had denied before. I became addicted to diet-sodas at work not realising how much sugar and caffeine was in them. This made my migraines more frequent. It seems that I gained 15llbs overnight. So I decided to take back control of my weight and my life. I joined a gym and contacted Sonia Salim. She gave me a diet that complimented my workouts and helped me sort out my thoughts and emotions by listening. Slowly I stopped turning to food to self-medicate. And it worked! </p>
            </div>
          </div>
          <!--Single Testimonial End--> 
        </div>
        <div class="col-12"> 
          <!--Single Testimonial Start-->
          <div class="single-testimonial text-center">
            <div class="testimonial-content">
              <p>I have metabolic syndrome. I seldom exercised and ate all day long. I didn’t know the danger of processed foods on my health until I met Sonia. She emphasised via her meal plans and one on one sessions the importance of a whole-foods based diet, and a change in detrimental habits. The recipes she gave were easy to follow, and are based on the local ingredients. She helped my pin-point the areas in my life, that could be the root cause of my over-eating. She encouraged me to start daily exercise  and now never miss my walk. I’ve managed to bring my weight down slowly but surely over the months. And my blood-glucose level is down to normal. </p>
            </div>
          </div>
          <!--Single Testimonial End--> 
        </div>
      </div>
      
      
    </div>
  </div>
  <!--Testimonial Area End--> 
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
            <p>Enter your email address if you want TFP to inform you about the latest updates for your well being.</p>
            <div class="news-letter-form text-center">
              <form action="https://thefoodpharmacy.us2.list-manage.com/subscribe/post?u=2aa4226031bb947fa089d4e4b&amp;id=37b6d02018" method="post" name="mc-embedded-subscribe-form" class="validate" novalidate>
                <div id="mc_embed_signup_scroll">
                  <div id="mc-form" class="mc-form subscribe-form" >
                    <input  name="EMAIL" id="mc-email" type="email" autocomplete="off" placeholder="Enter your email here" />
                    <button type="submit" id="mc-submit">Subscribe <i class="fa fa-chevron-right"></i></button>
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
            <div class="col-lg-4 col-md-6"> 
              <!--Single Footer Widget Start-->
              <div class="single-footer-widget mb-40">
                <div class="footer-title">
                  <h3>My Account</h3>
                </div>
                <ul class="link-widget">
                  <li><a href="{{URL('/')}}/login">Login</a></li>
                  <li><a href="{{URL('/')}}/signup">Sign up</a></li>
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
                  <li><a href="{{URL('/')}}/vendor/signup">Vendor Sign up</a></li>
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
                    <a href="mailto:thefoodpharmacyapp@gmail.com ">thefoodpharmacyapp@gmail.com </a> </p>
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
                  <p> 
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
<!--slider Js--> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> 
<!--Main Js--> 
<script src="{{url('/')}}/client/js/slider.js"></script> 
<script src="//geodata.solutions/includes/countrystatecity.js"></script>
</body>
</html>
