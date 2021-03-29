@extends('admin.layouts.appadmin')

@section('content') 

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Admin Management</h3>
        <h4 style="display: block;">Add Admin</h4>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_content">
          <form method="post" enctype="multipart/form-data" action = "{{url('/')}}/admin/home/create/admin" >
            @if($errors->any())
            <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
            @endif
            {{ csrf_field() }}
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group ">
                <label class="control-label requiredField" for="fname"> First Name <span class="asteriskField"> * </span> </label>
                <div class="input-group">
                  <div class="input-group-addon"> <i class="fa fa-user"> </i> </div>
                  <input class="form-control" id="name" name="fname" type="text">
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group ">
                <label class="control-label requiredField" for="lname"> Last Nmae <span class="asteriskField"> * </span> </label>
                <div class="input-group">
                  <div class="input-group-addon"> <i class="fa fa-user"> </i> </div>
                  <input class="form-control" id="name1" name="lname" type="text">
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group ">
                <label class="control-label requiredField" for="email"> Email <span class="asteriskField"> * </span> </label>
                <div class="input-group">
                  <div class="input-group-addon"> <i class="fa fa-envelope"> </i> </div>
                  <input class="form-control" id="email" name="email" type="text">
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group ">
                <label class="control-label requiredField" for="tel"> Telephone # <span class="asteriskField"> * </span> </label>
                <div class="input-group">
                  <div class="input-group-addon"> <i class="fa fa-phone"> </i> </div>
                  <input class="form-control" id="tel" name="telephone" type="text">
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group ">
                <label class="control-label requiredField" for="password"> Password <span class="asteriskField"> * </span> </label>
                <div class="input-group">
                  <div class="input-group-addon"> <i class="fa fa-key"> </i> </div>
                  <input class="form-control" name="password" type="password">
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group ">
                <label class="control-label requiredField" for="pass"> Confirm Password <span class="asteriskField"> * </span> </label>
                <div class="input-group">
                  <div class="input-group-addon"> <i class="fa fa-key"> </i> </div>
                  <input class="form-control" name="confirm" type="password">
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group ">
                <label class="control-label requiredField" for="name2"> Address <span class="asteriskField"> * </span> </label>
                <div class="input-group">
                  <div class="input-group-addon"> <i class="fa fa-home"> </i> </div>
                  <input class="form-control" id="name2" name="address" type="text">
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group ">
                <label class="control-label requiredField" for="image"> Image <span class="asteriskField"> * </span> </label>
                <div class="input-group">
                  <div class="input-group-addon"> <i class="fa fa-file-image-o"> </i> </div>
                  <input class="form-control" name="image" type="file">
                </div>
              </div>
            </div>
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="form-group ">
                <label class="control-label "> Admin & Permisions management </label>
                <div class=" ">
                  <div class="checkbox"> 
                    <!-- <label class="checkbox">
                          <input name="checkbox" type="checkbox" value="Dispute">
                          Sale manangement </label> --> 
                  </div>
                  <div class="checkbox">
                    <label class="checkbox">
                      <input name="product_management" type="checkbox"  value="1">
                      Product manangement </label>
                  </div>
                  <div class="checkbox">
                    <label class="checkbox">
                      <input name="category_management" type="checkbox"  value="1">
                      Category manangement </label>
                  </div>
                  <div class="checkbox">
                    <label class="checkbox">
                      <input name="brand_management" type="checkbox"  value="1">
                      Brand Management </label>
                  </div>
                  <div class="checkbox">
                    <label class="checkbox">
                      <input name="order_management" type="checkbox"  value="1">
                      Order Management </label>
                  </div>
                  <div class="checkbox">
                    <label class="checkbox">
                      <input name="reporting" type="checkbox"  value="1">
                      Reporting Management </label>
                  </div>
                  <div class="checkbox">
                    <label class="checkbox">
                      <input name="discount" type="checkbox"  value="1">
                      Discounts </label>
                  </div>
                  <div class="checkbox">
                    <label class="checkbox">
                      <input name="promocode" type="checkbox"  value="1">
                      Prmotions </label>
                  </div>
                  <div class="checkbox">
                    <label class="checkbox">
                      <input name="vendor_management" type="checkbox"  value="1">
                      Vendor manangement </label>
                  </div>
                  <div class="checkbox">
                    <label class="checkbox">
                      <input name="coaching_management" type="checkbox"  value="1">
                      Coaching manangement </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <div>
                  <button class="btn btn-success" name="submit" type="submit"> Submit </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content --> 

@endsection 