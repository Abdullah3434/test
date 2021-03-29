
    @extends('vendor.layouts.appvendor')
 
 @section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
          <h3>Order Managment</h3>
            <h4>View Complete Order</h4>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_content">
                <div class="member-left-side">
                @if($result1>0)
                                @foreach($result1 as $results)
                  <div class="member-email clearfix"> <b>O-ID</b> <span>{{$results->pk_id}}</span> </div>
                  <div class="member-email clearfix"> <b>Customer Name</b> <span>{{$results->fname}} {{$results->lname}}</span> </div>
                  
                  <div class="member-email clearfix"> <b>Price</b> <span>PKR {{number_format($results->amount)}}</span> </div>
                  
                  <div class="member-email clearfix"> <b>Payment Method</b> <span>Online</span> </div>
                  <div class="member-email clearfix"> <b>Status</b> <span class="label label-primary">Delivered</span> </div>
                  <div class="member-email clearfix"> <b>Shippment Address</b> <span>{{$results->address}}</span> </div>
                  <div class="member-email clearfix"> <b>Phone</b> <span>{{$results->phone}}</span> </div>
                  @endforeach
                  @endif
                
                </div>
                <div class="col-md-6"> <a href="active_order.html" class="btn btn-success">Back</a> </div>
              </div>
            </div>
          </div>
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
                      <th>Size</th>
                      <th>Vedor Name</th>
                    
                      <th>Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  @if($result>0)
                                @foreach($result as $results)

                                <td>{{$results->SKU}}</td>
                                <td>{{$results->name}}</td>
                                <td>{{$results->price}}</td>
                                <td>{{$results->size}}</td>
                                <td>{{$results->vendor_id}}</td>
                                @endforeach
                                @endif
                                @if($result1>0)
                                @foreach($result1 as $results)

                                <td>{{$results->quantity}}</td>




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