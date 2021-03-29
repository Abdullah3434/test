
@extends('client.layouts.appclient')
@section('content')

<div class="checkout-area mb-80 mt-70">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-6">


      @if(Session::has('message'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ Session::get('message') }}</strong>
      </div>  
    @endif

        
       <!-- Calendly inline widget begin -->
<div class="calendly-inline-widget" data-url="https://calendly.com/abdullahfarooqi/diet" style="min-width:320px;height:630px;"></div>
<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script>
<!-- Calendly inline widget end -->
        

      </div>
    </div>
  </div>
</div>

@endsection