@extends('client.layouts.appclient')
@section('content') 
<!--Breadcrumb One Start-->

<div class="breadcrumb-one mb-20">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-img"> <img src="{{URL('/')}}/client/img/page-banner/product-banner.jpg" alt=""> </div>
        <div class="breadcrumb-content">
          <ul>
            <li><a href="{{URL('/')}}/">Home</a></li>
            <li><a href="{{URL('/')}}/">Category</a></li>
            <li><a href="{{URL('/')}}/">Sub Category</a></li>
            <li class="active">Product Type</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Breadcrumb One End--> 
<!--Single Product Area Start-->

<div class="single-product-area mb-115">
<div class="container"> @if(Session::has('message'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ Session::get('message') }}</strong> </div>
  @endif
  <div class="row">
    <div class="col-md-12 col-lg-5">
      <div class="product-details-img-tab"> 
        <!--Product Tab Content Start-->
        <div class="tab-content single-product-img">
          <div class="tab-pane fade show active" id="product1">
            <div class="product-large-thumb img-full">
              <div class="easyzoom easyzoom--overlay"> <a href="{{URL('/')}}/storage/images/{{$result[0]->thumbnail}}"> <img src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail}}" alt=""> </a> <a href="{{URL('/')}}/storage/images/{{$result[0]->thumbnail}}" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-search"></i></a> </div>
            </div>
          </div>
          <div class="tab-pane fade" id="product2">
            <div class="product-large-thumb img-full">
              <div class="easyzoom easyzoom--overlay"> <a href="{{URL('/')}}/storage/images/{{$result[0]->thumbnail2}}"> <img src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail2}}" alt=""> </a> <a href="{{URL('/')}}/storage/images/{{$result[0]->thumbnail2}}" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-search"></i></a> </div>
            </div>
          </div>
          <div class="tab-pane fade" id="product3">
            <div class="product-large-thumb img-full">
              <div class="easyzoom easyzoom--overlay"> <a href="{{URL('/')}}/storage/images/{{$result[0]->thumbnail3}}"> <img href="{{URL('/')}}/storage/images/{{$result[0]->thumbnail3}}" alt=""> </a> <a href="{{URL('/')}}/storage/images/{{$result[0]->thumbnail3}}" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-search"></i></a> </div>
            </div>
          </div>
        </div>
        <!--Product Tab Content End--> 
        <!--Product Tab Menu Start-->
        <div class="product-menu">
          <div class="nav product-tab-menu">
            <div class="product-details-img"> <a class="active" data-toggle="tab" href="#product1"><img src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail}}" alt=""></a> </div>
            <div class="product-details-img"> <a data-toggle="tab" href="#product2"><img src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail2}}" alt=""></a> </div>
            <div class="product-details-img"> <a data-toggle="tab" href="#product3"><img src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail3}}" alt=""></a> </div>
          </div>
        </div>
        <!--Product Tab Menu End--> 
      </div>
    </div>
    <div class="col-md-12 col-lg-7"> 
      <!--Product Details Content Start-->
      <div class="product-details-content">
        <h2 class="green">{{$result[0]->name}}</h2>
        <div class="single-product-reviews"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <a class="review-link" href="#">255 Reviews</a> </div>
        
         <div class="row">
              <div class="col-md-12"> @if(count($d)>0)
                    <div class="price">PKR {{number_format($discount_price)}} <span style="display: initial;font-size:14px;">PKR {{number_format($d[0]->price)}} </span></div>
                
                @else
                @if(count($result)>0)
                <h3 style="float:left;">PKR {{number_format($result[0]->price)}}</h3>
                @endif
                @endif </div>
            </div>
        
        <div class="product-description">
          <p>{{$result[0]->description}}</p>
        </div>
        <p class="stock in-stock">{{$qty[0]->quantity}} in Stock</p>
        <div class="single-product-quantity">
          <form method="post" action = "{{url('/')}}/product/add/cart/{{$result[0]->pk_id}}">
            {{ csrf_field() }}
            
            @if($errors->any())
            <div class="alert alert-danger">{{$errors->first()}}</div>
            @endif
            <div class="product-quantity">
              <input value="1" type="number" name="quantity">
            </div>
            <div class="add-to-link">
              <button class="product-btn" data-text="add to cart" formaction="{{URL('/')}}/product/buy/now/{{$result[0]->pk_id}}">add to cart</button>
            </div>
          </form>
        </div>
        <div class="wishlist-compare-btn">
          <form method="post" action = "{{url('/')}}/product/add/wishlist/{{$result[0]->pk_id}}">
            {{ csrf_field() }}
            
            @if($errors->any())
            <div class="alert alert-danger">{{$errors->first()}}</div>
            @endif
            <button type="submit" class="product-btn">add to wishlist</button>
          </form>
        </div>
        <!--Product Details Content End--> 
      </div>
    </div>
  </div>
