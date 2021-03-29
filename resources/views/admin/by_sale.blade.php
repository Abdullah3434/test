@extends('admin.layouts.appadmin')
@section('content')
      
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
           <h3>Reporting Management</h3>
            <h4>By Sale</h4>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="page-title">
           <h2>Total Revenue : {{$total}} </h2>
        </div>
        
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
                <table id="datatable-responsive" class="table table-condense dt-responsive" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Order Id</th>
                      <th>Customer Name</th>
                      <th>Price</th>
                      <th>Date</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if($result>0)
                            @foreach($result as $results)
                        <tr>
                          <td>{{$results->pk_id}}</td>
                          <td>{{$results->fname}} {{$results->lname}}</td>
                     @if($results->promo_amount == "")
                          <td><div class="sparkbar" data-color="#f56954" data-height="20">PKR {{$results->amount}}</div></td>
                          @else
                                <td><div class="sparkbar" data-color="#f56954" data-height="20">PKR {{$results->promo_amount}}</div></td>
                          @endif
                          
                           <td>{{$results->placed_at}}</td>
                           <td><span class="label label-success"style="cursor: pointer;">Completed</span></td>
                          <!-- <td><a href="{{url('/')}}/admin/home/view/detail/reporting/by/sale/{{$results->pk_id}}">View</a></td> -->
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