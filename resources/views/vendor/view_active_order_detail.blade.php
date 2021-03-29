@extends('vendor.layouts.appvendor')
 
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
          <h3>Order Managment</h3>
            <h4>View Active Order</h4>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_content">
                <div class="member-left-side">
                @if($result2>0)
                                @foreach($result2 as $results)
                  <div class="member-email clearfix"> <b>O-ID</b> <span>{{$results->pk_id}}</span> </div>
                  <div class="member-email clearfix"> <b>Customer Name</b> <span>{{$results->fname}} {{$results->lname}}</span> </div>
                  
                  <div class="member-email clearfix"> <b>Price</b> <span>PKR {{number_format($results->amount)}}</span> </div>
                  
                  <div class="member-email clearfix"> <b>Payment Method</b> <span>Online</span> </div>
                  
                  <div class="member-email clearfix"> <b>Shippment Address</b> <span>{{$results->address}}</span> </div>
                  <div class="member-email clearfix"> <b>Phone</b> <span>{{$results->phone}}</span> </div>
                  @endforeach
                  @endif
                
                  @foreach($result1 as $results)
                  @if($results->v_order_status == 0)
                  <div class="member-email clearfix"> <b>Status</b> <span class="label label-primary">In progress</span> </div>
                  @elseif($results->v_order_status ==1 )
                  <div class="member-email clearfix"> <b>Status</b> <span class="label label-success">Shipped</span> </div>
                  @elseif($results->v_order_status ==2 )
                  <div class="member-email clearfix"> <b>Status</b> <span class="label label-danger">Confirmed</span> </div>
                            
                     @endif
                  @endforeach
                 
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
                      <!-- <th>Status</th> -->
                      <th>Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if($result1>0)
                                @foreach($result1 as $results)

                                <td>{{$results->SKU}}</td>
                                <td>{{$results->name}}</td>
                                <td>{{$results->price}}</td>
                                <td>{{$results->size}}</td>
                                <td>{{$results->vendor_id}}</td>
                                <!-- @if($results->status ==0)
                                <td ><label class="label label-primary">in progress</label></td>
                                @elseif($results->status ==1 )
                                <td ><label class="label label-success">Shipped</label></td>
                                @elseif($results->status ==2 )
                                <td ><label class="label label-danger">Cancelled</label></td>
                                @endif -->
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