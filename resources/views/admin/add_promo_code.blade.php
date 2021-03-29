
      @extends('admin.layouts.appadmin')
@section('content')
      <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Promo Code Management</h3>
            <h4 style="display: block;">Add Promo Code</h4>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
              <form method="post" action = "{{url('/')}}/admin/home/add/promo" class="login-form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                    <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Promo Code</label>
                        <input type="text" class="form-control" name="promo" placeholder="Enter Promo Code" pattern="[a-zA-Z0-9\s]+" maxlength="20" >
                      </div>
                      
                      <div class=" col-md-6">
                    <div class="form-login">
                      <label for="text">Promo Use Time</label>
                      <input type="text" id="use_time" name="use_time" class="form-control input-sm chat-input" placeholder="Promo Code " />
                      <label for="text">
                      </div> </div>
                      
                      <div class="form-group">
                        <label>Discount Amount</label>
                        <input type="number" class="form-control" name="discount" placeholder="Enter Discount" min="1" max="2000" >
                      </div>
                      <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" class="form-control" name="start_date" placeholder="Enter Start Date" pattern="[a-zA-Z0-9\s]+" maxlength="20" >
                      </div>
                      <div class="form-group">
                        <label>End Date</label>
                        <input type="date" class="form-control" name="end_date" placeholder="Enter End Date" pattern="[a-zA-Z0-9\s]+" maxlength="20" >
                      </div>
                      <div class="form-group">
                        <label>Min Sub Total</label>
                        <input type="number" class="form-control" name="min" placeholder="Enter Discount" min="1" max="2000" >
                      </div>
                      <div class="form-group">
                        <label>Max Sub Total</label>
                        <input type="number" class="form-control" name="max" placeholder="Enter Discount" min="1" max="2000" >
                      </div>
                      </div>
                      <div class="col-lg-6">
                      <div class="form-group">
                      <label>Is Active?</label><br>
                      <label class="switch">
                          <input type="checkbox"  name="status" checked>
                          <span class="slider round"></span>
                        </label>
                      </div>
                      <div class="form-group">
                      <label>Discount Type</label>
                      <div class="radio">
                          <label><input type="radio" value="1" name="radio" checked>Fixed</label>
                        </div>
                        <div class="radio">
                          <label><input type="radio" value="2" name="radio">Percentage</label>
                        </div>
                        </div>
                        <div class="form-group">
                      <label>Apply Discount For</label>

                     
                        <!-- <label>SKU</label>
                        <select class="form-control" id="product type" value="6" name="username"  >
                  @if(count($result)>0)
                        @foreach($result as $results )
                            <option value="{{$results->username}}">{{$results->username}}</option>
                               @endforeach
                        @endif
                        </select> -->
                     
      <div class="form-group">
                        <h5> Promo Code for Specific Person</h5>
                        <div class="promoinput" style="margin-bottom:3rem;">
                          <select class="selectpicker form-control" data-show-subtext="true" name="promoinput[]"  data-live-search="true">
                            <option  class="form-control" ></option>
                            
                          
                  @if(count($result)>0)
                        @foreach($result as $results )
        
                          
                            <option  class="form-control"  value="{{$results->username}}" >{{$results->username}}</option>
                            
                          
           @endforeach
                  @endif
       
      
                        
                          </select>
                        </div>
                        <button class="promobtn btn-md btn">Add More Fields</button>
                        <br>

<h5> Promo Code for Specific Category </h5>
                        <select class="selectpicker form-control" data-show-subtext="true" name="category" id=""  data-live-search="true">
                          <option  class="form-control" ></option>
                          
                        
                  @if(count($result1)>0)
                        @foreach($result1 as $results )
        
                        
                          <option  class="form-control"  value="{{$results->sub_category}}" >{{$results->sub_category}}</option>
                          
                        
           @endforeach
                  @endif
       
      
                      
                        </select>

                      <div class="radio">
                          <label><input type="radio" value="3" name="optradio" >All customers</label>
                        </div>
                        <div class="radio">
                          <label><input type="radio"  value="4" name="optradio">Existing Customer</label>
                        </div>
                        <div class="radio">
                          <label><input type="radio"  value="5" name="optradio">New Customer</label>
                        </div>
                        </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                      </div>
                      
                      </div>
                    
                  </form>
                
              </div>
          </div>
        </div>
      </div>
    </div>
  
    @endsection 