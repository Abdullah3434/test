@extends('admin.layouts.appadmin')
@section('content')
     
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="page-title">
        <div class="title_left">
          <h3>Admin Management</h3>
            <h4 style="display:block;">Admin View</h4>
        </div>
      </div>
      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Name</h4>
           </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
          {{$result[0]->fname}} {{$result[0]->lname}}
          </div>
        </div>
      </div>
      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Email</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
          
          {{$result[0]->username}}
          </div>
        </div>
      </div>


      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Ph.No</h4>
           </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
          {{$result[0]->telephone}} 
          </div>
        </div>
      </div>



      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Address</h4>
           </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
          {{$result[0]->address}} 
          </div>
        </div>
      </div>


      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Image</h4>
           </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
          
          <!-- <label>Third Image</label><br> -->
            <img src="{{URL('/')}}/storage/images/{{$result[0]->image}}" alt="img" style="width:80px; height:80px;">
           
          </div>
        </div>
      </div>


      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Permisions</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
            <p>
            @if($result[0]->admin_management==1)
                          <span class="label label-warning">Admin Management</span>
                            @endif
                          @if($result[0]->product_management==1)
                            <span class="label label-success">Product Management </span>
                            @endif
                            @if($result[0]->category_management==1)
                          <span class="label label-primary">Category Management</span>
                          @endif
                          
                           @if($result[0]->brand_management==1)
                          <span class="label label-warning">Brand Management</span>
                            @endif
                          @if($result[0]->order_management==1)
                            <span class="label label-success">Order Management</span>
                            @endif
                            @if($result[0]->reporting==1)
                          <span class="label label-primary">Reporting</span>
                          @endif
                          
                           @if($result[0]->discount==1)
                          <span class="label label-warning">Discount</span>
                            @endif
                          @if($result[0]->promocode==1)
                            <span class="label label-success">Promocode</span>
                            @endif
                            @if($result[0]->vendor_management==1)
                          <span class="label label-primary">Vendor Management</span>
                          @endif
                          @if($result[0]->coaching_management==1)
                          <span class="label label-primary">Coaching Management</span>
                          @endif
                    
                    </p>
            
          </div>
        </div>


      





      </div>
      
    </div>
    <!-- /page content --> 
    
    @endsection 