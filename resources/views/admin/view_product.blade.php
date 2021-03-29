@extends('admin.layouts.appadmin')
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="page-title">
        <div class="title_left">
          <h3>Product Management</h3>
            <h4 style="display:block;">Product View</h4>
        </div>
      </div>
      <div class="wrap">
      <div class="page-title">
            <h4><b>About this Item</b></h4>
      </div>
      @if($result>0)
      @foreach($result as $results )

      <div class="row borderbotms">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicons">
            <h4>Product Name</h4>
           </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahsss">
          @if($results->name == "")
           <p>...</p>
           @else
           <p>{{$results->name}}</p>
           @endif
          </div>
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

          @if($results->description == "")
          <p>...</p>
           @else
          <p >{{$results->description}}</p>
          @endif 
          
           </div>
        </div>
      </div>
      <div class="row borderbotms">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicons">
            <h4>Category</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahsss">
          @if($results->main_category == "")
          <p>...</p>
         @else
           <p>{{$results->main_category}}</p>
          	@endif
            
          </div>
        </div>
      </div>
      <div class="row borderbotms">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicons">
            <h4>Sub Category</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahsss">
          @if($results->sub_category == "")
         <p>...</p>
          @else
          <p>{{$results->sub_category}}</p>
        	@endif  
          </div>
        </div>
      </div>
      </div>
      <div class="row">
      <div class="col-lg-12 col-sm-10 col-md-12 col-xs-12">
      <div class="dividers"></div>
      </div>
      </div>
      <div class="wrap">
      <div class="page-title">
            <h4><b>Pricing</b></h4>
      </div>
      <div class="row borderbotms">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicons">
            <h4>SKU</h4>
           </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahsss">
          
          @if($results->SKU == "")
          <p>...</p>
          @else
         <p>{{$results->SKU}}</p>
        	@endif

          </div>
        </div>
      </div>
      
      <div class="row borderbotms">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicons">
            <h4>Price</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahsss">
           
          @if($results->price == "")
          <p>...</p>
          @else
           <p>{{$results->price}}</p>
         	@endif
            
          </div>
        </div>
      </div>
      </div>
      <div class="row">
      <div class="col-lg-12 col-sm-10 col-md-12 col-xs-12">
      <div class="dividers"></div>
      </div>
      </div>
      <div class="row">
      <div class="col-lg-12 col-sm-10 col-md-12 col-xs-12">
      <div class="dividers"></div>
      </div>
      </div>
      <div class="wrap">
      <div class="page-title">
            <h4><b>Unit/Size</b></h4>
      </div>
      <div class="row borderbotms">
        
        <div class="col-lg-4 col-md-4 col-sm-12 text-center">
        <label>Unit</label>
          <div class="dbparahsss" style="text-align:center;border-left: none;">
           
          @if($results->unit == "")
         <p>...</p>
           @else
           <p>{{$results->unit}}</p>
         	@endif

          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 text-center">
        <label>Quantity</label>
          <div class="dbparahsss" style="text-align:center;">
          <p>hello</p>
          </div>
        </div>
      </div>
      <div class="row borderbotms">
        
        <div class="col-lg-4 col-md-4 col-sm-12 text-center">
        <label>Unit</label>
          <div class="dbparahsss" style="text-align:center;border-left: none;">
            <p>4g</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 text-center">
        <label>Quantity</label>
          <div class="dbparahsss" style="text-align:center;">
            <p>25</p>
          </div>
        </div>
      </div>
      
      </div>
      <div class="row">
      <div class="col-lg-12 col-sm-10 col-md-12 col-xs-12">
      <div class="dividers"></div>
      </div>
      </div>
      
      <div class="row">
      <div class="col-lg-12 col-sm-10 col-md-12 col-xs-12">
      <div class="dividers"></div>
      </div>
      </div>
      <div class="wrap">
      <div class="page-title">
            <h4><b>Images</b></h4>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
          <label>First Image</label><br>
          
            <img  src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt="img">
           </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
          <label>Second Image</label><br>
            <img src="{{URL('/')}}/storage/images/{{$results->thumbnail2}}" alt="img">
           </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
          <label>Third Image</label><br>
            <img src="{{URL('/')}}/storage/images/{{$results->thumbnail3}}" alt="img">
           </div>
        </div>
      </div>
      </div>
    </div>
    @endforeach
        @endif
    <!-- /page content --> 
    
    @endsection 