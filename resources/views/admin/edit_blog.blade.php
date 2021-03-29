@extends('admin.layouts.appadmin')
@section('content') 

<script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
<!-- page content -->
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
           @if($result>0)
        <form method="post" action="{{URL('/')}}//admin/home/edit/blog/{{$result[0]->pk_id}}" class="login-form" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="alert alert-danger"> <strong></strong> Error Message </div>
          <div class="productbox">
            <div class=" col-md-6">
              <div class="form-login">
                <label for="text">Name</label>
                <input type="text" name="name" class="form-control input-sm chat-input"value="{{$result[0]->name}}" />
              
              
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
                         <textarea name="body" id="" value="{{$result[0]->description}}" cols="90" rows="10">{{$result[0]->description}}</textarea>
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
<input type='file' name="file" class="form-control" value="{{url('/')}}/storage/images/{{$result[0]->thumbnail}}" onchange="readURL(this);"/>
<img id="blah" src="{{url('/')}}/storage/images/{{$result[0]->thumbnail}}" alt="your image"style="width:180px; height:180px;" />
</div>


                <br>
                <span class="group-btn">
                <button class="btn btn-default btn-md" name="submit" type="submit"> Add </button>
                </span> </div>
            </div>
          </div>
        </form>
         @endif
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