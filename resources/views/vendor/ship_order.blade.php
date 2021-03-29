@extends('vendor.layouts.appvendor')
 
 @section('content')
 <script>
  var OrgID=-1;
    function getId(id)
    {
  
      
      OrgID = id;
      return true;
    }
    function getreal()
    {
      alert(OrgID);
      
     
    }
    
    
  
  </script>
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Order Management</h3>
            <h4>Active Order</h4>
          </div>
        </div>

        <div class="box-body">
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                      
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Status Change</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Update Status</label>
                                    <select id="status" name="status" class="form-control">
                                        <option>Select status</option>
                                        <option value="5">Returned</option>
                                        <option value="4">Deliverd</option>
                                        <option value="3">Cancelled</option>
                                       
                                       
                                        <option value="1">In Progress</option>
                             
                                     
                                    </select>
                             </div>
                             <button id="b1" type="button" class="btn btn-submmit">Submit</button>
                            </div>
                          </div>
                      
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
                      <th>Product Name</th>
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
                                  
                                  @if($results->v_order_status == 0)
                          <td><span id="{{$results->pk_id}}" onclick="getId(this.id)" class="label label-warning" data-toggle="modal" data-target="#myModal">In progress</span></td>
             
                          @elseif($results->v_order_status == 2)
                          <td><span id="{{$results->pk_id}}" onclick="getId(this.id)" class="label label-warning" data-toggle="modal" data-target="#myModal">Shipped</span></td>
                    
                        
                          @endif

                          <td>{{$results->created_at}}</td>
                                     
                          
                          
                          <td><a href="{{url('/')}}/vendor/home/view/active/order/view/specific/order/{{$results->product_id}}/{{$results->order_id}}">View</a></td>
                          
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