@extends('admin.layouts.appadmin')
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Product Management</h3>
            <h4 style="display: block;">Add Brand</h4>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
              
              <form method="post" action = "{{url('/')}}/admin/home/add/brand" class="login-form" enctype="multipart/form-data">
              {{ csrf_field() }}
              @if($errors->any())

                            
<div class="alert alert-danger">
  <strong>Danger!</strong> {{$errors->first()}}
</div>
	@endif

              <div class="row">
                <div class="col-lg-5">
                    <div class="row">
                      <div class="form-group col-lg-12 col-sm-12 col-md-12">
                        <label>Brand</label>
                        <input type="text" class="form-control" name="brandname" placeholder="Brand" pattern="[a-zA-Z0-9\s]+" maxlength="50" required>
                      </div>
                      
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                        <button type="submit" class="btn btn-success btn-lg">Submit</button>
                </div>
                </div>
                
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content --> 
      
    @endsection 