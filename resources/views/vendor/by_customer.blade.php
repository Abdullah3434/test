@extends('vendor.layouts.appvendor')
 
 @section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
           <h3>Reporting Management</h3>
            <h4>By Customer</h4>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
                <table id="datatable-responsive" class="table table-condense dt-responsive" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>O-ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>User Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if($result>0)
                        @foreach($result as $results )
                        <tr>   
                                <td>{{$results->pk_id}}</td>       
                          <td>{{$results->fname}} </td>
                         <td> {{$results->lname}} </td>
                         <td> {{$results->username}} </td>
                          <td><a href="{{URL('/')}}/vendor/home/view/detail/reporting/by/customer/{{$results->pk_id}}">View</a>
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