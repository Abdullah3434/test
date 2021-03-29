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
              <h3 class="panel-title "> <strong>1 :</strong> YOUR EMAIL<span>{{session::get('username')}}</span> </h3>
            </div>
            @if(count($result1)>0)
               @foreach($result1 as $results)
            <div class="panel-heading panelhead">
              <h3 class="panel-title"> <strong>2 :</strong> YOUR ADDRESS <span>
               
               {{$results->address}} , {{$results->city}} 

              </span> </h3>
            </div>
            @endforeach
                @endif
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
                       
                        <th class="plantmore-product-thumbnail">images</th>
                        <th class="cart-product-name">Product</th>
                        <th>Category</th>
                        <th class="plantmore-product-price">Unit Price</th>
                        <th class="plantmore-product-quantity">Quantity</th>
                        <th class="plantmore-product-subtotal">Total</th>
                        <th>Promo Code</th>
                      </tr>
                    </thead>
                    @foreach($products as $product) 
                    <tbody>
                      <tr>
                        <td class="plantmore-product-thumbnail"><a href="#"><img src="{{URL('/')}}/storage/images/{{$product['item']->thumbnail}}"  alt="" style="width: 72px; height: 72px;"></a></td>
                        <td class="plantmore-product-name"><a href="#">{{$product['item']->name}}</a></td>
                        <td>{{$product['sub_cat']}}</td>
                        <td class="plantmore-product-price"><span class="amount">PKR {{number_format($product['item']->price)}} 
                       @if($product['save']>0) saving -{{$product['save']}}@endif</span></td>
                        <td class="plantmore-product-quantity"> {{$product['qty']}} </td>
                     <td class="plantmore-product-price"><span class="amount">PKR {{number_format($product['price'])}}</span></td>
                        
                        <td><form method="post" action = "{{url('/')}}/cart/checkout/address/view/order/complete/order/add/promo/{{$product['item']->SKU}}/{{$product['sub_cat']}}/{{($product['price'])}}">
                    {{ csrf_field() }}
                    <div class="panel-body">
                      <input class="form-control" id="id_address_line_1" name="promo"  type="text"/>
                      <br>
                      <button type="submit" name = "submit" class="btn cnfmorder">Add Promo Code</button>
                    </div>
                  </form></td>
                        
                        
                      </tr>
                      
                    </tbody>
                    @endforeach
                  </table>
                </div>
              </div>
              @endif   
              
              
              
                <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
            <table class="table">
              <tbody>
              
              @if(Session::has('promoPrice') )
              <tr> 
              <td><h4>Your discounted price is PKR {{number_format(Session::get('promoPrice'))}}</h4></td>
              </tr>
              @endif
              <tr>
                <td style="border-top: 0px;"><h4>Sub Total</h4></td>
                <td style="border-top: 0px;"><h4>PKR {{number_format($totalPrice)}}</h4></td>
              </tr>
              @if(Session::has('pro') >0)
              <tr>
                <td style="border-top: 0px;"><h4>Net Total</h4></td>
                <td style="border-top: 0px;"><h4>PKR {{number_format(Session::get('pro'))}} </h4></td>
              </tr>
              @else
              <tr>
                <td style="border-top: 0px;"><h4>Promo Price</h4></td>
                <td style="border-top: 0px;"><h4>PKR {{number_format(Session::get('promoPrice'))}} </h4></td>
              </tr>
              @endif
                </tbody>
              
            </table>
           
          </div>
              
              
              
              <div class="col-lg-12">
              @if(count($result1)>0)
                    @foreach($result1 as $results)
                <div class="x_content"> <a href="{{url('/')}}/cart/checkout/address/view/order/confirm/{{$results->pk_id}}"  class="button pull-right">Next Step</a> </div>
              @endforeach
              @endif
              </div>
            </div>

            <div class="panel-heading panelhead">
              <h3 class="panel-title"> <strong>4 :</strong> PAYMENT </h3>
            </div>

           
          </div>


          
        </div>
      </div>


<!--    
  </div>
</div>
<!--Footer Area Start-->
@endsection