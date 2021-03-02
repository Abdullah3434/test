@extends('admin.layout.appadmin')
@section('content')
<div class="right_col" role="main">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="viewadminhead">
        <h2>Sale Receipt</h2>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <div class="invoicestopright">
        <h4>Sale Receipt #</h4>
        <p>{{$sale_id}}</p>
      </div>
    </div>
  </div>
  <form method="post" action ="{{url('/')}}/admin/home/add/sale/reciept" class="login-form" enctype="multipart/form-data">
    {{ csrf_field() }}
    
    @if($errors->any())
    <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
    @endif
    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Customer Name</label>
            <select class="selectpicker form-control" data-show-subtext="true" id="customer_name" name="customer_name" data-live-search="true">
              <option  class="form-control" >Select Customer</option>
              
              
                  @if($result>0)
          @foreach($result as $results)
        
              
              <option  class="form-control"  value="{{$results->pk_id}}" >{{$results->customer_name}}</option>
              
              
           @endforeach
                  @endif
       
      
            
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Address</label>
            <input type="text" class="form-control" name="address">
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Sale Receipt Date</label>
            <input type="text" class="form-control" id="mydate" name="date">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Payment Method</label>
            <select class="selectpicker form-control" data-show-subtext="true" id="Cash" name="account_type" data-live-search="true">
                <option  class="form-control" >Account Type</option>
              
        <option    value="cash" >Cash</option>
        <option    value="credit" >Credit</option>
       
      </select>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Refrence no</label>
            <input type="text" class="form-control" name="ref_no">
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="borderrow">
        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label for="usr">SKU</label>
                <select class="form-control" id="sku" name="sku[]"  >
                  <option value="">Select Item SKU</option>
                  
                    
                  @if($inventory>0)
          @foreach($inventory as $results)
                  
                    
                  <option value="{{$results->sku}}" id= "skuu">{{$results->sku}}</option>
                  
                    
                  @endforeach
                  @endif
              
                  
                </select>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label for="usr">Product/Service</label>
                <select class="selectpicker form-control" data-show-subtext="true" name="item_name[]" id="name"  data-live-search="true">
                <option  class="form-control" ></option>
                  
                    
                  @if($inventory>0)
          @foreach($inventory as $results)
        
                    
                  <option value="{{$results->name}}">{{$results->name}}</option>
                  
                    
           @endforeach
                  @endif
       
      
                  
                </select>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control"  name="" >
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label>Rate</label>
                <input type="text" class="form-control" id="rate" name="rate[]" >
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label>QTY</label>
                <input type="text" class="form-control" id="quantity" name="quantity[]" >
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label for="usr">Amount</label>
                <input type="text" class="form-control" id="amount"  name="amount[]" disabled>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-6">
        <div class="totalamounth">
          <h3>Total Amount</h3>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="totalamountp">
          <p id="total">0</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-6">
        <div class="totalamounth">
          <h3>Amount Received</h3>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="totalamountp">
          <p>0</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-6">
        <div class="totalamounth">
          <h3>Balance Due</h3>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="totalamountp">
          <p>0</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-9">
        <div class="totalamountp">
          <button type="submit" class="amountbtn btn">Save</button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection