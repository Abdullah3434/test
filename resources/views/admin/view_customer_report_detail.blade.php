 
    @extends('admin.layouts.appadmin')
    @section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
           <h3>Reporting Management</h3>
            <h4>View By Customer</h4>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="page-title">
           <h2>Total Revenue : {{$sum}} </h2>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
                <table id="datatable-responsive" class="table table-condense dt-responsive" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>O-ID</th>
                      <th>Customer Name</th>
                      <th>Placed</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if($result>0)
                        @foreach($result as $results )
                        <tr>   
                                <td>{{$results->pk_id}}</td>       
                          <td>{{$results->fname}} {{$results->lname}}</td>
                          <td>{{$results->username}}</td>
                          <td>{{$results->placed_at}}</td>

                          <td>delivered</td>
                      

                          <td>{{$results->amount}}</td>
                    
                            </td>
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