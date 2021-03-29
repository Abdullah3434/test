
    @extends('admin.layouts.appadmin')
    @section('content')
        
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="page-title">
        <div class="title_left">
          <h3>Discount Management</h3>
            <h4 style="display:block;">Discount View</h4>
        </div>
      </div>
      @if($result>0)
      @foreach($result as $results )
      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Sku</h4>
           </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
          @if($results->sku == "")
           <p>...</p>
           @else
           <p>{{$results->sku}}</p>
           @endif
          </div>
        </div>
      </div>
      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Start Date</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
          
          @if($results->start_date == "")
           <p>...</p>
           @else
           <p>{{$results->start_date}}</p>
           @endif
          </div>
        </div>
      </div>
      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>End Date</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
          @if($results->end_date == "")
           <p>...</p>
           @else
           <p>{{$results->end_date}}</p>
           @endif
            
          </div>
        </div>
      </div>
      <!-- <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Price</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
            <p>220</p>
            
          </div>
        </div>
      </div> -->
      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Discount in Percentage</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
          @if($results->percentage == "")
           <p>...</p>
           @else
           <p>{{$results->percentage}}</p>
           @endif
            
          </div>
        </div>
      </div>
      
    </div>
    @endforeach
        @endif
    <!-- /page content --> 
    @endsection