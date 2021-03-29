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
          <h1>Register</h1>
        </div>
        <div class="breadcrumb-content breadcrumb-content-tow">
          <ul>
            <li><a href="{{URL('/')}}/">Home</a></li>
            <li class="active">Register</li>
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
      <!--Register Form Start-->
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="customer-login-register register-pt-0">
          <div class="register-form">
            <form method="post" action = "{{url('/')}}/signup">
              {{ csrf_field() }}
              @if($errors->any())
              <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
              @endif
              <div class="form-fild">
                <p>
                  <label>First Name <span class="required">*</span></label>
                </p>
                <input name="fname" value="" type="text" placeholder="Enter your Name" autocomplete="false" required>
              </div>
              <div class="form-fild">
                <p>
                  <label>Last Name <span class="required">*</span></label>
                </p>
                <input name="lname" value="" type="text" placeholder="Enter your Name" autocomplete="false" required>
              </div>
              <div class="form-fild">
                <p>
                  <label>Email <span class="required">*</span></label>
                </p>
                <input name="email" id="email"  value="" type="email" placeholder="Enter your email" autocomplete="false" required>
              </div>
              <div class="form-fild">
                <p>
                  <label>Password (Minimum 8 characters)<span class="required">*</span></label>
                </p>
                <input name="password" value="" type="password"  id="password" pattern=".{8,}" maxlength="36"  placeholder="Enter your Password" autocomplete="false" required/>
              </div>
              <div class="form-fild">
                <p>
                  <label>Confirm Password  (Minimum 8 characters)<span class="required">*</span></label>
                </p>
                <input  value="" type="password" name="confirm" id="confirm" maxlength="36" placeholder="Confirm your Password" autocomplete="false" required/>
              </div>
              <div class="register-submit">
                <button type="submit" class="form-button">Register</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--Register Form End--> 
    </div>
  </div>
</div>
<!--Login Register Area End-->
@endsection