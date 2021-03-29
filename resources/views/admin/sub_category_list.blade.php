@extends('admin.layouts.appadmin')
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="col-md-10 col-sm-12 col-xs-12">
          <div class="title_left">
           <h3>Category Management</h3>
            <h4>Sub Category</h4>
          </div>
          </div>
          <div class="col-md-2 col-sm-12 col-xs-12">
          <div class="title_left">
           <a href="{{URL('/')}}/admin/home/add/sub/category" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Sub Category</a>
          </div>
          </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
                <table id="datatable-responsive" class="table table-condense dt-responsive" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>ID_No</th>
                      <th>Category</th>
                      <th>Sub Category</th>
                        <th>Username</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if($result>0)
                                @foreach($result as $results)
                                <tr>          
                                  <td>{{$results->SKU}}</td>
                                  <td>{{$results->main_category}}</td>
                                  <td>{{$results->sub_category}}</td>
                                        <td>{{$results->username}}</td>
                                  <td><a href="{{URL('/')}}/admin/home/edit/sub/category/{{$results->SKU}}">Edit</a>
                                      <a href="{{URL('/')}}/admin/home/delete/sub/category/{{$results->SKU}}" style="margin-left:10px;">Delete</a></td>
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