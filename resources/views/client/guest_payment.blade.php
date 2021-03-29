
  @extends('client.layouts.appclient')
@section('content')  
  <!--Header Area End-->
  <br>
<div id="login" class="mb-50 mt-70">
  <div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
      <div id="login-column" class="col-md-8">
        <div id="login-box" class="col-md-12 shadow-lg p-3 mb-5 bg-white rounded">
          <div class="panel panel-default pnel">
            <div class="panel-heading panelhead">
              <h3 class="panel-title "> <strong>1 :</strong> YOUR EMAIL<span>{{session::get('email')}}</span> </h3>
            </div>
           
            <div class="panel-heading panelhead">
              <h3 class="panel-title"> <strong>2 :</strong> YOUR ADDRESS <span>
                
              {{session::get('address')}}
            
            </span> </h3>
            </div>
          
                @if(Session::has('cart'))
            <div class="panel-heading panelhead">
            

            @foreach($products as $product)
              <h3 class="panel-title"> <strong>3 :</strong> ORDER SUMMERY <span>
             
              Total Amount: PKR {{number_format($product['price'])}}
             
              </span></h3>
            </div>
            @endforeach
            @endif
            <div class="panel-heading ">
            <form method="post" action = "{{url('/')}}/cart/guest/checkout/address/view/order/complete/order">
    {{ csrf_field() }}

     				@if($errors->any())
<div class="alert alert-danger">{{$errors->first()}}</div>
@endif
              <h3 class="panel-title"> <strong>4 :</strong> PAYMENT </h3><br>
              <button class="panel-title"> Confirm Order  </button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer Area Start-->
@endsection