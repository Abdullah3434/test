@extends('client.layouts.appclient')
@section('content')
		<!--Header Area End-->
		<!--Breadcrumb Tow Start-->

		<div class="breadcrumb-tow mb-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-title">
                            <h1>Shopping Cart</h1>
                        </div>
                        <div class="breadcrumb-content breadcrumb-content-tow">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li class="active">Shopping Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!--Breadcrumb Tow End-->
		<!--Shopping Cart Area Strat-->
		<div class="Shopping-cart-area mb-110">
		@if(Session::has('cart'))
		    <div class="container">
		        <div class="row">
		            <div class="col-12">
		                <form action="#">
		                    <div class="table-content table-responsive">
		                        <table class="table">
		                            <thead>
		                                <tr>
		                                    <th class="plantmore-product-remove">remove</th>
		                                    <th class="plantmore-product-thumbnail">images</th>
		                                    <th class="cart-product-name">Product</th>
		                                    <th class="plantmore-product-price">Unit Price</th>
		                                    <th class="plantmore-product-quantity">Quantity</th>
		                                    <th class="plantmore-product-subtotal">Total</th>
		                                </tr>
									</thead>
									@foreach($products as $product) 
		                            <tbody>
		                                <tr>
		                                    <td class="plantmore-product-remove"><a href="{{URL('/')}}/remove/item/cart/{{$product['item']->pk_id}}/{{$product['qty']}}"><i class="fa fa-times"></i></a></td>
		                                    <td class="plantmore-product-thumbnail"><a href="#"><img src="{{URL('/')}}/storage/images/{{$product['item']->thumbnail}}" style="width: 72px; height: 72px;" alt=""></a></td>
		                                    <td class="plantmore-product-name"><a href="#">{{$product['item']->name}}</a></td>
		                                    <td class="plantmore-product-price"><span class="amount">PKR {{number_format($product['item']->price)}}

											@if($product['save']>0) saving -{{$product['save']}}@endif
											</span></td>
		                                    <td class="plantmore-product-quantity">
		                                        <input value="{{$product['qty']}}" type="number">
		                                    </td>
		                                    <td class="product-subtotal"><span class="amount">PKR {{number_format($product['price'])}}</span></td>
		                                </tr>
		                                
									</tbody>
									@endforeach
		                        </table>
		                    </div>
		                    <div class="row">
		                        <div class="col-12">
		                            <div class="coupon-all">
		                                <!-- <div class="coupon">
		                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
		                                    <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
		                                </div> -->
		                                <!-- <div class="coupon2">
		                                    <input class="button" name="update_cart" value="Update cart" type="submit">
		                                </div> -->
		                            </div>
		                        </div>
		                    </div>
		                    <div class="row">
		                        <div class="col-md-5 ml-auto">
		                            <div class="cart-page-total">
		                                <h2>Cart totals</h2>
		                                <ul>
		                                    <li>Subtotal <span>PKR {{number_format($totalPrice)}}</span></li>
		                                    <li>Total <span>PKR {{number_format($totalPrice)}}</span></li>
										</ul>
										@if(Session::has('username'))
										<a href="{{url('/')}}/cart/checkout">Proceed to checkout</a>
                        @else
                           <a href="{{url('/')}}/cart/guest/checkout">  
                            Proceed To Checkout
                       </a>
                        @endif
		                            </div>
		                        </div>
		                    </div>
		                </form>
		            </div>
		        </div>
		    </div>
		</div>
		@endif
		<!--Shopping Cart Area End-->
	
		<!--Brand Area End-->
		<!--Footer Area Start-->
		@endsection