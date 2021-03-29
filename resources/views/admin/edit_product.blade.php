@extends('admin.layouts.appadmin')
@section('content')
 
<div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Product Management</h3>
            <h4 style="display: block;">Edit Product</h4>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">

          @if($result>0)
                       
        <form method="post" action = "{{url('/')}}/admin/home/edit/product/{{$result[0]->pk_id}}" class="login-form" enctype="multipart/form-data">
          {{ csrf_field() }}
         @if($errors->any())
   
                               
      <div class="alert alert-danger">
     <strong>Danger!</strong> {{$errors->first()}}
   </div>
       @endif

       <div class="productbox">
                <div class=" col-md-6">
                  <div class="form-login">
                    <div class="alert alert-info"> <strong>Info!</strong> Please don't use "/" in SKU. </div>
                    <label for="text">SKU</label>
                    <input type="text" name="sku" class="form-control input-sm chat-input" value="{{$result[0]->SKU}}"  placeholder="SKU"/>
                    <label for="text">Name</label>
                    <input type="text" name="name" class="form-control input-sm chat-input"  value="{{$result[0]->name}}" placeholder="Name" />
                    <label for="text">Price</label>
                    <input type="text" name="price" class="form-control input-sm chat-input" value="{{$result[0]->price}}" placeholder="Price" />
              
                    <label for="text">Category</label>
                
                <select class="form-control" name="mainCategory" id="mainCategory" >
                      @if($result1>0)
                       @foreach($result1 as $results)
                 <option value="{{urlencode($results->main_category)}}" @if($result[0]->main_category==$results->main_category) selected @endif>{{$results->main_category}}</option>
                   @endforeach
                   @endif
               </select>
               
               <label for="text">Sub Category</label>
      
      <select class="form-control" name="SubCategory" id="SubCategory" >
   
                 <option value="{{$result[0]->sub_category}}" >{{$result[0]->sub_category}}</option>
             
             </select>
             <label for="text">Brand Name</label>
                    <select class="form-control" name="brandName">
                                 
                                 @if($result4>0)
                                 @foreach($result4 as $results)
                                 
                                         <option value="{{$results->brand_name}}" @if($result[0]->brand_name == $results->brand_name) selected @endif >{{$results->brand_name}}</option>
                                         @endforeach
                         @endif
                                     </select>

                                     <label for="text">Unit</label>
      
            <select class="form-control" name="unit">
               
             
                       
                        <option   @if($result[0]->unit=="feet") selected @endif  value="feet">feet</option>
                        <option   @if($result[0]->unit=="Meter") selected @endif value="Meter">Meter</option> 
 <option   @if($result[0]->unit=="Yard") selected @endif value="Yard">Yard</option>
 <option   @if($result[0]->unit=="inchs") selected @endif value="inchs">Inches</option>
 <option   @if($result[0]->unit=="Centimeter") selected @endif value="Centimeter">Centimeter</option>
 <option   @if($result[0]->unit=="Kilogram") selected @endif value="Kilogram">Kilogram</option>
 <option   @if($result[0]->unit=="Gram") selected @endif value="Gram
">Gram
</option>
 <option   @if($result[0]->unit=="Litre") selected @endif value="Litre">Litre</option>
 <option   @if($result[0]->unit=="Mililitre") selected @endif value="Mililitre">Mililitre</option>
 <option   @if($result[0]->unit=="Watt") selected @endif value="Watt">Watt</option>
 <option   @if($result[0]->unit=="Volt-ampere") selected @endif value="Volt-ampere">Volt-ampere</option>
 <option   @if($result[0]->unit=="Horse-power") selected @endif value="Horse-power">Horse-power</option>
 <option   @if($result[0]->unit=="Cubic centimeter") selected @endif value="Cubic centimeter">Cubic centimeter</option>
 <option   @if($result[0]->unit=="Radian") selected @endif value="Radian">Radian</option>
 <option   @if($result[0]->unit=="Degree") selected @endif value="Degree">Degree</option>
 <option   @if($result[0]->unit=="Bit") selected @endif value="Bit">Bit</option>
 <option   @if($result[0]->unit=="Byte") selected @endif value="Byte">Byte</option>
 <option   @if($result[0]->unit=="Kilobyte") selected @endif value="Kilobyte">Kilobyte</option>
 <option   @if($result[0]->unit=="Megabyte") selected @endif value="Megabyte">Megabyte</option>
 <option   @if($result[0]->unit=="GigaByte") selected @endif value="GigaByte">GigaByte
