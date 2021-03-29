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
          <div class="title_left">
            <h3>Vendor Management</h3>
            <h4>Vendor List</h4>
          </div>
        </div>




        <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                      
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Status Change</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Update Status</label>
                                    <select id="status" name="status" class="form-control">
                                        <option>Select status</option>
                                        <option value="0">Active</option>
                                        <option value="1">Blocked</option>
                                            <option value="2">Pending</option>
                                   
                                    </select>
                             </div>
                             <button id="v1" type="button" class="btn btn-submmit">Submit</button>
                            </div>
                          </div>
                      
                        </div>
                      </div>





        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
                <table id="datatable-responsive" class="table table-condense dt-responsive" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      
                      <th>Name</th>
                      <th>Email</th>
                      
                      <th>Store Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if($result>0)
                    @foreach($result as $results)
                    <tr>   
                    
                      <td>{{$results->fname}} {{$results->lname}}</td>
                      <td>{{$results->email}}</td>
                      <td>{{$results->store_name}}</td>
                       @if($results->vendor_status == 1)
                      <td><span id="{{$results->id}}" onclick="getId(this.id)" class="label label-danger" data-toggle="modal" data-target="#myModal">Blocked</span></td>
          
          @elseif($results->vendor_status == 0)
            <td><span id="{{$results->id}}" onclick="getId(this.id)" class="label label-primary" data-toggle="modal" data-target="#myModal">Active</span></td>
              @else
            <td><span id="{{$results->id}}" onclick="getId(this.id)" class="label label-warning" data-toggle="modal" data-target="#myModal">Pending</span></td>
           @endif
           
                      
                      <td><a href="{{url('/')}}/admin/home/view/blocked/vendor/{{$results->id}}">View</a></td>

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
    <!-- /page content --> 
    
    @endsection 