</div>
<!--Single Product Area End--> 
<!--Related Product Start-->
<div class="Related-product mt-105 mb-100">
  <div class="container">
    <div class="row"> 
      <!--Section Title Start-->
      <div class="col-12">
        <div class="section-title text-center mb-35">
          <h3>Related products</h3>
        </div>
      </div>
      <!--Section Title End--> 
    </div>
    <div class="row">
      <div class="product-slider-active">
        <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12"> 
          <!--Single Product Start-->
          <div class="single-product mb-25">
            <div class="product-img img-full"> <a href="single-product.html"> <img src="img/product/product7.jpg" alt=""> </a>
              <div class="product-action">
                <ul>
                  <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                  <li><a href="#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                  <li><a href="#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="product-content">
              <h2><a href="single-product.html">Vulputate justo</a></h2>
              <div class="product-price">
                <div class="price-box"> <span class="regular-price">$70.00</span> </div>
                <div class="add-to-cart"> <a href="#">Add To Cart</a> </div>
              </div>
            </div>
          </div>
          <!--Single Product End--> 
        </div>
        <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12"> 
          <!--Single Product Start-->
          <div class="single-product mb-25">
            <div class="product-img img-full"> <a href="single-product.html"> <img src="img/product/product9.jpg" alt=""> </a>
              <div class="product-action">
                <ul>
                  <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                  <li><a href="#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                  <li><a href="#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="product-content">
              <h2><a href="single-product.html">Ipsum imperdie</a></h2>
              <div class="product-price">
                <div class="price-box"> <span class="regular-price">$100.00</span> </div>
                <div class="add-to-cart"> <a href="#">Add To Cart</a> </div>
              </div>
            </div>
          </div>
          <!--Single Product End--> 
        </div>
        <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12"> 
          <!--Single Product Start-->
          <div class="single-product mb-25">
            <div class="product-img img-full"> <a href="single-product.html"> <img src="img/product/product11.jpg" alt=""> </a>
              <div class="product-action">
                <ul>
                  <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                  <li><a href="#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                  <li><a href="#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="product-content">
              <h2><a href="single-product.html">Pellentesque position</a></h2>
              <div class="product-price">
                <div class="price-box"> <span class="regular-price">$90.00</span> </div>
                <div class="add-to-cart"> <a href="#">Add To Cart</a> </div>
              </div>
            </div>
          </div>
          <!--Single Product End--> 
        </div>
        <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12"> 
          <!--Single Product Start-->
          <div class="single-product mb-25">
            <div class="product-img img-full"> <a href="single-product.html"> <img src="img/product/product1.jpg" alt=""> </a>
              <div class="product-action">
                <ul>
                  <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                  <li><a href="#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                  <li><a href="#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="product-content">
              <h2><a href="single-product.html">Eleifend quam</a></h2>
              <div class="product-price">
                <div class="price-box"> <span class="regular-price">$115.00</span> </div>
                <div class="add-to-cart"> <a href="#">Add To Cart</a> </div>
              </div>
            </div>
          </div>
          <!--Single Product End--> 
        </div>
        <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12"> 
          <!--Single Product Start-->
          <div class="single-product mb-25">
            <div class="product-img img-full"> <a href="single-product.html"> <img src="img/product/product3.jpg" alt=""> </a>
              <div class="product-action">
                <ul>
                  <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                  <li><a href="#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                  <li><a href="#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="product-content">
              <h2><a href="single-product.html">Nulla sed stg</a></h2>
              <div class="product-price">
                <div class="price-box"> <span class="regular-price">$40.00</span> </div>
                <div class="add-to-cart"> <a href="#">Add To Cart</a> </div>
              </div>
            </div>
          </div>
          <!--Single Product End--> 
        </div>
        <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12"> 
          <!--Single Product Start-->
          <div class="single-product mb-25">
            <div class="product-img img-full"> <a href="single-product.html"> <img src="img/product/product5.jpg" alt=""> </a>
              <div class="product-action">
                <ul>
                  <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                  <li><a href="#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                  <li><a href="#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="product-content">
              <h2><a href="single-product.html">Odio tortor consequat</a></h2>
              <div class="product-price">
                <div class="price-box"> <span class="regular-price">$90.00</span> </div>
                <div class="add-to-cart"> <a href="#">Add To Cart</a> </div>
              </div>
            </div>
          </div>
          <!--Single Product End--> 
        </div>
      </div>
    </div>
  </div>
