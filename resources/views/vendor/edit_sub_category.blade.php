@extends('vendor.layouts.appvendor')
 
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Product Management</h3>
            <h4 style="display: block;">Add Sub Category</h4>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
              @if($result1>0)
                @foreach($result1 as $results)
                    <form method="post" action = "{{url('/')}}/vendor/home/edit/sub/category/{{$results->SKU}}" class="login-form">
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
                      <label for="text">Main Categoery Name</label>
            <select class="form-control" name="mainCategory">
                @if($result>0)
                @foreach($result as $results)
                       <option value="{{$results->main_category}}">{{$results->main_category}}</option>
                       @endforeach
       @endif
                   </select> <br>
                      </div>
                      
                      <div class="form-group col-lg-12 col-sm-12 col-md-12">
                        <label>Category Sub Type</label>
                        @if($result1>0)
            @foreach($result1 as $results)
            <input type="text" id="Main category Name" name="subCategory" class="form-control"  value="{{$results->sub_category}}" placeholder="Sub Categoery Name" />
            @endforeach
            @endif
                       
                      </div>
                      
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                        <button id="send" type="submit" class="btn btn-success btn-lg">Submit</button>
                </div>
                </div>
                
                </form>
                @endforeach
        @endif
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content --> 
      
  @endsection