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
        <!-- <div class="clearfix"></div>
        <div class="page-title">
           <h2>Total Revenue : 2545rs </h2>
        </div> -->
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
                <table id="datatable-responsive" class="table table-condense dt-responsive" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>SKU</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Category</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if($result>0)
                        @foreach($result as $results )
                        <tr>          
                          <td>{{$results->SKU}}</td>
                          <td>{{$results->name}}</td>
                          <td>{{$results->price}}</td>
                          <td>{{$results->main_category}}</td>
                          
                          <td><a href="{{URL('/')}}/admin/home/view/detail/reporting/by/products/{{$results->pk_id}}">View</a>
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