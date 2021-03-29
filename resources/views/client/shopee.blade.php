@extends('client.layouts.appclient')
@section('content')
		<!--Header Area End-->
        <!--Shop Area Start-->
        <br> <br> <br> <br> <br>
		<div class="shop-area mb-70">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-3 order-2 order-lg-1">
                        <!--Product Category Widget Start-->
                        
                        @php
          
          $main_category = DB::select( DB::raw("SELECT DISTINCT main_category from product WHERE status = :value and (v_product_status = :value2 or v_product_status = :value3)"), array(
       'value' => '1',
       'value2' => '0',
       'value3' => '2',
       ));

      @endphp
                 
		                <div class="shop-sidebar">
		                    <h4>Product Categories</h4>
		                    <div class="categori-checkbox">
		                        <form action="#">
		                            <ul>
                                    @if(count($main_category)>0)
       @foreach($main_category as $results)

		                                <li><input name="product-categori" type="checkbox"><a href="#">{{$results->main_category}}</a><span class="count"></span></li>
                                        @endforeach
                @endif   
                                    </ul>
                                   
		                        </form>
		                    </div>
		                </div>
		                <!--Product Category Widget End-->
		                <!--Color Category Widget Start-->
		                <div class="shop-sidebar">
		                    <h4>Color</h4>
		                    <div class="categori-checkbox">
		                        <form action="#">
		                            <ul>
		                                <li><input name="product-categori" type="checkbox"><a href="#">Gold</a><span class="count">(1)</span></li>
		                                <li><input name="product-categori" type="checkbox"><a href="#">Green</a><span class="count">(4)</span></li>
		                                <li><input name="product-categori" type="checkbox"><a href="#">White</a><span class="count">(5)</span></li>
		                            </ul>
		                        </form>
		                    </div>
		                </div>
		                <!--Color Category Widget End-->
		                <!--Price Filter Widget Start-->
		                <div class="shop-sidebar">
		                    <h4>Filter by price</h4>
		                    <div class="price-filter">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <div class="label-input">
                                        <label>price : </label>
                                        <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                    </div>
                                    <button type="button">Filter</button> 
                                </div>
                            </div>
		                </div>
		                <!--Price Filter Widget End-->
		                <!--Recent Product Widget Start-->
		                <div class="shop-sidebar">
		                    <h4>Top Rated Products</h4>
		                    <div class="rc-product">
		                        <ul>
		                            <li>    
		                                <div class="rc-product-thumb img-full">
		                                    <a href="single-product.html"><img src="{{URL('/')}}/client/img/product/product13.jpg" alt=""></a>
		                                </div>
		                                <div class="rc-product-content">
		                                    <h6><a href="single-product.html">Ornare sed consequat</a></h6>
		                                    <div class="rc-product-review">
		                                        <i class="fa fa-star"></i>
		                                        <i class="fa fa-star"></i>
		                                        <i class="fa fa-star"></i>
		                                        <i class="fa fa-star"></i>
		                                        <i class="fa fa-star"></i>
		                                    </div>
		                                    <div class="rc-product-price">
                                                <span class="price">$66.00</span>
                                            </div>
		                                </div>
		                            </li>
		                            <li>   
		                                <div class="rc-product-thumb img-full">
		                                    <a href="single-product.html"><img src="{{URL('/')}}/client/img/product/product12.jpg" alt=""></a>
		                                </div>
		                                <div class="rc-product-content">
		                                    <h6><a href="single-product.html">Condimentum posuere</a></h6>
		                                    <div class="rc-product-review">
		                                        <i class="fa fa-star"></i>
		                                        <i class="fa fa-star"></i>
		                                        <i class="fa fa-star"></i>
		                                        <i class="fa fa-star"></i>
		                                        <i class="fa fa-star"></i>
		                                    </div>
		                                    <div class="rc-product-price">
                                                <span class="price">$72.00</span>
                                            </div>
		                                </div>
		                            </li>
		                            <li>
		                                <div class="rc-product-thumb img-full">
		                                    <a href="single-product.html"><img src="{{URL('/')}}/client/img/product/product12.jpg" alt=""></a>
		                                </div>
		                                <div class="rc-product-content">
		                                    <h6><a href="single-product.html">Condimentum posuere</a></h6>
		                                    <div class="rc-product-review">
		                                        <i class="fa fa-star"></i>
		                                        <i class="fa fa-star"></i>
		                                        <i class="fa fa-star"></i>
		                                        <i class="fa fa-star"></i>
		                                        <i class="fa fa-star"></i>
		                                    </div>
		                                    <div class="rc-product-price">
                                                <span class="price">$72.00</span>
                                            </div>
		                                </div>
		                            </li>
		                        </ul>
		                    </div>
		                </div>
		                <!--Recent Product Widget End-->
		                <!--Banner Widget Start-->
		                <div class="shop-sidebar">
                            <div class="sidebar-banner single-banner">
		                        <div class="banner-img">   
		                            <a href="#"><img src="{{URL('/')}}/client/img/banner/shop-sidebar.jpg" alt=""></a>
		                        </div>
		                    </div>
		                </div>
		                <!--Banner Widget End-->
		                <!--Product Tags Widget Start-->
		                <div class="shop-sidebar">
		                    <h4>Product Tags</h4>
		                    <div class="product-tag">
		                        <ul>
		                            <li><a href="#">blouse</a></li>
		                            <li><a href="#">clothes</a></li>
		                            <li><a href="#">fashion</a></li>
		                            <li><a href="#">handbag</a></li>
		                            <li><a href="#">laptop</a></li>
		                        </ul>
		                    </div>
		                </div>
		                <!--Product Tags Widget End-->
		            </div>
		            <div class="col-lg-9 order-1 order-lg-2">
		                <div class="shop-layout">
                           <!--Breadcrumb One Start-->
                          
                            <div class="breadcrumb-one mb-120">
                                <div class="breadcrumb-img">  
                                    <img src="{{URL('/')}}/client/img/page-banner/shop-banner-1.jpg" alt="">
                                </div>
                                <div class="breadcrumb-content">
                                    <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li class="active">Shop</li>
                                    </ul>
                                </div>
                            </div>
                           <!--Breadcrumb One End-->
		                    <!--Grid & List View Start-->
		                    <div class="shop-topbar-wrapper d-md-flex justify-content-md-between align-items-center">
		                        <div class="grid-list-option">
		                             <ul class="nav">
                                      <li>
                                        <a class="active" data-toggle="tab" href="#grid"><i class="fa fa-th-large"></i></a>
                                      </li>
                                      <li>
                                        <a data-toggle="tab" href="#list"><i class="fa fa-th-list"></i></a>
                                      </li>
                                    </ul>
		                         </div>
		                         <!--Toolbar Short Area Start-->
		                         <div class="toolbar-short-area d-md-flex align-items-center">
                                     <div class="toolbar-shorter ">
                                        <label>Sort By:</label>
                                         <select class="wide">
                                             <option data-display="Select">Nothing</option>
                                             <option value="Relevance">Relevance</option>
                                             <option value="Name, A to Z">Name, A to Z</option>
                                             <option value="Name, Z to A">Name, Z to A</option>
                                             <option value="Price, low to high">Price, low to high</option>
                                             <option value="Price, high to low">Price, high to low</option>
                                         </select>
                                     </div>
                                     <p class="show-product">Showing 1–9 of 42 results</p>
                                 </div>
		                         <!--Toolbar Short Area End-->
		                    </div>
		                    <!--Grid & List View End-->
		                    <!--Shop Product Start-->
		                    <div class="shop-product">
		                        <div id="myTabContent-2" class="tab-content">
		                            <div id="grid" class="tab-pane fade show active">
                                   
		                                <div class="product-grid-view">
                                        
		                                    <div class="row">
											
											
		                                        <div class="col-md-3">

												@if(count($result)>0)
                                              @foreach($result as $results)
		                                            <!--Single Product Start-->
                                                    <div class="single-product mb-25">
                                                    
                                                        <div class="product-img img-full">
                                                       
                                                            <a href="single-product.html"> 
                                                                <img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt="">
                                                            </a>
                                                            <span class="onsale">Sale!</span>
                                                            <div class="product-action">
                                                                <ul>
                                                                    <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                                    <li><a href="#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                                                    <li><a href="#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h2><a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->SKU}}">{{$results->name}}</a></h2>
                                                            <div class="product-price">
                                                                <div class="price-box">
                                                                    <span class="regular-price">PKR {{number_format($results->price)}}</span>
                                                                </div>
                                                                <div class="add-to-cart">
                                                                    <a href="#">Add To Cart</a>
                                                                </div>
                                                            </div>

                                                           
														   
        
                                                        
                                </div>
								 
									   @endforeach  
									   @endif          
                                                    </div>

                                                    <!--Single Product End-->
                                                   

                                                </div>
                                               
                                                <!--Single List Product End-->
                                               
                                                </div>
                                               
                                            </div>
                                           
		                                    <!-- <div class="product-list-item mb-40"> -->
		                                        <!-- <div class="row"> -->
		                                            <!--Single List Product Start-->
		                                           
		                                            <!--Single List Product End-->
		                                        <!-- </div> -->
		                                    <!-- </div> -->
                                                 <!--Single List Product End-->
                                                

                                                </div>
                                               
                                            </div>
                                           
		                                </div>
                                    
                                                           
		                            <!--Pagination Start-->
		                            <div class="product-pagination">
		                                <ul>
		                                    <li class="active"><a href="#">1</a></li>
		                                    <li><a href="#">2</a></li>
		                                    <li><a href="#">3</a></li>
		                                    <li><a href="#">4</a></li>
		                                    <li><a href="#">5</a></li>
		                                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
		                                </ul>
		                            </div>
		                            <!--Pagination End-->
		                        </div>
		                    </div>
		                    <!--Shop Product End-->
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!--Shop Area End-->
		<!--Brand Area Start-->
		<div class="brand-area mb-105">
		    <div class="container">
		        <div class="row">
		            <div class="col-12">
		                <div class="brand-active">
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                      <a href="#"><img src="img/brand/brand1.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                      <a href="#"><img src="img/brand/brand2.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                      <a href="#"><img src="img/brand/brand3.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                      <a href="#"><img src="img/brand/brand4.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                      <a href="#"><img src="img/brand/brand5.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                      <a href="#"><img src="img/brand/brand3.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                      <a href="#"><img src="img/brand/brand4.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                      <a href="#"><img src="img/brand/brand5.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!--Brand Area End-->
		<!--Footer Area Start-->
		@endsection