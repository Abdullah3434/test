@extends('admin.layouts.appadmin')
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="page-title">
        <div class="title_left">
          <h3>Recommendation Management</h3>
            <h4 style="display:block;">Recommendation View</h4>
        </div>
      </div>
      <div class="wrap">
      <div class="page-title">
            <h4><b>About</b></h4>
      </div>
      @if($result>0)
      @foreach($result as $results )

      <div class="row borderbotms">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicons">
            <h4>Name</h4>
           </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahsss">
          @if($results->recom_name == "")
           <p>...</p>
           @else
           <p>{{$results->recom_name}}</p>
           @endif
          </div>
        </div>
      </div>
      <div class="row borderbotms">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicons">
            <h4>Description</h4>
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
          @if($results->category == "")
          <p>...</p>
         @else
           <p>{{$results->category}}</p>
          	@endif
            
          </div>
        </div>
      </div>
      <div class="row borderbotms">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicons">
            <h4>Phone</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahsss">
          @if($results->phone == "")
         <p>...</p>
          @else
          <p>{{$results->phone}}</p>
        	@endif  
          </div>
        </div>
      </div>
      <div class="row borderbotms">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicons">
            <h4>Address</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahsss">
          @if($results->address == "")
         <p>...</p>
          @else
          <p>{{$results->address}}</p>
        	@endif  
          </div>
        </div>
      </div>
      <div class="row borderbotms">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicons">
            <h4>Specification</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahsss">
          @if($results->specification == "")
         <p>...</p>
          @else
          <p>{{$results->specification}}</p>
        	@endif  
          </div>
        </div>
      </div>
      <div class="row borderbotms">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicons">
            <h4>Rating</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahsss">
          @if($results->rating == "")
         <p>...</p>
          @else
          <p>{{$results->rating}}</p>
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