@extends('vendor.layouts.appvendor')
 
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="page-title">
        <div class="title_left">
          <h3>Vendor Dashboard</h3>
        </div>
      </div>
      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h3>Products</h3>
            <img src="images/12.jpg" alt="icon"> </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahs">
            <p>You have <span>{{$p}} active products.</span></p>
            <p style="margin-top: 25px;">You can create products and multiple variants easily usingthe self service tool OR you can bulk import products.</p>
            <h6><a href="">Add or manage your products <i class="fa fa-angle-double-right"></i></a></h6>
          </div>
        </div>
      </div>
      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h3>Payments</h3>
            <img src="images/13.jpg" alt="icon"> </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahs">
            <p>You have <span>No recent payments.</span></p>
            <p style="margin-top: 25px;">You can create products and multiple variants easily usingthe self service tool OR you can bulk import products.</p>
            <h6><a href="">View your payments <i class="fa fa-angle-double-right"></i></a></h6>
          </div>
        </div>
      </div>
      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h3>Orders</h3>
            <img src="images/14.jpg" alt="icon"> </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahs">
            <p>You have no Order in the last week. View <span>Previous Orders here.</span></p>
            <p style="margin-top: 25px;">You can create products and multiple variants easily usingthe self service tool OR you can bulk import products.</p>
            <h6><a href="">Manage your Orders <i class="fa fa-angle-double-right"></i></a></h6>
          </div>
        </div>
      </div>
      
    </div>
    <!-- /page content --> 
   @endsection
