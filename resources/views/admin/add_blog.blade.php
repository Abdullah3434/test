@extends('admin.layouts.appadmin')
@section('content') 
<!-- page content -->

<script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Blog Management</h3>
        <h4 style="display: block;">Add Blog</h4>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <form method="post" action="{{URL('/')}}/admin/home/add/blog" class="login-form" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="alert alert-danger"> <strong></strong> Error Message </div>
          <div class="productbox">
            <div class=" col-md-6">
              <div class="form-login">
                <label for="text">Name</label>
                <input type="text" name="name" class="form-control input-sm chat-input" placeholder="Name" />
              
              
                <!--<label for="text">Phone</label>-->
                <!--<input type="tel" name="phone" class="form-control input-sm chat-input" placeholder="Phone" />-->
                <!--<label for="text">Address</label>-->
                <!--<input type="text" name="address" class="form-control input-sm chat-input" placeholder="Address" />-->
                
                
              
                
                
                  
                        <div class="form-group ">
                         <label class="control-label requiredField" for="name">
                         Body
                          <span class="asteriskField">
                           *
                          </span>
                         </label>
                         <div class="input-group">
                          <div class="input-group-addon">
                           <i class="fa fa-user">
                           </i>
                          </div>
                         <textarea name="body" id="" cols="90" rows="10"></textarea>
                         <script>
                                CKEDITOR.replace( 'body' );
                            </script>
                         </div>
                        </div>
                       

              </div>
            </div>
            <div class=" col-md-4">
              <div class="form-login">
                <label for="text">Image</label>
                <div class="form-group">
                  <input type="file" name="file1" class="form-control" onchange="readURL(this);"/>
                  <img id="blah" src="{{url('/')}}/images/demo.png" alt="your image" style="width:350px; height:300px;" /> </div>
               
                <br>
                <span class="group-btn">
                <button class="btn btn-default btn-md" name="submit" type="submit"> Add </button>
                </span> </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /page content --> 


 <!-- jQuery -->
    <script src="{{URL('/')}}/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{URL('/')}}/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{URL('/')}}/build/js/custom.min.js"></script>


@endsection 