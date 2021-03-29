@extends('client.layouts.appclient')
@section('content')
<div id="login" class="mb-50 mt-70">
  <div class="container">
    <div id="login-row" class="row align-items-center">
      <div id="login-column" class="col-md-12">
      	
        <div id="login-box" class="col-md-6 shadow-lg p-3 mb-5 bg-white rounded">
        <div class="wrappers">
        @if(count($ordertracking)>0)
          <div id="login-form" class="form">
            <h3 class="text-center text-success pt-20 pb-20">Order Detail</h3>
            <div class="x_panel" style="border:0px">
                <div class="member-left-side">
                <div class="member-email clearfix" style="border-bottom:0px;"> <b>Order ID</b> <span>{{$ordertracking[0]->pk_id}}</span> </div>
                  <div class="member-email clearfix" style="border-bottom:0px;"> <b>Customer Name</b> <span> {{$ordertracking[0]->fname}}{{$ordertracking[0]->lname}}</span> </div>
                  <div class="member-email clearfix"> <b>Total Price</b> <span>PKR {{$ordertracking[0]->amount}}</span> </div>
                  <!-- <div class="member-email clearfix"> <b>Promo Price</b> <span>321$</span> </div> -->
                  <div class="member-email clearfix"> <b>Payment Method</b> <span>Card</span> </div>
                  <div class="member-email clearfix"> <b>Status</b> <span>Delivered</span> </div>
                  <div class="member-email clearfix"> <b>Phone No</b> <span>{{$ordertracking[0]->phone}}</span> </div>
                  <div class="member-email clearfix"> <b>Shipment Address </b> <span>{{$ordertracking[0]->address}}</span> </div>
                </div>
                @endif
            </div>
          </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
<div id="login" class="mb-50 mt-70">
  <div class="container">
    <div id="login-row" class="row align-items-center">
      <div id="login-column" class="col-md-12">
      	
        <div id="login-box" class="col-md-6 shadow-lg p-3 mb-5 bg-white rounded">
        <div class="wishlist-area mb-110 mt-70">
		    <div class="container">
            
		        <div class="row">
		            <div class="col-12">
		                    <div class="table-content table-responsive">
		                        <table class="table">
		                            <thead>
                                
		                                <tr>
		                                    <th class="plantmore-product-thumbnail">images</th>
		                                    <th class="cart-product-name">Product</th>
		                                    <th class="cart-product-name">SKU</th>
		                                    <th class="cart-product-name">Discount Price</th>
                                        <th class="cart-product-name">Discount</th>
                                        <th class="cart-product-name">QTY</th>
                                        <th class="plantmore-product-price">Total Price</th>                                             
                                        
                                            <!-- <th class="cart-product-name">Size</th> -->
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <tr>
                                    @if(count($orderdetail)>0)
                    @foreach($orderdetail as $results)
		                                    <td class="plantmore-product-thumbnail"><a href="#"><img src="img/product-thumb/product1.jpg" alt=""></a></td>
		                                    <td class="plantmore-product-name"><a href="#">{{$results->product_name}}</a></td>
                                            <td class="plantmore-product-name">{{$results->SKU}}</td>
		                                    <td class="plantmore-product-price"><span class="amount">{{$results->discount_price}}</span></td>
                                            <td class="plantmore-product-name">{{$results->percentage}}%</td>
                                            <td class="plantmore-product-name">{{$results->quantity}}</td>
                                            <td class="plantmore-product-price"><span class="amount">{{$results->price}}</span></td>
                                            
                                            <!-- <td class="plantmore-product-name">45</td> -->
		                                    
                                    </tr>
                                    @endforeach
                    @endif
                    
		                            </tbody>
		                        </table>
		                    </div>
		            </div>
		        </div>
		    </div>
		</div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer Area Start-->
@endsection