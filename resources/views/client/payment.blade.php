
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
              <h3 class="panel-title "> <strong>1 :</strong> YOUR EMAIL<span>{{session::get('username')}}</span> </h3>
            </div>
            @if(count($result)>0)
               @foreach($result as $results)
            <div class="panel-heading panelhead">
              <h3 class="panel-title"> <strong>2 :</strong> YOUR ADDRESS <span>
                
               {{$results->address}} 
            
            </span> </h3>
            </div>
            @endforeach
                @endif
                @if(Session::has('cart'))
            <div class="panel-heading panelhead">
            

            @foreach($products as $product)
              <h3 class="panel-title"> <strong>3 :</strong> ORDER SUMMERY <span>
             <div class="promohead"> @if(Session::has('pro'))
                <h4><span style="color:#ed6c71;"> Total:</span> PKR{{number_format(Session::get('pro'))}}</h4>
                @elseif(Session::has('promoPrice'))
                <h4 style="font-size:22px;"><span style="color:#ed6c71;">Total Price:</span> PKR{{number_format(Session::get('promoPrice'))}} </h4>
                @else
                <h4 style="font-size:22px;"><span style="color:#ed6c71;">Total Price: PKR {{number_format($totalPrice)}}</span></h4>
                @endif </div>
              </span></h3>
            </div>
            @endforeach
            @endif
            <div class="panel-heading ">
            <form method="post" action = "{{url('/')}}/cart/checkout/address/view/order/complete/order">
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