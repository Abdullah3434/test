@extends('admin.layouts.appadmin')
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
        <div class="page-title">
           <h2>Total Revenue : {{$total}} </h2>
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
                           @php
                        $a = $results->order_id;
                             $result1 = DB::select("select * from order_table where pk_id = '$a' and status = '2'");
                        @endphp
                         @if(count($result1)>0)
                  
                        <tr>          
                          <td>{{$results->SKU}}</td>
                          <td>{{$results->order_id}}</td>
                          <td>{{$results->quantity}}</td>
                          <td>PKR {{$results->price}}</td>
                          @if($results->discount_price == "")
                           <td></td>
                          @else
                               <td>PKR {{$results->discount_price}}</td>
                               @endif
                          <td>{{$results->size}}</td>
                          
                        </tr>
                        @endif
                          
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