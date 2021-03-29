@extends('vendor.layouts.appvendor')
 
 @section('content')
      
      <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Discount Management</h3>
            <h4 style="display: block;">Add Category</h4>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
              <form method="post" action = "{{url('/')}}/vendor/home/add/discount" class="login-form">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-5">
                    <div class="row">
                      <div class="form-group col-lg-12 col-sm-12 col-md-12">
                      <label>SKU</label>
                        <select class="form-control" id="product type" name="sku" required="required" >
                  @if(count($result)>0)
                        @foreach($result as $results )
                            <option value="{{$results->SKU}}">{{$results->SKU}}</option>
                               @endforeach
                        @endif
                        </select>
                      </div>
                      <div class="form-group col-lg-12 col-sm-12 col-md-12">
                        <label>Start Date</label>
                        <input type="date" class="form-control" name="start_date" placeholder="Start Date" required>
                      </div>
                      <div class="form-group col-lg-12 col-sm-12 col-md-12">
                        <label>End Date</label>
                        <input type="date" class="form-control" name="end_date" placeholder="End Date" required>
                      </div>
                     
                      <div class="form-group col-lg-12 col-sm-12 col-md-12">
                        <label>Discount in percentage</label>
                        <input type="number" class="form-control" name="percentage" placeholder="Discount Price" required>
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
                
              </div>
          </div>
        </div>
      </div>
    </div>
    @endsection