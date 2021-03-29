@extends('client.layouts.appclient')
@section('content')
<!--Header Area End--> 
<!--Checkout Area Strat-->
<br><br><br><br>
<div class="checkout-area mb-80 mt-70">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12">
      <form  role="form" action = "{{url('/')}}/cart/guest/checkout" method="post" id="payment-form">
                  {{ csrf_field() }}
          <div class="checkbox-form">
            <h3>Add Address
              </h3>
            <div class="row">
              <div class="col-md-6">
                <div class="checkout-form-list">
                  <label>First Name <span class="required">*</span></label>
                  <input placeholder="" type="text" name="fname" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="checkout-form-list">
                  <label>Last Name <span class="required">*</span></label>
                  <input placeholder="" type="text" name="lname" >
                </div>
              </div>
              <div class="col-md-12">
                <div class="checkout-form-list">
                  <label>Email</label>
                  <input placeholder="" type="email" name="email" >
                </div>
              </div>
              <div class="col-md-12">
                <div class="checkout-form-list">
                  <label>Address <span class="required">*</span></label>
                  <input placeholder="Address" type="text"  id="id_address_line_1" name="address" >
                </div>
              </div>
              <div class="col-md-12">
                <div class="checkout-form-list">
                  <label>Phone No <span class="required">*</span></label>
                  <input placeholder="Phone No." type="text" id="id_phone" name="phone">
                </div>
              </div>
              <div class="col-md-12">
                <div class="checkout-form-list">
                  <label>Postcode / Zip <span class="required">*</span></label>
                  <input placeholder="Zip Code" type="text"  id="id_phone" name="zip">
                </div>
              </div>
              <div class="col-md-12">
                <div  class="country-select mb-30">
                  <label>Country<span class="required">*</span></label>
                  <select name="country" class=" wide countries order-alpha" id="countryId">
                    <option value="">Select Country</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="country-select">
                  <label>State<span class="required">*</span></label>
                  <select name="state" class="wide states order-alpha" id="stateId">
                    <option value="">Select State</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="country-select">
                  <label>City<span class="required">*</span></label>
                  <select name="city" class="wide cities order-alpha" id="cityId">
                    <option value="">Select City</option>
                  </select>
                </div>
              </div>


            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="coupon-all">
                <div class="coupon2">
                  <input class="button" name="update_cart" value="Submit" type="submit">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--Checkout Area End--> 
<!--Footer Area Start-->
@endsection