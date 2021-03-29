@extends('admin.layouts.appadmin')
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="page-title">
        <div class="title_left">
          <h3>Promo Code Management</h3>
            <h4 style="display:block;">Promo Code View</h4>
        </div>
      </div>
      @if(count($result)>0)
                          @foreach($result as $results)
      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>P-CODE</h4>
           </div>
        </div>
        
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
            <p >{{$results->promo_code}}</p>
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
          
            <p >{{$results->start_date}}</p>
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
            <p>{{$results->end_date}}</p>
            
          </div>
        </div>
      </div>
      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Discount Type</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
            <p>{{$results->discount_type}}</p>
            
          </div>
        </div>
      </div>
      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Discount Amount</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
            <p>{{$results->discount_amount}}</p>
            
          </div>
        </div>
      </div>
      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Status</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
            @if($results->status == '0')
            <p>IN Active</p>
            @else
            <p>Active</p>
            @endif
          </div>
        </div>
    
      </div>
      
        @endforeach
                        @endif
                        
                          @if($result>0)
       @foreach($result as $results)
       <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Discount For</h4>
            </div>
        </div>
      
    
       <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
           
                        <p>{{$results->discount_for}}</p>
                       
          </div>
        </div>
     
      </div>
      @endforeach
                        @endif
    </div>
    <!-- /page content --> 
    
    @endsection 