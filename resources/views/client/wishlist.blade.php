
		 @extends('client.layouts.appclient')
		 @section('content')  
		<!--Breadcrumb Tow Start-->
		<div class="breadcrumb-tow mb-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-title">
                            <h1>Wishlist</h1>
                        </div>
                        <div class="breadcrumb-content breadcrumb-content-tow">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li class="active">Wishlist</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!--Breadcrumb Tow End-->
		<!--Wishlist Area Strat-->
		<div class="wishlist-area mb-110">
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
		                                    <th class="plantmore-product-stock-status">Stock Status</th>
		                                    <th class="plantmore-product-add-cart">add to cart</th>
		                                </tr>
		                            </thead>
		                            <tbody>
									@if(count($result)>0)
              @foreach($result as $results)
		                                <tr>
		                                    <td class="plantmore-product-remove"><a href="{{URL('/')}}/delete/wishlist/{{$results->pk_id}}"><i class="fa fa-times"></i></a></td>
		                                    <td class="plantmore-product-thumbnail"><a href="#"><img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}"  alt=""></a></td>
		                                    <td class="plantmore-product-name"><a href="#">{{$results->name}}</a></td>
		                                    <td class="plantmore-product-price"><span class="amount">{{$results->price}}</span></td>
											<td class="plantmore-product-stock-status"><span class="in-stock">in stock</span></td>
											
		                                    <td class="plantmore-product-add-cart"><a  href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->SKU}}">add to cart</a></td>
		                                </tr>
		                                @endforeach

            @endif
		                            </tbody>
		                        </table>
		                    </div>
		                </form>
		            </div>
		        </div>
		    </div>
		</div>
		<!--Wishlist Area End-->
		<!--Brand Area Start-->
		<div class="brand-area mb-105">
		    <div class="container">
		        <div class="row">
		            <div class="col-12">
		                <div class="brand-active">
		                    <!--Single Brand Start--> 
		                    <div class="single-brand img-full">
		                      <a href="#"><img src="{{url('/')}}/client/img//brand/brand1.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                      <a href="#"><img src="{{url('/')}}/client/img//brand/brand2.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                      <a href="#"><img src="{{url('/')}}/client/img//brand/brand3.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                      <a href="#"><img src="{{url('/')}}/client/img//brand/brand4.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                      <a href="#"><img src="{{url('/')}}/client/img//brand/brand5.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                      <a href="#"><img src="{{url('/')}}/client/img//brand/brand3.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                      <a href="#"><img src="{{url('/')}}/client/img//brand/brand4.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                      <a href="#"><img src="{{url('/')}}/client/img//brand/brand1.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!--Brand Area End-->
		@endsection