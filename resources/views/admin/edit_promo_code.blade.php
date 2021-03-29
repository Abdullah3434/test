
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
              <form method="post" action = "{{url('/')}}/admin/home/edit/promo/{{$result[0]->pk_id}}" class="login-form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                          @if($errors->any())

                            
                            <div class="alert alert-danger">
  <strong>Danger!</strong> {{$errors->first()}}
</div>
	@endif
                    <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Promo Code</label>
                        <input type="text" class="form-control" name="promo" value="{{$result[0]->promo_code}}" placeholder="Enter Promo Code" pattern="[a-zA-Z0-9\s]+" maxlength="20" required>
                      </div>
                      <div class="form-group">
                        <label>Discount Amount</label>
                        <input type="number" class="form-control" value="{{$result[0]->discount_amount}}" name="discount" placeholder="Enter Discount" min="1" max="2000" >
                      </div>
                      <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" class="form-control" name="start_date" value="{{$result[0]->start_date}}" pattern="[a-zA-Z0-9\s]+" maxlength="20" required>
                      </div>
                      <div class="form-group">
                        <label>End Date</label>
                        <input type="date" class="form-control" name="end_date" value="{{$result[0]->end_date}}" pattern="[a-zA-Z0-9\s]+" maxlength="20" required>
                      </div>
                      <div class="form-group">
                        <label>Min Sub Total</label>
                        <input type="number" class="form-control" name="min" value="{{$result[0]->min_total}}" min="1" max="2000" >
                      </div>
                      <div class="form-group">
                        <label>Max Sub Total</label>
                        <input type="number" class="form-control" name="max" value="{{$result[0]->max_total}}" min="1" max="2000" >
                      </div>
                      </div>
                      <div class="col-lg-6">
                      <div class="form-group">
                      <label>Is Active?</label><br>
                      <label class="switch">
                          <input type="checkbox"  name="status" @if($result[0]->status==0) checked @endif  class="cmn-toggle cmn-toggle-round-flat" type="checkbox" checked>
                          <span class="slider round"></span>
                        </label>
                      </div>
                      <div class="form-group">
                      <label>Discount Type</label>
                      <div class="radio">
                          <label><input type="radio"  name="radio" @if($result[0]->discount_type=="fixed") checked @endif value="1" name="radio">Fixed</label>
                        </div>
                        <div class="radio">
                          <label><input type="radio"  name="radio" @if($result[0]->discount_type=="percentage") checked @endif value="2" name="radio">Percentage</label>
                        </div>
                        </div>
                        <div class="form-group">
                      <label>Apply Discount For</label>
                      <div class="radio">
                          <label><input type="radio"  @if($result[0]->discount_for=="all customers") checked @endif value="3" name="optradio">All customers</label>
                        </div>
                        <div class="radio">
                          <label><input type="radio"  @if($result[0]->discount_for=="exiting customers") checked @endif value="4" name="optradio">Existing Customer</label>
                        </div>
                        <div class="radio">
                          <label><input type="radio"  @if($result[0]->discount_for=="new customers") checked @endif value="5" name="optradio">New Customer</label>
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