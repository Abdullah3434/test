@extends('admin.layouts.appadmin')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="col-md-10 col-sm-12 col-xs-12">
          <div class="title_left">
           <h3>Payment Management</h3>
            <h4>User Diet Plan History</h4>
          </div>
          </div>
          <div class="col-md-2 col-sm-12 col-xs-12">
          
          </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
                <table id="datatable-responsive" class="table table-condense dt-responsive" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      
                      <th>Date</th>
                      <th>Diet Plan</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if(count($data)>0)
                      @foreach($data as $results)
                      
                      @php
                       $user_id = $results->user_id;
                       $diet_id = $results->diet_plan_id;
                      
                      $name=  DB::select("select* from client_details where pk_id = '$user_id' ");   
                      $diet_name=  DB::select("select* from dietplan where pk_id = '$diet_id' ");   
                      
                      
                      @endphp
                      
                      
                    <tr>
                      <td>{{$results->id}}</td>
                      <td>{{$name[0]->fname}}</td>
                      <td>{{$name[0]->username}}</td>
                      <td>{{$results->created_at}}</td>
                      <td>
                          @if(count($diet_name)>0)
                      {{$diet_name[0]->name}}
                      @endif
                      </td>
                    </tr>
                    @endforeach
                    @endif
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