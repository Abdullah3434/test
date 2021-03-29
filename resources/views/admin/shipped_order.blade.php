@extends('admin.layouts.appadmin')
 
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
            <h4>Complete Order</h4>
          </div>
        </div>




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
                         
                          <option value="2">Deliver</option>
                          <option value="3">Cancell</option>
                          <option value="4">Return</option>
                        </select>
                      </div>
                     
                      <button id="active_order" type="button" class="btn btn-submmit">Submit</button>
                     
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
                      <th>Customer Name</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    @if($result>0)
                            @foreach($result as $results)
                      <td>{{$results->pk_id}}</td>
                      <td>{{$results->fname}}{{$results->lname}}</td>
                      @if($results->promo_amount == "")
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20">PKR {{number_format($results->amount)}}</div></td>
                          @else
                              <td><div class="sparkbar" data-color="#00a65a" data-height="20">PKR {{number_format($results->promo_amount)}}</div></td>
                          @endif
                          @if($results->status == 0)
                    <td><span id="{{$results->pk_id}}" onclick="getId(this.id)" class="label label-primary" data-toggle="modal" data-target="#myModal"style="cursor:pointer">In Progress</span></td>
                    @elseif($results->status ==1 )
                    <td><span id="{{$results->pk_id}}" onclick="getId(this.id)" class="label label-primary" data-toggle="modal" data-target="#myModal" style="cursor:pointer">Shipped</span></td>
                   
                    @elseif($results->status ==2 )
                    <td><span id="{{$results->pk_id}}" onclick="getId(this.id)" class="label label-primary" data-toggle="modal" data-target="#myModal" style="cursor:pointer"> Delivered</span></td>
                   
                    @elseif($results->status ==3 )
                    <td><span id="{{$results->pk_id}}" onclick="getId(this.id)" class="label label-primary" data-toggle="modal" data-target="#myModal" style="cursor:pointer">Cancelled</span></td>
                   
                    @elseif($results->status ==4 )
                    <td><span id="{{$results->pk_id}}" onclick="getId(this.id)" class="label label-primary" data-toggle="modal" data-target="#myModal" style="cursor:pointer">Returned</span></td>
                    </tr>
                    
                    @endif
                      <td>{{$results->placed_at}}</td>
                       <td><a href="{{url('/')}}/admin/home/view/shipped/order/view/specific/order/{{$results->pk_id}}">View</a></td>
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
    
      <!-- footer content -->
   @endsection