@extends('admin.layouts.appadmin')
 
 @section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Vendor Management</h3>
            <h4>Vendor Reporting</h4>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
                <table id="datatable-responsive" class="table table-condense dt-responsive" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Vendor ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      
                      <th>Store Name</th>
                      <th>Phone</th>
                      <th>Total Eraning</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if(count($result)>0)
                        @foreach($result as $results)
                        <tr>
                          <td>{{$results->id}}</td>
                          <td>{{$results->fname}} {{$results->lname}}</td>
                          <td>{{$results->email}}</td>
                          <td>{{$results->store_name}}</td>
                          <td>{{$results->phone}}</td>
                                    <td>PKR {{number_format($results->total_earned)}}</td>
              
                  
                          
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