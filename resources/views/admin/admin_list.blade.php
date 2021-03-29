@extends('admin.layouts.appadmin')
@section('content')
<!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
            <div class="col-md-10 col-sm-12 col-xs-12">
          <div class="title_left">
            <h3>Admin Management</h3>
            <h4>Admin</h4>
          </div>
          </div>
          <div class="col-md-2 col-sm-12 col-xs-12">
          <div class="title_left">
            <a href="{{url('/')}}/admin/home/create/admin" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Admin</a>
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
                      
                      <th>Admin Name</th>
                      <th>Permisions</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if($result>0)
                          @foreach($result as $results)
                          <tr>
                         
                            <td>{{$results->fname}} {{$results->lname}}</td>
                            <td>
                            @if($results->admin_management==1)
                            <span class="label label-success">Admin Management</span>
                            @endif

                          @if($results->product_management==1)
                            <span class="label label-success">Product Management</span>
                            @endif
                            @if($results->category_management==1)
                          <span class="label label-primary">Category Management</span>
                          @endif
                          
                           @if($results->brand_management==1)
                          <span class="label label-warning">Brand anagemen</span>
                            @endif
                          @if($results->order_management==1)
                            <span class="label label-success">Order Management</span>
                            @endif
                            @if($results->reporting==1)
                          <span class="label label-primary">Reporting</span>
                          @endif
                          
                           @if($results->discount==1)
                          <span class="label label-warning">Discount</span>
                            @endif
                          @if($results->promocode==1)
                            <span class="label label-success">Promocode</span>
                            @endif
                            @if($results->vendor_management==1)
                          <span class="label label-primary">Vendor Management</span>
                          @endif
                          @if($results->coaching_management==1)
                          <span class="label label-warning">Coaching Management</span>
                          @endif
                        </td>
                          <td>
                            <a href="{{URL('/')}}/admin/home/view/admin/{{$results->pk_id}}" style="margin-right:20px;">View</a>
                            <a href="{{url('/')}}/admin/home/view/admin/edit/admin/{{$results->pk_id}}" >Edit</a>
                            <a href="{{URL('/')}}/admin/home/delete/admin/{{$results->pk_id}}" >Delete</a>
                        
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