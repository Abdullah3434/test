
      @extends('admin.layouts.appadmin')
@section('content')
      <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
            <div class="col-md-10 col-sm-12 col-xs-12">
          <div class="title_left">
            <h3>Promo Code Management</h3>
            <h4>Promo Code List</h4>
          </div>
          </div>
          <div class="col-md-2 col-sm-12 col-xs-12">
          <div class="title_left">
            <a href="{{URL('/')}}/admin/home/add/promo" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Promo Code</a>
          </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
              <table id="datatable-responsive" class="table table-condense dt-responsive" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>P_Code</th>
                          <th>Discount Type</th>
                           
                            <th>Promo Use Time</th>
                          <th>Discount Amount</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                         
                            <th>Is Active?</th>
                             <th> Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      @if(count($result1)>0)
                          @foreach($result1 as $results)
                        <tr>
                           <td>{{$results->promo_code}}</td>
                          <td>{{$results->discount_type}}</td>
                          <td>{{$results->use_time}}</td>
                          <td>{{$results->discount_amount}}</td>
                         <td>{{$results->start_date}}</td>
                           <td>{{$results->end_date}}</td>
                           <!-- <td>{{$results->min_total}}</td>
                           <td>{{$results->max_total}}</td> -->
                           <td><div class="switch">
                                <input @if($results->status==0) checked @endif  onchange="updateStatus(this.id)" id="cmn-toggle-{{$results->pk_id}}" class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                                <label for="cmn-toggle-{{$results->pk_id}}"></label>
                                </div>
                          </td>
                          <td>
                          @foreach($result1 as $results)
                          <a href="{{url('/')}}/admin/home/view/promo/detail/{{$results->pk_id}}">view </a>
                         
                          <td>
                          <a href="{{url('/')}}/admin/home/delete/promo/{{$results->pk_id}}">Delete</a></td>
                          @endforeach
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