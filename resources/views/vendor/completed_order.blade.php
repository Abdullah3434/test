@extends('vendor.layouts.appvendor')
 
 @section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Order Management</h3>
            <h4>Complete Order</h4>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>O-ID</th>
                      <th>Customer Name</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if(count($result)>0)
                        @foreach($result as $results)
                        <tr>
                          <td>{{$results->order_id}}</td>
                          <td>{{$results->product_name}}</td>
              
                 
                  
                      <td>PKR {{number_format($results->price)}}</td>
                             <!-- <td>PKR {{number_format($results->discount_price)}}</td>
                             @if($results->percentage > 0)
                                <td>{{$results->percentage}}%</td>
                                @else
                                  <td> .....</td>
                                  @endif -->
                                  
                                 
                          <td><span class="label label-warning" >Delivered</span></td>
                    
                        
                        

                          <td>{{$results->created_at}}</td>
                                     
                          
                          
                          <td><a href="{{url('/')}}/vendor/home/view/complete/order/view/specific/order/{{$results->product_id}}/{{$results->order_id}}">View</a></td>
                          
                        </tr>
                        @endforeach
                        @endif
                  </tbody>
                </table>
              </div>
          </div>
          
        </div>
      </div>
    </div>
    <!-- /page content --> 
    @endsection