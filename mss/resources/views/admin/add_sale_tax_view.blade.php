@extends('admin.layout.appadmin')
@section('content')
    
<form method="post" action = "{{url('/')}}/admin/home/add/sale/tax" class="login-form" enctype="multipart/form-data">
                   
                   {{ csrf_field() }}
             
             @if($errors->any())
             
             <div class="alert alert-danger">
             <strong></strong> {{$errors->first()}}
             </div>
             @endif 
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Create Sale / Tax Applicable</h2>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
         
         <div class="invoicestopright">
         <h4>sale Invoice #</h4>
          <p>{{$sale_id}}</p>
         </div>
       
        </div>
  

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="plusbutton">
            <a href="{{url('/')}}/admin/home/add/customer" class="btn pumpplusbtn" title="Add Customer"><span class="glyphicon glyphicon-plus"></span></a>
          </div>
        </div>
         </div>
         <div class="row">

         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
         
         <div class="createadmininputs invoicestopright">
            <h4>STI #</h4>
                  <input type="text" class="form-control" id="" name="sti">
          </div>
        
         </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <div class="createadmininputs invoicestopright">
      <h4>Date</h4>
      <input type="text" class="form-control" id="mydate" name="date">
                  </div>
      </div>
      </div>
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Customer Name</label>
                  <select class="selectpicker form-control" data-show-subtext="true"  name="customer_name" data-live-search="true">
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
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
              <label for="sel1">Account Type</label>
              <select class="selectpicker form-control" data-show-subtext="true" id="Cash" name="account_type" data-live-search="true">
                <option  class="form-control" >Account Type</option>
              
        <option    value="cash" >Cash</option>
        <option    value="credit" >Credit</option>
       
      </select>
            </div>
          </div>
        </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Sale Type</label>
                  <select class="form-control" id="" name="sale_type">
                <option value="sale">sale</option>
                <option value="sale return">Sale Return</option>
              </select>
                </div>
          </div>
        </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Company Name</label>
                  <input type="text" class="form-control" id="" name="company_name">
                </div>
          </div>
        </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Vehicle No</label>
                  <input type="text" class="form-control" id="" name="vehicle_no">
                </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
         
         <div class="invoicestopright">
         <h4>Bill #</h4>
          <p id="invoice">0</p>
         </div>
       
        </div>
      <div class="container-fluid">
             <div class="field_wrapper">
               <div class="borderrow">
           <div class="row">
          
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">SKU</label>
                  <select class="form-control" id="sku" name="sku[]">
                  <option value="">Select Item SKU</option>
                  @if($inventory>0)
          @foreach($inventory as $results)
                  <option value="{{$results->sku}}">{{$results->sku}}</option>
                  @endforeach
                  @endif
              </select>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Item Name</label>
                  <input type="text" class="form-control" name="item_name[]" id="name" autocomplete="off">
                   <div id="itemlist">
    </div>
                </div>
                 {{ csrf_field() }}
               
              </div>
            </div>
           
          
             <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Quantity</label>
                  <input type="text" class="form-control" value="0" id="quantitys" name="quantity[]" >
                </div>
              </div>
            </div>
             <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Rate</label>
                  <input type="text" class="form-control" value="0" id="rates" name="rate[]" >
                </div>
              </div>
               
            </div>
     
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
            <div class="form-group">
              <label for="usr">Percentage of Tax</label>
              <input type="text" value="0" class="form-control" id="tax" name="tax[]" >
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
            <div class="form-group">
              <label for="usr">Tax Amount</label>
              <input type="text" class="form-control" id="tax_amount" name="tax_amount[]" >
            </div>
          </div>
        </div>

            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
            <div class="form-group">
              <label for="usr">Amount</label>
              <input type="text" class="form-control" id="amounts" name="amount[]" >
            </div>
          </div>
        </div>


            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="plusbutton">
                <button type="button" class="add_buttontax plusbtn" title="Add field"><span class="glyphicon glyphicon-plus"></span></button>
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
            <p id="totals">0</p>
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
    </div>
    </form>
    <!-- /page content --> 
   @endsection