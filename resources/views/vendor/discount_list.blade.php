@extends('vendor.layouts.appvendor')
 
@section('content')
      
      <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
            <div class="col-md-10 col-sm-12 col-xs-12">
          <div class="title_left">
            <h3>Discount Management</h3>
            <h4>Discount List</h4>
          </div>
          </div>
          <div class="col-md-2 col-sm-12 col-xs-12">
          <div class="title_left">
            <a  href="{{URL('/')}}/vendor/home/add/discount" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Discount</a>
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
                          <th>P-Code</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                         
                          <th>Discount Amount </th>
                          <th>More Options </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      @if(count($result)>0)
                        @foreach($result as $results)
                      <tr>
                        <td>{{$results->SKU}}</td>
                        <td>{{$results->start_date}}</td>
                        <td>{{$results->end_date}}</td>
                      
                          <td>{{$results->percentage}}%</td>
                        <td> <a href="{{url('/')}}/admin/home/view/discount/{{$results->pk_id}}"  style="margin-left:10px;">View</a>  <a href="{{url('/')}}/admin/home/delete/discount/{{$results->pk_id}}"  style="margin-left:10px;">Delete</a></td>

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