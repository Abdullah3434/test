@extends('admin.layouts.appadmin')
@section('content')
     
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Admin Management</h3>
            <h4 style="display: block;">Edit Admin</h4>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_content">
       
            <form method="post" enctype="multipart/form-data" action = "{{url('/')}}/admin/home/view/admin/edit/admin/{{$result[0]->pk_id}}" >
                    
                    {{ csrf_field() }}
                    
                                    @if($errors->any())

                            
                            <div class="alert alert-danger">
  <strong>Danger!</strong> {{$errors->first()}}
</div>
	@endif
            
       
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group ">
                    <label class="control-label requiredField" for="name"> First Name <span class="asteriskField"> * </span> </label>
                    <div class="input-group">
                      <div class="input-group-addon"> <i class="fa fa-user"> </i> </div>
                      <input class="form-control" id="name" name="fname" value="{{$result[0]->fname}}" type="text">
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group ">
                    <label class="control-label requiredField" for="name1"> Last Nmae <span class="asteriskField"> * </span> </label>
                    <div class="input-group">
                      <div class="input-group-addon"> <i class="fa fa-user"> </i> </div>
                      <input class="form-control" id="name1" name="lname" value="{{$result[0]->lname}}" type="text">
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group ">
                    <label class="control-label requiredField" for="email"> Email <span class="asteriskField"> * </span> </label>
                    <div class="input-group">
                      <div class="input-group-addon"> <i class="fa fa-envelope"> </i> </div>
                      <input class="form-control" id="email" name="email" value="{{$result[0]->username}}" type="text" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group ">
                    <label class="control-label requiredField" for="tel"> Telephone # <span class="asteriskField"> * </span> </label>
                    <div class="input-group">
                      <div class="input-group-addon"> <i class="fa fa-phone"> </i> </div>
                      <input class="form-control" id="tel" name="telephone" value="{{$result[0]->telephone}}" type="text">
                    </div>
                  </div>
                </div>
                <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group ">
                    <label class="control-label requiredField" for="password"> Password <span class="asteriskField"> * </span> </label>
                    <div class="input-group">
                      <div class="input-group-addon"> <i class="fa fa-key"> </i> </div>
                      <input class="form-control" name="password" type="password">
                    </div>
                  </div>
                </div> -->
                <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group ">
                    <label class="control-label requiredField" for="pass"> Confirm Password <span class="asteriskField"> * </span> </label>
                    <div class="input-group">
                      <div class="input-group-addon"> <i class="fa fa-key"> </i> </div>
                      <input class="form-control" name="confirm" type="password">
                    </div>
                  </div>
                </div> -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group ">
                    <label class="control-label requiredField" for="name2"> Address <span class="asteriskField"> * </span> </label>
                    <div class="input-group">
                      <div class="input-group-addon"> <i class="fa fa-home"> </i> </div>
                      <input class="form-control" id="name2" name="address" value="{{$result[0]->address}}" type="text">
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group ">
                    <label class="control-label requiredField" for="name2"> Image <span class="asteriskField"> * </span> </label>
                    <div class="input-group">
                      <div class="input-group-addon"> <i class="fa fa-file-image-o"> </i> </div>
                      
                      <input type='file' name="image" class="form-control" value="{{url('/')}}/storage/images/{{$result[0]->image}}" onchange="readURL(this);"/>
                      <img id="blah" src="{{url('/')}}/storage/images/{{$result[0]->image}}" alt="your image" style="width:80px; height:80px;" />

                      <!-- <input class="form-control" name="image" src="{{url('/')}}/storage/images/{{$result[0]->image}}" type="file"> -->
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group ">
                    <label class="control-label "> Admin & Permisions management </label>
                    <div class=" ">
                      <div class="checkbox">
                        <label class="checkbox">
                          <input name="product_management"  @if($result[0]->product_management==1) checked @endif type="checkbox" value="1">
                          Product manangement </label>
                      </div>
                      <div class="checkbox">
                        <label class="checkbox">
                          <input name="category_management" @if($result[0]->category_management==1) checked @endif type="checkbox" value="1">
                          Category manangement </label>
                      </div>
                      <div class="checkbox">
                        <label class="checkbox">
                          <input name="brand_management" @if($result[0]->brand_management==1) checked @endif type="checkbox" value="1">
                          Brand manangement </label>
                      </div>
                      <div class="checkbox">
                        <label class="checkbox">
                          <input name="order_management" @if($result[0]->order_management==1) checked @endif type="checkbox" value="1">
                          Order Management </label>
                      </div>
                      <div class="checkbox">
                        <label class="checkbox">
                          <input name="reporting" @if($result[0]->reporting==1) checked @endif type="checkbox" value="1>
                          Reporting </label>
                      </div>
                      <div class="checkbox">
                        <label class="checkbox">
                          <input name="discount" @if($result[0]->discount==1) checked @endif type="checkbox" value="1">
                          Discount </label>
                      </div>
                      <div class="checkbox">
                        <label class="checkbox">
                          <input name="promocode" @if($result[0]->promocode==1) checked @endif type="checkbox" value="1">
                          Promo Code </label>
                      </div>
                      <div class="checkbox">
                        <label class="checkbox">
                          <input name="vendor_management"  @if($result[0]->vendor_management==1) checked @endif type="checkbox" value="1">
                          Vendor manangement </label>
                      </div>
                      <div class="checkbox">
                        <label class="checkbox">
                          <input name="checkbox"  @if($result[0]->coaching_management==1) checked @endif type="checkbox" value="1">
                          Coaching manangement </label>
                      </div>
                      <!-- <div class="checkbox">
                        <label class="checkbox">
                          <input name="checkbox" type="checkbox" value="Appitude test">
                          Blog manangement </label>
                      </div> -->
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <div>
                      <button class="btn btn-success" name="submit" type="submit"> Edit </button>
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
   