
    @extends('vendor.layouts.appvendor')
 
 @section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="col-md-10 col-sm-12 col-xs-12">
          <div class="title_left">
           <h3>Product Management</h3>
            <h4>Product</h4>
          </div>
          </div>
          <div class="col-md-2 col-sm-12 col-xs-12">
          <div class="title_left">
           <a href="{{URL('/')}}/vendor/home/add/product" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Product</a>
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
                      <th>SKU</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Category</th>
                      <th>Sub Category</th>
                      <th>Is Active?</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if($result>0)
                    @foreach($result as $results)
                    <tr>          
                      <td>{{$results->SKU}}</td>
                      <td>{{$results->name}}</td>
                      <td>{{$results->price}}</td>
                      <td>{{$results->main_category}}</td>
                      <td>{{$results->sub_category}}</td>
                    
                      <td><div class="switch">
                        <input @if($results->status==1) checked @endif  onchange="updateStatus(this.id)" id="cmn-toggle-{{$results->pk_id}}" class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                        <label for="cmn-toggle-{{$results->pk_id}}"></label>
                        </div></td>

                        
                        @if($results->	v_product_status == 1)
                      <td><span id="{{$results->pk_id}}" onclick="getId(this.id)" class="label label-danger" data-toggle="modal" data-target="#myModal">Pending</span></td>
          
          @elseif($results->	v_product_status == 2)
            <td><span id="{{$results->pk_id}}" onclick="getId(this.id)" class="label label-primary" data-toggle="modal" data-target="#myModal">Active</span></td>
              @else
            <td><span id="{{$results->pk_id}}" onclick="getId(this.id)" class="label label-warning" data-toggle="modal" data-target="#myModal">Cancelled</span></td>
           @endif
                      <td><a href="{{url('/')}}/vendor/home/edit/product/{{$results->pk_id}}">Edit</a><a href="{{url('/')}}/vendor/home/view/product/{{$results->pk_id}}" style="margin-left:10px;">View</a><a href = "{{url('/')}}/vendor/home/delete/product/{{$results->pk_id}}" style="margin-left:10px;">Delete</a></td>

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