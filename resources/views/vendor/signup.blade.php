@extends('client.layouts.appclient')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12"> @if($errors->any())
      <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
      @endif
      <div class="formbody">
        <div class="form_head">
          <h2 style="text-align:center;">Personal Information</h2>
        </div>
        <form method="post" action = "{{url('vendor/signnup')}}" enctype="multipart/form-data" class="login-form" autocomplete="off">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>First Name <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="fname" placeholder="First Name"  maxlength="100" required autocomplete="off">
              </div>
              <div class="form-group">
                <label>Last Name <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="lname" placeholder="Last Name" maxlength="100" required autocomplete="off">
              </div>
              <div class="form-group">
                <label>Store Name (Maximum 100 Characters) <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="store_name" placeholder="Store Name"  maxlength="100" required autocomplete="off">
              </div>
              
              <div class="form-group">
                <label>Store Address <span style="color:red;">*</span></label>
                <input type="text" name="address" class="form-control" placeholder="Address"  maxlength="100" required autocomplete="off">
              </div>
              <div class="form-group">
                <label>CNIC Number (Ex.3520112345678) <span style="color:red;">*</span></label>
                <input type="text" name="cnic" class="form-control" placeholder="CNIC Number" required autocomplete="off"/>
              </div>
              <div class="form-group">
                <label>Mobile Number (Ex.03001234567) <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="phone" placeholder="Mobile Number" pattern=".{11,}"  maxlength="15" required autocomplete="off">
              </div>
              <div class="form-group">
                <label>Country <span style="color:red;">*</span></label>
                <select name="country" class="form-control countries order-alpha presel-PK" id="countryId">
                  <option value="">Select Country</option>
                </select>
              </div>
              <div class="form-group">
                <label>State <span style="color:red;">*</span></label>
                <select name="state" class=" form-control states order-alpha" id="stateId">
                  <option value="">Select State</option>
                </select>
                
                <!-- <input type="text" class="form-control" name="city" placeholder="City" maxlength="100" required autocomplete="off"> --> 
              </div>
              <div class="form-group">
                <label>City <span style="color:red;">*</span></label>
                <select name="city" class="form-control cities order-alpha" id="cityId">
                  <option value="">Select City</option>
                </select>
              </div>
              <div class="form-group">
                <label>Email Address <span style="color:red;">*</span></label>
                <input type="email" class="form-control" name="email" placeholder="Email"  maxlength="30" autocomplete="off" required >
              </div>
              <div class="form-group">
                <label>Password (Minimum 8 characters) <span style="color:red;">*</span></label>
                <input type="password" name="password"class="form-control" pattern=".{8,}" maxlength="36"  placeholder="Password" autocomplete="off" required >
              </div>
              <div class="form-group">
                <label>Confirm Password (Minimum 8 characters) <span style="color:red;">*</span></label>
                <input type="password" name="confirm_password" class="form-control" pattern=".{8,}" maxlength="36"  placeholder="Confirm Password" required autocomplete="off">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Bank Account title <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="bank_title" placeholder="Bank Account title" maxlength="100" required autocomplete="off">
              </div>
              <div class="form-group">
                <label>Bank Name (Only Alphabets) <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="bank_name" placeholder="Bank Name"  maxlength="100" required autocomplete="off">
              </div>
              <div class="form-group">
                <label>Bank Account Number <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="bank_number" maxlength="30" placeholder="Bank Account Number" required autocomplete="off">
              </div>
              <div class="form-group">
                <label>Branch Code <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="bank_code" placeholder="Branch Code" required autocomplete="off">
              </div>
              <div class="form-group">
                <label>NTN (Optional)</label>
                <input type="text" class="form-control" name="ntn" placeholder="NTN">
              </div>
              <div class="form-group">
                <label>STN (Optional)</label>
                <input type="text" class="form-control" name="stn" placeholder="STN">
              </div>
              <div class="form-group">
                <label>Zip Code <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="zip_code" placeholder="Zip Code" required autocomplete="off">
              </div>
              <div class="form-group">
                <label><span style="color:red;">Person other then you please provide his/her contact info.</span></label>
              </div>
              <div class="form-group">
                <label>Dealing Person (Optional)</label>
                <input type="text" class="form-control" name="dealing_person" placeholder="Dealing Person">
              </div>
              <div class="form-group">
                <label>Dealing Person Contact Number (Optional)</label>
                <input type="text" class="form-control" name="d_p_phone" placeholder="Dealing Person Contact Number">
              </div>
            </div>
            <div class="col-lg-12">
              <label for="text">Uploded Cheque copy <span style="color:red;">*</span></label>
              <input type="file" name = "file" onchange="readURL(this);" required autocomplete="off"/>
              <p style="color:#ab0f23;">please uploade a copy of cheque to source your bank information  and you will get online payment.</p>
            </div>
            <div class="col-lg-4 col-lg-offset-4">
              <div class="form-group">
                <button type="submit" class="form-button btn-lg">Sign Up</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection