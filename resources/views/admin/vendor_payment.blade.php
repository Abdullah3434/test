
    @extends('admin.layouts.appadmin')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Vendor Management</h3>
            <h4>Vendor Payment</h4>
          </div>
        </div>
       
        
        <div class="clearfix"></div>

        <form method="post" action = "{{url('/')}}/admin/view/vendor/payment" class="login-form" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      
                           @if($errors->any())
                                          <div class="alert alert-danger">
  <strong>  {{$errors->first()}}</strong>
</div>
	@endif
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
                <table id="datatable-responsive" class="table table-condense dt-responsive" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      
                      <th>Name</th>
                      <th>Email</th>
                      
                      <th>Store Name</th>
                      <th>Total Payment</th>
                      <th>Partial Payment</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php

$count=0;

@endphp    
@if(count($result)>0)
@foreach($result as $results)
<tr>
    
  <!-- <td>{{$results->id}}</td> -->
       

  <td>{{$results->fname}} {{$results->lname}}</td>
  <td>{{$results->email}}</td>
      <input name="email[]" value="{{$results->email}}" type="hidden">
  <td>{{$results->store_name}}</td>

   <td>PKR {{number_format($results->payment)}}</td>
            <input name="payment[]" value="{{$results->payment}}" type="hidden">
   
<td> <input type="text" id="Quantity" name="partial_payments[]" class="form-control input-sm chat-input" placeholder="0"   />
</td>
<td>


<div class="checkbox">


<label><input type="checkbox" name="checkbox[]" value="{{$count}}"></label>

</div>
</td>

</tr>
    @php
$count++;
@endphp
@endforeach
@endif
                    
                  </tbody>
                </table>
                <button type="submit" class="btn pull-right">Create Payment</button>
              </div>
</form>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content --> 
    
    @endsection 