</option>
 <option   @if($result[0]->unit=="Terabyte") selected @endif value="Terabyte">Terabyte</option>
 <option   @if($result[0]->unit=="Pixel") selected @endif value="Pixel">Pixel</option>
 <option   @if($result[0]->unit=="Density per pixel") selected @endif value="Density per pixel
">Density per pixel
</option>
 <option   @if($result[0]->unit=="Pieces") selected @endif value="Pieces">Pieces
</option>
 <option   @if($result[0]->unit=="Packs") selected @endif value="packs">Packs</option>
 <option   @if($result[0]->unit=="Pairs") selected @endif value="Pairs">Pairs</option>
 <option   @if($result[0]->unit=="Dozen") selected @endif value="Dozen">Dozen</option>
 <option   @if($result[0]->unit=="Vol") selected @endif value="Vol
">Vol
</option>
 <option   @if($result[0]->unit=="Percent") selected @endif value="Percent">Percent</option>
                  
                   </select>
         
                   @php
                  $pk_id = $result[0]->pk_id;
            $size = DB::select("select* from size_detail where product_id = '$pk_id' order by pk_id asc");
         
 
                            @endphp
   
<div class="input_fields_wrap" style="margin-bottom:3rem;">
    @foreach($size as $sizes)
          <div class="col-lg-6 lpadding"><label for="text">QTY</label><input type="number" name="mytextt[]" value="{{$sizes->quantity}}" class="form-control"placeholder="QTY" min="1" ></div><div class="col-lg-6"><label for="text">Size</label><input type="text" value="{{$sizes->size}}" class="form-control" name="mytextt[]" class="form-control" placeholder="Size" required min="1" ></div><br>
      @endforeach 
    <br>

</div>

 

    <button class="add_field_button btn-md btn">Add More Fields</button> 

    </div>
        
        </div>
        <div class=" col-md-4">
            <div class="form-login">
            
           <div class="switch">
           <label for="text">Inactive?</label>
                            <input id="cmn-toggle-4" name="status" @if($result[0]->status==1) checked @endif  class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                            <label for="cmn-toggle-4"></label>
                            </div>
            <br>
            



            <label for="text">Image</label>
                                     <div class="form-group">
<input type='file' name="file" class="form-control" value="{{url('/')}}/storage/images/{{$result[0]->thumbnail}}" onchange="readURL(this);"/>
<img id="blah" src="{{url('/')}}/storage/images/{{$result[0]->thumbnail}}" alt="your image"style="width:180px; height:180px;" />
</div>

<div class="form-group">
<input type='file' name="images2" class="form-control" value="{{url('/')}}/storage/images/{{$result[0]->thumbnail2}}" onchange="preview_image(this);"/>
<img id="blah2" src="{{url('/')}}/storage/images/{{$result[0]->thumbnail2}}" alt="your image" style="width:180px; height:180px;"/>
</div>
<div class="form-group">
<input type='file' name="images3" class="form-control" value="{{url('/')}}/storage/images/{{$result[0]->thumbnail3}}" onchange="preview_img(this);"/>
<img id="blah3" src="{{url('/')}}/storage/images/{{$result[0]->thumbnail3}}" alt="your image" style="width:180px; height:180px;"/>
</div>

<div class="form-group">
    <LABEL>Size Chart</LABEL>
<input type='file' name="images4" class="form-control" value="{{url('/')}}/storage/images/{{$result[0]->thumbnail4}}" onchange="preview_imgs(this);"/>
<img id="blah4" src="{{url('/')}}/storage/images/{{$result[0]->thumbnail4}}" alt="your image" style="width:180px; height:180px;"/>
</div>

    <div class="form-group">
      <label for="comment">Description</label>
      <textarea class="form-control" name="description" rows="9" id="comment" >{{$result[0]->description}}</textarea>
    </div>
            <br>
            
            <span class="group-btn">     
                <button class="btn btn-default btn-md" name="submit" type="submit">
                    Save
                   </button>
            </span>
            </div>
        
        </div>
    </div>
    </form>
    
    @endif

    </div>
        </div>
      </div>
    </div>



@endsection 