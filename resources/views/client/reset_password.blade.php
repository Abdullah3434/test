 @extends('client.layouts.appclient')
@section('content')
<style>
.form-fild > input {
    width: 100%;
}
</style>
<!--Breadcrumb Tow Start-->
<div class="breadcrumb-tow mb-20">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-title">
          <h1>Password Reset</h1>
        </div>
        <div class="breadcrumb-content breadcrumb-content-tow">
          <ul>
            <li><a href="{{URL('/')}}/">Home</a></li>
            <li class="active">Password Reset</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Breadcrumb Tow End--> 
<!--Login Register Area Strat-->
<div class="login-register-area mb-80">
  <div class="container">
    <div class="row h-100 justify-content-center align-items-center"> 
      <!--Login Form Start-->
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="customer-login-register">
          <div class="login-form">
            <form method="post" action="{{url('/')}}/password/reset" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
              {{ csrf_field() }}
              
              @if($errors->any())
              <div class"alert alert-danger">{{$errors->first()}}</div>
              @endif
              @if(Session::has('message'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ Session::get('message') }}</strong> </div>
              @endif
              <div class="form-fild">
                <p>
                  <label>Username or email address <span class="required">*</span></label>
                </p>
                <input type="email" class="input100" name="username"  placeholder="Enter your Email" autocomplete="false" required/>
              </div>
              <div class="login-submit">
                <button type="submit" class="form-button">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--Login Form End--> 
    </div>
  </div>
</div>
<!--Login Register Area End--> 
@endsection