@extends('admin.layouts.appadmin')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="col-md-10 col-sm-12 col-xs-12">
          <div class="title_left">
           <h3>Payment Management</h3>
            <h4>Diet Plan List</h4>
          </div>
          </div>
          <div class="col-md-2 col-sm-12 col-xs-12">
          <div class="title_left">
           <a href="{{route('create.diet.plan')}}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Create Diet Plan</a>
          </div>
          </div>

         


        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
         @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
            </div>
          @endif
                <table id="datatable-responsive" class="table table-condense dt-responsive" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Diet Plan</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $value)
                    <tr>
                      <td>{{$value->pk_id}}</td>
                      <td>{{$value->name}}</td>
                      <td style="width:60%;">{{$value->description}}.</td>
                      <td>
                      <a href="{{route('view.deit.plan',['id'=>$value->pk_id])}}">View</a>
                      <a href="{{ url('/') }}/admin/edit/dietplan/{{$value->pk_id}}">Edit</a>
                      <a href="{{ url('/') }}/admin/delete/dietplan/{{$value->pk_id}}" class="red">Delete</a>
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