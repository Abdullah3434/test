@extends('admin.layouts.appadmin')
@section('content')
     
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Product Management</h3>
            <h4 style="display: block;">Add Product</h4>
          </div>
        </div>
        @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>  
    @endif
        <div class="clearfix"></div>
        <div class="row">
        @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>  
    @endif
          <div class="col-md-12 col-sm-12 col-xs-12">
          @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>  
    @endif
          <form method="post" action = "{{url('/')}}/admin/home/add/product" class="login-form" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      @if($errors->any())

                            
                            <div class="alert alert-danger">
  <strong>Danger!</strong> {{$errors->first()}}
</div>
	@endif
              <!-- <div class="alert alert-danger"> <strong></strong> Error Message </div> -->

              <div class="productbox">
                <div class=" col-md-6">
                  <div class="form-login">
                    <div class="alert alert-info"> <strong>Info!</strong> Please don't use "/" in SKU. </div>
                    <label for="text">SKU</label>
                    <input type="text" name="sku" class="form-control input-sm chat-input" placeholder="SKU"/>
                    <label for="text">Name</label>
                    <input type="text" name="name" class="form-control input-sm chat-input" placeholder="Name" />
                    <label for="text">Price</label>
                    <input type="text" name="price" class="form-control input-sm chat-input" placeholder="Price" />
                    
                   <label for="text">Category</label>
                
                <select class="form-control" name="mainCategory" id="mainCategory"  >
                        <option value="" disable="true" selected="true" >---Select Category---</option>
                   @if($result2>0)
                   @foreach($result2 as $results)
                           <option value="{{urlencode($results->main_category)}}">{{$results->main_category}}</option>
                           @endforeach
                           @endif
                       </select>
                       
                    <label for="text">Sub Category</label>
                    <select class="form-control" name="SubCategory" id="SubCategory">
                      <option value="">Select Sub Category</option>
                    </select>
                    <label for="text">Brand Name</label>
                    <select class="form-control" name="BrandName">

                      <option value="No Brand">No Brand</option>
                       @if($result1>0)
                                 @foreach($result1 as $results)
                                 
                                         <option value="{{$results->brand_name}}">{{$results->brand_name}}</option>
                                         @endforeach
                         @endif
                    </select>
                    <label for="text">Unit</label>
                    <select class="form-control" name="unit">
                      <option value="Meter">Meter</option>
                      <option value="Yard">Yard</option>
                      <option value="inchs">Inches</option>
                      <option value="Centimeter">Centimeter</option>
                      <option value="Kilogram">Kilogram</option>
                      <option value="Gram">Gram </option>
                      <option value="Litre">Litre</option>
                      <option value="Mililitre">Mililitre</option>
                      <option value="Watt">Watt</option>
                      <option value="Volt-ampere">Volt-ampere</option>
                      <option value="Horse-power">Horse-power</option>
                      <option value="Cubic centimeter">Cubic centimeter</option>
                      <option value="Radian">Radian</option>
                      <option value="Degree">Degree</option>
                      <option value="Bit">Bit</option>
                      <option value="Byte">Byte</option>
                      <option value="Kilobyte">Kilobyte</option>
                      <option value="Megabyte">Megabyte</option>
                      <option value="GigaByte">GigaByte </option>
                      <option value="Terabyte">Terabyte</option>
                      <option value="Pixel">Pixel</option>
                      <option value="Density per pixel">Density per pixel </option>
                      <option value="pieces">Pieces </option>
                      <option value="packs">Packs</option>
                      <option value="pairs">Pairs</option>
                      <option value="dozen">Dozen</option>
                      <option value="Vol">Vol </option>
                      <option value="percent">Percent</option>
                    </select>
                    <div class="input_fields_wrap" style="margin-bottom:3rem;">
                      <div class="col-lg-6 lpadding">
                        <label for="text">QTY</label>
                        <input type="number" name="mytextt[]" class="form-control" placeholder="QTY"  value="1" min="1" required>
                      </div>
                      <div class="col-lg-6">
                        <label for="text">Size</label>
                        <input type="text" name="mytextt[]" class="form-control" placeholder="Size" required>
                      </div>
                      <br>
                      <br>
                    </div>
                    <button class="add_field_button btn-md btn">Add More Fields</button>
                  </div>
                </div>
                <div class=" col-md-4">
                  <div class="form-login">

                    <!-- <div class="switch">
                      <label for="text">Inactive?</label>
                      <input id="cmn-toggle-4" name="status" class="cmn-toggle cmn-toggle-round-flat" type="checkbox" checked>
                      <label for="cmn-toggle-4"></label>
                    </div> -->
                    <div class="switch">
           <label for="text">Inactive?</label>
                            <input id="cmn-toggle-4"  class="cmn-toggle cmn-toggle-round-flat" type="checkbox" checked>
                            <label for="cmn-toggle-4"></label>
                            </div>


                    <br>
                    <br> <br>
                    <div class="alert alert-info"> <strong>Info!</strong> Please upload image in 350 * 300 pixel </div>
                    <label for="text">Image</label>
                    <div class="form-group">  
                      <input type="file" name="file1" class="form-control" onchange="readURL(this);"/>
                      <img id="blah" src="{{url('/')}}/images/demo.png" alt="your image" style="width:350px; height:300px;" /> </div>
                    <div class="form-group"> 
                      <input type="file" name="file2" class="form-control" onchange="preview_image(this);"/>
                      <img id="blah2" src="{{url('/')}}/images/demo.png" alt="your image" style="width:350px; height:300px;"/> </div>
                    <div class="form-group">
                      <input type="file" name="file3" class="form-control" onchange="preview_img(this);"/>
                      <img id="blah3" src="{{url('/')}}/images/demo.png" alt="your image" style="width:350px; height:300px;"/> </div>
                      <div class="form-group">
                      <input type="file" name="file4" class="form-control" onchange="preview_img(this);"/>
                      <img id="blah3" src="{{url('/')}}/images/demo.png" alt="your image" style="width:350px; height:300px;"/> </div>
             
                    
                      <div class="form-group">
                      <label for="comment">Description</label>
                      <textarea class="form-control" name="description" rows="9" id="comment"></textarea>
                    </div>
                    <br>
                    <span class="group-btn">
                    <button class="btn btn-default btn-md" name="submit" type="submit"> Add </button>
                    </span> </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content --> 
    
    @endsection 