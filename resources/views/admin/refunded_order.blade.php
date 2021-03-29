
    @extends('admin.layouts.appadmin')
 
 @section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Order Management</h3>
            <h4>Refunded Order</h4>
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
                      <td><label class="label label-info">Refunded</label></td>
                      <td>{{$results->placed_at}}</td>
                      <td><a href="{{url('/')}}/admin/home/view/return/order/view/specific/order/{{$results->pk_id}}">View</a></td>
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