@extends('admin.layouts.appadmin')
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="page-title">
        <div class="title_left">
          <h3>Vendor Management</h3>
            <h4 style="display:block;">Vendor View</h4>
        </div>
      </div>
      @if($result>0)
  @foreach($result as $results)
      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Name</h4>
           </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
          <p>{{$results->fname}}   {{$results->lname}}</p>
          </div>
        </div>
      </div>
      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Email</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
          
            <p >   {{$results->email}}</p>
          </div>
        </div>
      </div>
      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Store Name</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
            <p>   {{$results->store_name}}</p>
            
          </div>
        </div>
      </div>
      

      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Phone Number</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
            <p>   {{$results->phone}}</p>
            
          </div>
        </div>
      </div>



      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Address</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
            <p>   {{$results->address}}</p>
            
          </div>
        </div>
      </div>



      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>CNIC</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
            <p>   {{$results->cnic}}</p>
            
          </div>
        </div>
      </div>



      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Bank Name</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
            <p>   {{$results->bank_name}}</p>
            
          </div>
        </div>
      </div>



      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Bank Title</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
            <p>   {{$results->bank_title}}</p>
            
          </div>
        </div>
      </div>




      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Account Number</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
            <p>   {{$results->account_number}}</p>
            
          </div>
        </div>
      </div>




      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Bank Code</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
            <p>   {{$results->bank_code}}</p>
            
          </div>
        </div>
      </div>




      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>ZIP Code</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
            <p>   {{$results->zip_code}}</p>
            
          </div>
        </div>
      </div>




      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Dealing Person</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
            <p>   {{$results->dealing_person}}</p>
            
          </div>
        </div>
      </div>





      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Shop Status</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
          @if($results->vendor_status == 1)
                      <td><span id="{{$results->id}}" class="label label-danger" >Blocked</span></td>
          
          @elseif($results->vendor_status == 0)
            <td><span id="{{$results->id}}"  class="label label-primary">Active</span></td>
              @else
            <td><span id="{{$results->id}}" class="label label-warning" >Pending</span></td>
           @endif
           
          </div>
        </div>
      </div>




      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>STN</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
            <p>   {{$results->STN}}</p>
            
          </div>
        </div>
      </div>




      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>NTN Number</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
            <p>   {{$results->NTN}}</p>
            
          </div>
        </div>
      </div>


      <div class="row borderbotm">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="dbicon">
            <h4>Image</h4>
           </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="dbparahss">
          
          <!-- <label>Third Image</label><br> -->
         
          <img src="{{URL('/')}}/storage/images/{{$results->cheque_copy}}" alt="Size Chart" style="width:100%;">    
          </div>
        </div>
      </div>




      @endforeach
    @endif


    </div>
    <!-- /page content --> 
    
    @endsection 