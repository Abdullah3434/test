@extends('vendor.layouts.appvendor') 
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="col-md-10 col-sm-12 col-xs-12">
          <div class="title_left">
           <h3>Category Management</h3>
            <h4>Category</h4>
          </div>
          </div>
          <div class="col-md-2 col-sm-12 col-xs-12">
          <div class="title_left">
           <a href="{{URL('/')}}/vendor/home/add/main/category" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Category</a>
          </div>
          </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
                <table id="datatable-responsive" class="table table-condense dt-responsive" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Category Name</th>
                      <th>User Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  @if($result>0)
                          @foreach($result as $results)
                          <tr>          
                            <td>{{$results->SKU}}</td>
                            <td>{{$results->main_category}}</td>
                                      <td>{{$results->username}}</td>
                            <td><a href="{{URL('/')}}/vendor/edit/main/category/{{$results->SKU}}">Edit</a>
                                <a href="{{URL('/')}}/vendor/home/delete/main/category/{{$results->SKU}} " style="margin-left:10px;">Delete</a></td>
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