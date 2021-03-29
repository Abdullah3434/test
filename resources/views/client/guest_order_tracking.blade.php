@extends('client.layouts.appclient')
@section('content')
<div id="login" class="mb-50 mt-70">
  <div class="container">
    <div id="login-row" class="row align-items-center">
      <div id="login-column" class="col-md-12">
      	
        <div id="login-box" class="col-md-6 shadow-lg p-3 mb-5 bg-white rounded">
        <div class="wrap">
        <form method="post" action = "{{url('/')}}/guest/order/tracking" class="login100-form validate-form ">
                     {{ csrf_field() }}
    @if($errors->any())
<div class="alert alert-danger">
 <strong>Danger!</strong> {{$errors->first()}}
</div>
@endif
            <h3 class="text-center text-success pt-20 pb-20">Order Tracking</h3>
            <div class="form-group has-search">
            <label class="text-success">Order Tracking</label>
              <input type="text" name="orderid" placeholder="Order Id" class="form-control">
            </div>
            <div class="form-group has-search">
            <label class="text-success">Email</label>
              <input type="text" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="submit" name="submit" class="btn button btn-md" value="Search">
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