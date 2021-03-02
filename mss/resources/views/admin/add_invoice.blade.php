@extends('admin.layout.appadmin')
@section('content')
<div class="right_col" role="main">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="viewadminhead">
        <h2>Create Invoice</h2>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <div class="invoicestopright">
        <h4>Invoice #</h4>
        <p>{{$sale_id}}</p>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="plusbutton">
            <a href="{{url('/')}}/admin/home/add/customer" class="btn pumpplusbtn" title="Add Supplier"><span class="glyphicon glyphicon-plus"></span></a>
          </div>
        </div>
  </div>
  <form method="post" action ="{{url('/')}}/admin/home/add/sale/invioce" class="login-form" enctype="multipart/form-data">
    {{ csrf_field() }}
    
    @if($errors->any())
    <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
    @endif
    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Customer Name</label>
            <select class="selectpicker form-control" data-show-subtext="true"  name="customer_name" data-live-search="true" required="required" >
              <option value="" >Select Customer</option>
              
              
                  @if($result>0)
          @foreach($result as $results)
        
              
              <option value="{{$results->pk_id}}" >{{$results->customer_name}}</option>
              
              
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
            <label for="usr">Sale Type</label>
              
              <select class="form-control" id="sale_type" name="sale_type" required>
                 <option value="">Sale Type</option>
                 
                 <option value="sale" >Sale</option>
                 <option value="return">Sale Return</option>
             </select>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Invoice Date</label>
             <input type="text" class="form-control" id="mydate" name="date">
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Due Date</label>
            <input type="text" class="form-control" id="mydate2" name="date2">
          </div>
        </div>
      </div>
    </div>



    
    <div class="container-fluid">
    <div class="field_wrapper">
      <div class="borderrow">
        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label for="sku">SKU</label>


                <input list="skus" class=" form-control"  id="sku" name="sku[]"  autocomplete="off">
  <datalist id="skus">
  @if($inventory>0)
          @foreach($inventory as $results)
        
                    
                  <option value="{{$results->sku}}" >
                  
                    
           @endforeach
                  @endif
       
  </datalist>


               
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label for="usr">Product/Service</label>


                <input list="names" class=" form-control"   id="name"  name="item_name[]" autocomplete="off">
  <datalist id="names">
  @if($inventory>0)
          @foreach($inventory as $results)
        
                    
                  <option value="{{$results->name}}" >
                  
                    
           @endforeach
                  @endif
       
  </datalist>

               
            
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control"  name="description[]" >
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label>QTY</label>
                <input type="text" class="form-control" id="quantity" name="quantity[]" required>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label>Rate</label>
                <input type="text" class="form-control" id="rate" name="rate[]" required>
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

          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="plusbutton">
                <button type="button" class="add_buttonsale plusbtn" title="Add field"><span class="glyphicon glyphicon-plus"></span></button>
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