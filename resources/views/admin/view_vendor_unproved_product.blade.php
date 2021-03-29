@extends('admin.layouts.appadmin')
 
 @section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Vendor Managment</h3>
            <h4>Vendor Un Approved Product View</h4>
          </div>
        </div>
        @if(count($result)>0)
                  @foreach($result as $results)
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_content">
                <div class="member-left-side">
                  <div class="member-email clearfix"> <b>SKU</b> <span>{{$results->SKU}}</span> </div>
                  <div class="member-email clearfix"> <b>Name</b> <span>{{$results->name}}</span> </div>
                  <div class="member-email clearfix"> <b>Price</b> <span>{{$results->price}}$</span> </div>
                  <div class="member-email clearfix"> <b>Category</b> <span>{{$results->main_category}}</span> </div>
                  <div class="member-email clearfix"> <b>Sub Category</b> <span>{{$results->sub_category}}</span> </div>
                  <div class="member-email clearfix"> <b>Brand Name</b> <span>Food {{$results->brand_name}}</span> </div>
                  <div class="member-email clearfix"> <b>Status</b> <span>{{$results->status}}</span> </div>
                  
                  <div class="member-email clearfix"> <b>Unit</b> <span>{{$results->unit}}</span> </div>
                  <div class="member-email clearfix"> <b><h3>Quantity</h3></b> <span><h3>Size</h3></span> </div>
                  @endforeach
                  @endif 
                  
                  @php
      $product_id = $results->pk_id;
      $size_detail = DB::select("select * from size_detail where product_id = '$product_id' order by pk_id asc"); 
      @endphp
      
      @foreach($size_detail as $results)
                  <div class="member-email clearfix"> {{$results->quantity}} <span>{{$results->size}}</span> </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          
          @if(count($result)>0)
                  @foreach($result as $results)
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_content">
                <div class="page-title">
                  <h4><b>Images</b></h4>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="dbicons">
                      <label>First Image</label>
                      <br>
                      <img  src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail}}"  alt="img"> </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="dbicons">
                      <label>Second Image</label>
                      <br>
                      <img  src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail2}}"  alt="img"> </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="dbicons">
                      <label>Third Image</label>
                      <br>
                      <img  src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail3}}"  alt="img"> </div>
                  </div>
                </div>
                <div class="row borderbotms">
                  <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="dbicons">
                      <h4>Product Description</h4>
                    </div>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="dbparahsss">
                    <p>{{$results->description}}.</p>   
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
                  @endif 
                  


                  @if(count($result1)>0)
                  @foreach($result1 as $results)

        <div class="row">
          <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <div class="member-left-side">
              <h3>Bussiness Information</h3>
                  <div class="member-email clearfix"> <b>Name</b> <span>{{$results->fname}}</span> </div>
                  <div class="member-email clearfix"> <b>Store Name</b> <span>Food {{$results->store_name}}</span> </div>
                  <div class="member-email clearfix"> <b>Email</b> <span>{{$results->email}}</span> </div>
                  <div class="member-email clearfix"> <b>City</b> <span>{{$results->city}}</span> </div>
                </div>
            </div>
            </div>
          </div>
        </div>

        @endforeach
                  @endif 

      </div>
    </div>
    <!-- /page content --> 
    
    @endsection