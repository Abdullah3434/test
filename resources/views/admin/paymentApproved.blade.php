@extends('admin.layouts.appadmin')
 
@section('content') 
<script>
  var OrgID=-1;
    function getId(id)
    {
  
      
      OrgID = id;
      return true;
    }
    function getreal()
    {
      alert(OrgID);
      
     
    }
</script> 
<!-- page content -->
<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="col-md-10 col-sm-12 col-xs-12">
      <div class="title_left">
        <h3>Payment Management</h3>
        <h4>Approved Lists</h4>
      </div>
    </div>
    <div class="col-md-2 col-sm-12 col-xs-12"> </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_content">
          <table id="datatable-responsive" class="table table-condense dt-responsive" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Slip</th>
                <th>Package</th>
                <th>Amount</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            
            @php if(isset($data) && !empty($data)){  @endphp
            @foreach($data as $value)
            <tr>
              <td>{{$value->id}}</td>
              <td>{{$value->name}}</td>
              <td>{{$value->email}}</td>
              <td><span id="{{$value->id}}" onclick="getId(this.id)"  data-toggle="modal" data-target="#myModal{{$value->id}}"style="cursor:pointer"><img style="height:100px;width:100px;" class="{{$value->id}}" src="{{url('assets_user/bank_slip//')}}/{{$value->file}}" alt="slip"> 
                <!-- <img id="myImg" src="{{url('assets/admin/images/14.jpg')}}" alt="Snow" > --> 
                </span></td>
              <td>{{$value->package}}</td>
              <td>{{$value->amount}}</td>
              <td><a href="{{route('payment.reject', ['id' => $value->id]) }}" class="red">Rejected</a></td>
              <div id="myModal{{$value->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog"> 
                  
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group"> <img  src="{{url('assets_user/bank_slip//')}}/{{$value->file}}" style="width:100%" alt="slip"> </div>
                    </div>
                  </div>
                </div>
              </div>
            </tr>
            @endforeach
            @php }else{ @endphp
            <h3>No data found</h3>
            @php } @endphp
              </tbody>
            
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /page content --> 
@endsection