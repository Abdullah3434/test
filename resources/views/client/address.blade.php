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
              <h3 class="panel-title "> <strong>1 :</strong> YOUR EMAIL<span> {{Session::get('username')}} </span> </h3>
            </div>
            <div class="panel-heading">
              <h3 class="panel-title"> <strong>2 :</strong> YOUR ADDRESS </h3>
            </div>
            <div class="row">
                @if(count($result1)>0)
                @foreach($result1 as $results)
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="member-left-side">
                      <div class="member-email clearfix"> <b>Name</b> <span>{{$results->fname}} {{$results->lname}}</span> </div>
                      <div class="member-email clearfix"> <b>Address</b> <span> {{$results->address}}</span> </div>
                      <div class="member-email clearfix"> <b>Phone No</b> <span>{{$results->phone}}</span> </div>
                      <div class="member-email clearfix">
                        <div class="col-lg-12"> <a href="{{url('/')}}/cart/checkout/address/view/order/{{$results->pk_id}}" class="button btn-block">Use This Address</a> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
                        @endif
              <div class="col-lg-12">
                <div class="x_content"> <a href="{{url('/')}}/cart/checkout/add/new/address"   class="button pull-right">Add New Address</a> </div>
              </div>
            </div>
            <div class="panel-heading panelhead">
              <h3 class="panel-title"> <strong>3 :</strong> ORDER SUMMERY </h3>
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