</div>
<!--Related Product End--> 

<!--Product Description Review Area Start-->
<div class="product-description-review-area mb-100">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="product-review-tab"> 
          <!--Review And Description Tab Menu Start-->
          <ul class="nav dec-and-review-menu">
            <li> <a class="active"  data-toggle="tab" href="#reviews">Reviews</a> </li>
          </ul>
          <!--Review And Description Tab Menu End--> 
          <!--Review And Description Tab Content Start-->
          <div class="tab-content product-review-content-tab" id="myTabContent-4">
            <div class="tab-pane fade active show" id="reviews">
              <div class="review-page-comment">
                <h2>1 review for Sit voluptatem</h2>
                <ul>
                  <li>
                    <div class="product-comment"> <img src="img/icon/author.png" alt="">
                      <div class="product-comment-content">
                        <div class="product-reviews"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                        <p class="meta"> <strong>admin</strong> - <span>November 22, 2016</span>
                        <div class="description">
                          <p>Good Product</p>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
                <div class="review-form-wrapper">
                  <div class="review-form">
                  <h2>Add Review</h2>
                    <form action="#">
                      <div class="comment-form-rating">
                        <h3>Your rating</h3>
                        <fieldset class="rating" >
                  <input type="radio" id="star5" name="rating" value="5" />
                  <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                  <input type="radio" id="star4" name="rating" value="4" />
                  <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                  <input type="radio" id="star3" name="rating" value="3" />
                  <label class = "full" for="star3" title="Meh - 3 stars"></label>
                  <input type="radio" id="star2" name="rating" value="2" />
                  <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                  <input type="radio" id="star1" name="rating" value="1" required/>
                  <label class = "full" for="star1" title="Sucks big time - 1 star" ></label>
                </fieldset>
                      </div>
                      <div class="clearfix"></div>
                      <div class="input-element">
                        <div class="comment-form-comment">
                          <label>Comment</label>
                          <textarea name="message" cols="40" rows="8"></textarea>
                        </div>
                        <div class="review-comment-form-author">
                          <label>Name </label>
                          <input required="required" type="text">
                        </div>
                        <div class="review-comment-form-email">
                          <label>Email </label>
                          <input required="required" type="text">
                        </div>
                        <div class="comment-submit">
                          <button type="submit" class="form-button">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Review And Description Tab Content End--> 
        </div>
      </div>
    </div>
  </div>
</div>
<!--Product Description Review Area Start--> 
@endsection