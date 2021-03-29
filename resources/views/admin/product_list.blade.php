@extends('admin.layouts.appadmin')
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
          @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>  
    @endif
          <div class="col-md-2 col-sm-12 col-xs-12">
          <div class="title_left">
           <a href="{{URL('/')}}/admin/home/add/product" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Product</a>
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
                        <input @if($results->status==1) checked @endif   id="cmn-toggle-{{$results->pk_id}}" class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                        <label for="cmn-toggle-{{$results->pk_id}}"></label>
                        </div></td>
                      
                      <td>
                      <a href="{{url('/')}}/admin/home/view/product/{{$results->pk_id}}">View</a>
                      <a href="{{url('/')}}/admin/home/edit/product/{{$results->pk_id}}">Edit</a>
                      <a href = "{{url('/')}}/admin/home/delete/product/{{$results->pk_id}}" class="red">Delete</a>
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
    <!-- <script>
    function updateStatus(id)
    {
      CheckBox = id;
      id = id.split("-");
      id = id[2];
      cstatus = document.getElementById(CheckBox).checked;
      status= 0;
    
    if(cstatus)
      {
        status = 1;
      }
      else
      status=0;
      
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               alert("status updated");
            }
        };
        xmlhttp.open("GET", "{{URL('/')}}/admin/home/view/product/status/update/"+id+"/"+status, true);
        xmlhttp.send();
    
    }
    </script> -->