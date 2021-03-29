@extends('vendor.layouts.appvendor')
 
 @section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
           <h3>Reporting Management</h3>
            <h4>By Product</h4>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
                <table id="datatable-responsive" class="table table-condense dt-responsive" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>SKU</th>
                      <th>Order ID</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                      <th>Discount Price</th>
                      <th>Size</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if(count($result)>0)
                        @foreach($result as $results )
                        <tr>          
                          <td>{{$results->SKU}}</td>
                          <td>{{$results->order_id}}</td>
                          <td>{{$results->quantity}}</td>
                              <td>{{$results->price}}</td>
                             <td>{{$results->discount_price}}</td>
                             @if($results->percentage > 0)
                                <td>{{$results->percentage}}%</td>
                                @else
                                  <td> </td>
                                  @endif
                          <td>{{$results->size}}</td>
                          
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