@extends('client.layouts.appclient')
@section('content')
    <!--Header Area End-->
    
<div id="login" class="mb-50 mt-70">
  <div class="container">

    <div id="login-row" class="row justify-content-center align-items-center">

      <div id="login-column" class="col-md-8">
        <div id="login-box" class="col-md-12 shadow-lg p-3 mb-5 bg-white rounded">
          <div class="panel panel-default pnel">

          @if($errors->any())
              <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
              @endif

            <div class="panel-heading panelhead">
              <h3 class="panel-title "> <strong>1 :</strong> YOUR EMAIL<span>{{session::get('email')}}</span> </h3>
            </div>
           
            <div class="panel-heading panelhead">
              <h3 class="panel-title"> <strong>2 :</strong> YOUR ADDRESS <span>
               
               
              {{session::get('address')}}

              </span> </h3>
            </div>
            
            <div class="panel-heading ">
              <h3 class="panel-title"> <strong>3 :</strong> ORDER SUMMERY </h3>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="table-content table-responsive">
                @if(Session::has('cart'))
                  <table class="table">
                    <thead>
                      <tr>
                        <!-- <th class="plantmore-product-remove">remove</th> -->
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
                        <!-- <td class="plantmore-product-remove"><a href="#"><i class="fa fa-times"></i></a></td> -->
                        <td class="plantmore-product-thumbnail"><a href="#"><img src="{{URL('/')}}/storage/images/{{$product['item']->thumbnail}}"  alt="" style="width: 72px; height: 72px;"></a></td>
                        <td class="plantmore-product-name"><a href="#">{{$product['item']->name}}</a></td>
                        <td class="plantmore-product-price"><span class="amount">PKR {{number_format($product['item']->price)}} 
                       @if($product['save']>0) saving -{{$product['save']}}@endif</span></td>
                        <td class="plantmore-product-quantity"> {{$product['qty']}} </td>
                       
                        <td class="product-subtotal"><span class="amount">
                        PKR {{number_format($product['price'])}}
                        <br>
                       
                        </span></td>
                      </tr>
                      
                    </tbody>
                    @endforeach
                  </table>
                </div>
              </div>
              @endif   
              <div class="col-lg-12">
            
                <div class="x_content"> <a href="{{url('/')}}/cart/guest/checkout/address/view/order/complete/order"  class="button pull-right">Next Step</a> </div>
              
              </div>
            </div>

            <div class="panel-heading panelhead">
              <h3 class="panel-title"> <strong>4 :</strong> PAYMENT </h3>
            </div>

           
          </div>


          
        </div>
      </div>


      
    </div>
  </div>
</div>
<!--Footer Area Start-->
@endsection