
  @extends('admin.layouts.appadmin')
 
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
          <h3>Order Managment</h3>
            <h4>View Shipped Order</h4>
          </div>
        </div>
        <div class="clearfix"></div>
          <div class="row">
             @if($result>0)
                        @foreach($result as $results)
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_content">
                <div class="member-left-side">
                  <div class="member-email clearfix"> <b>O-ID</b> <span>{{$results->pk_id}}</span> </div>
                  <div class="member-email clearfix"> <b>Customer Name</b> <span>{{$results->fname}} {{$results->lname}}</span> </div>
                  
                  <div class="member-email clearfix"> <b>Price</b> <span>PKR {{number_format($results->amount)}}</span> </div>
                  
                  <div class="member-email clearfix"> <b>Payment Method</b> <span>COD</span> </div>
                  
                  <div class="member-email clearfix"> <b>Shippment Address</b> <span>{{$results->address}}</span> </div>
                  <div class="member-email clearfix"> <b>Status</b> <span> @if($results->status==0)
                  IN progress
                  @elseif($results->status==1)
                  Shipped
                   @elseif($results->status==2)
Delivered                  
@elseif($results->status==3)
Cancelled
@elseif($results->status==4)
Returned
@endif </span> </div>
                  
                  <div class="member-email clearfix"> <b>Phone</b> <span>{{$results->phone}}</span> </div>
                </div>
                <div class="col-md-6"> <a href="active_order.html" class="btn btn-success">Back</a> </div>
              </div>
            </div>
          </div>
          @endforeach
                        @endif 
        </div>
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_content">
                <table id="datatable-responsive" class="table table-condense dt-responsive" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>SKU</th>
                      <th>P-Name</th>
                      <th>Price</th>
                    
                      <th>Vedor Name</th>
                    
                      <th>Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                         @if(count($result1)>0)
                          @foreach($result1 as $results)
                    <tr>
                      <td>{{$results->SKU}}</td>
                            <td>{{$results->product_name}}</td>
                     <td>PKR {{number_format($results->price)}}</td>
                     
                      <td>{{$results->vendor_id}}</td>
                     
                     <td>{{$results->quantity}}</td>
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
   
      <!-- footer content -->
   @endsection
 