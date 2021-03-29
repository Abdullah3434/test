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
            <h4>Vendor Pending Product List</h4>
          </div>
        </div>
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Status Change</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
         
          <select id="status" name="status" class="form-control">
          <option>Select status</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Approved</option>
                                        <option value="3">Unapproved</option>
                                      
          </select>
          </div>
        </div>
        <div class="modal-footer">
        <button id="p1" type="button" class="btn btn-submmit">Submit</button>
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
                      <th>SKU</th>
                      <th>Name</th>
                      
                      <th>Vendor Name</th>
                      <th>Category</th>
                      <th>Sub Category</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
      
  @if(count($result)>0)
                        @foreach($result as $results)
                        <tr>
                          <td>{{$results->SKU}}</td>
                       
                          <td>{{$results->name}}</td>
                          <td>{{$results->vendor_id}}</td>
                          <td>{{$results->sub_category}}</td>
                         
                          <td>{{$results->main_category}}</td>
                        
                          <td><span id="{{$results->pk_id}}" onclick="getId(this.id)" class="label label-warning" data-toggle="modal" data-target="#myModal">Pending</span></td>
                       
                          <td><a href="{{url('/')}}/admin/home/view/pending/products/view/detail/product/{{$results->pk_id}}">View</a></td>
                          
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