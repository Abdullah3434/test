@extends('client.layouts.appclient')
@section('content') 
<!--Error 404 Area Start-->
<div class="error-404-area mt-70 mb-50">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="error-wrapper text-center">
          <div class="error-text">
            <h2 class="text-success">Thank You</h2>
            @if(count($result)>0)
  <p class="lead"><strong>{{$result[0]->pk_id}}</strong> is your tracking ID.</p>
  @endif
  <hr>
  
  
  	@if(Session::has('username'))
  
  
  
  <div class="error-button"> <a href="{{URL('/')}}/order/tracking/view">Track Your Order</a> </div>
  @else
                    <div class="error-button"><a href="{{url('/')}}/guest/order/tracking/view"> Track Your Order </a> </div>
                        @endif
  <p>
    Having trouble? <a href="{{url('/')}}/contact/us">Contact us</a>
  </p>
            <h3>Please check your email for further instructions on how to complete your account setup.</h3>
            <hr>
            <p>Having trouble? <a href="contact.html">Contact us</a></p>
          </div>
          <div class="error-button"> <a href="index.html">Back to home page</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Error 404 Area End--> 
@endsection