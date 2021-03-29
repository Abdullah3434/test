@extends('admin.layouts.appadmin')
@section('content') 
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Recommendation Management</h3>
        <h4 style="display: block;">Add Recommendation</h4>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <form method="post" action="{{URL('/')}}/admin/home/add/recommendation" class="login-form" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="alert alert-danger"> <strong></strong> Error Message </div>
          <div class="productbox">
            <div class=" col-md-6">
              <div class="form-login">
                <label for="text">Name</label>
                <input type="text" name="recom_name" class="form-control input-sm chat-input" placeholder="Name" />
                <label for="text">Category</label>
               
                <select class="form-control" name="category" id="mainCategory"  >
                <option value="" disable="true" selected="true" >Select Category</option>
                @if($result>0)
                        @foreach($result as $results)
                       
                  <option value="{{$results->category}}"   >{{$results->category}}</option>
                  @endforeach
            @endif
                </select>
              
                <label for="text">Phone</label>
                <input type="tel" name="phone" class="form-control input-sm chat-input" placeholder="Phone" />
                <label for="text">Address</label>
                <input type="text" name="address" class="form-control input-sm chat-input" placeholder="Address" />
                <label>Rating</label>
                <fieldset class="rating" >
                  <input type="radio" id="star5" name="rating" value="5" />
                  <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                  <input type="radio" id="star4" name="rating" value="4" />
                  <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                  <input type="radio" id="star3" name="rating" value="3" />
                  <label class = "full" for="star3" title="Meh - 3 stars"></label>
                  <input type="radio" id="star2" name="rating" value="2" />
                  <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                  <input type="radio" id="star1" name="rating" value="1" required/>
                  <label class = "full" for="star1" title="Sucks big time - 1 star" ></label>
                </fieldset>
                
                <div class="form-group">
                <div class="clearfix"></div>
                  <label for="comment">Description</label>
                  <textarea class="form-control" name="description" rows="9" id="comment"></textarea>
                </div>
                <div class="form-group">
                  <label for="comment">Specification</label>
                  <textarea class="form-control" name="specification" rows="9"></textarea>
                </div>
              </div>
            </div>
            <div class=" col-md-4">
              <div class="form-login">
                <label for="text">Image</label>
                <div class="form-group">
                  <input type="file" name="thumbnail" class="form-control" onchange="readURL(this);"/>
                  <img id="blah" src="{{url('/')}}/images/demo.png" alt="your image" style="width:350px; height:300px;" /> </div>
                <div class="form-group">
                  <input type="file" name="thumbnail2" class="form-control" onchange="preview_image(this);"/>
                  <img id="blah2" src="{{url('/')}}/images/demo.png" alt="your image" style="width:350px; height:300px;"/> </div>
                <div class="form-group">
                  <input type="file" name="thumbnail3" class="form-control" onchange="preview_img(this);"/>
                  <img id="blah3" src="{{url('/')}}/images/demo.png" alt="your image" style="width:350px; height:300px;"/> </div>
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

@endsection 