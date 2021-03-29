
 @extends('client.layouts.appclient')
@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-12">
              <div class="alert alert-info">
  <strong></strong>Physical coaching not available for now due to current pandemic. Thank you.
</div>
          </div>
      </div>
    <div class="row justify-content-center">
      <div class="col-md-2 col-sm-12 col-xs-12">
        <div class="feature-content text-center">
          <h3>Live Coaching</h3>
        </div>
        <div class="packge">
        
        <img src="{{url('client/img/1.png')}}" alt="img">
          <div>
            <div class="member-left-side">
              <div class="member-email clearfix" style="border-bottom:0px;"> <b>Price/Session</b> <span style="color:black;">PKR 5,000</span> </div>
              
              <div class="member-email clearfix" style="border-bottom:0px;"> <b>Price / 4 Session</b> <span style="color:black;">PKR 20,000</span> </div>
              <div class="member-email clearfix" style="border-bottom:0px;"> <b>Price / 5 Session</b> <span style="color:black;">PKR 25,000</span> </div>
              <div class="member-email clearfix"> <b>Duration</b> <span style="color:black;">60 Minute</span> </div>
            </div>
          </div>
        </div>
        <div class="arrow-right d-none d-sm-block"></div>
        <form  class="form-horizontal" method="POST" action="{{route('guest.bank.slipp') }}">
          <input type="hidden" name="package" value="Live Coaching">
          <input type="hidden" name="price" value="5000">
          @csrf
        <div class="text-center mt-10 mb-20"><input class="btn-coaching text-center" type="submit" value="Submit"></div>
        </form>
      </div>
      <div class="col-md-2 col-sm-12 col-xs-12">
        <div class="feature-content text-center">
          <h3>Physical Coaching</h3>
        </div>
        <div class="packge">
         <img src="{{url('client/img/2.png')}}" alt="img">
          <div>
            <div class="member-left-side">
              <div class="member-email clearfix" style="border-bottom:0px;"> <b>Price/Session</b> <span style="color:black;">PKR 5,000</span> </div>
              
              <div class="member-email clearfix" style="border-bottom:0px;"> <b>Price / 4 Session</b> <span style="color:black;">PKR 20,000</span> </div>
              <div class="member-email clearfix" style="border-bottom:0px;"> <b>Price / 5 Session</b> <span style="color:black;">PKR 25,000</span> </div>
              <div class="member-email clearfix"> <b>Duration</b> <span style="color:black;">60 Minute</span> </div>
            </div>
          </div>
        </div>
        <div class="arrow-right d-none d-sm-block"></div>
        <form  class="form-horizontal" method="POST" action="{{route('guest.bank.slipp') }}">
          <input type="hidden" name="package" value="Physical Coaching">
          <input type="hidden" name="price" value="5000">
          @csrf
        <div class="text-center mt-10 mb-20"><input class="btn-coaching text-center" type="submit" value="Submit" disabled> <!-- <button type="submit" class="btn-coaching text-center">Submit</button> --> </div>
        </form>
        
      </div>
    </div>
  </div>
  
  @endsection