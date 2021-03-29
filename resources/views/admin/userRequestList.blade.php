@extends('admin.layouts.appadmin')
@section('content')

 <!-- page content -->
 <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="col-md-10 col-sm-12 col-xs-12">
          <div class="title_left">
           <h3>Payment Management</h3>
            <h4>User Request List</h4>
          </div>
          </div>
          
          <div class="col-md-2 col-sm-12 col-xs-12">
          <div class="title_left">
           <a href="{{url('/')}}/diet_plan_history" class="btn btn-success pull-right"><i class="fa fa-plus"></i> User Health History</a>
          </div>
          </div>
          
        <div class="clearfix"></div>
        <div class="row">
           @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
            </div>
          @endif
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
                <table id="datatable-responsive" class="table table-condense dt-responsive" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->fname}}</td>
                      <td>{{$value->username}}</td>
                      <td>  {{$value->created_at}}</td>
                      <td>
                      <a href="{{ route('view.answer', ['id' => $value->id]) }}" class="red">View Answers</a>
                      </td>
                    </tr>
                    @endforeach
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