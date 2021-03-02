@extends('admin.layout.appadmin')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>View Purchases / By Supplier</h2>
          </div>
        </div>
        
      </div>
      <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="Totalpurchasehead">
         <h4>Billing Address :</h4>
          <p>{{$result1[0]->billing_address}}</p>
         </div>       
      </div>
       <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="Totalpurchasehead">
         <h4>Supplier Name :</h4>
          <p>{{$result1[0]->supplier_name}}</p>
         </div>       
      </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="Totalpurchasehead">
         <h4>Balance :</h4>
          <p>PKR {{number_format($result1[0]->current_balance)}}</p>
         </div>       
      </div>
     
        
  
      
       <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="Totalpurchasehead">
         <h4>Total Purchases :</h4>
          <p>PKR {{number_format($total_amount[0]->{'SUM(total_amount)'})}}</p>
         </div>       
      </div>
      
      </div>
      @if($errors->any())
    <div class="alert alert-success"> <strong></strong> {{$errors->first()}} </div>
    @endif
    
      
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead class="headbgcolor">
                  <tr>
                    <th>PI #</th>
                       
                    <th>STI #</th>
                    <th>Purchase Type</th>
                      
                         <th>Qty</th>
                        
                          <th>Amount</th>
                          <th> Balance</th>
                          <th> Status </th>
                            <th>Date</th>
                             <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @if(count($result)>0)
                @foreach($result as $results)
                    @php
               
                $total_q1 = DB::select("select SUM(quantity) from detail_purchase where purchase_id = '$results->pk_id'");
                $total_q2 = DB::select("select SUM(quantity) from detail_tax_purchase where purchase_id = '$results->pk_id'");
             
                @endphp
                   <tr>
                   <td>{{$results->pk_id}}</td>
                   
                   <td>{{$results->sti}}</td>
                   @if($results->purchase == "tax")
                   <td>Tax</td>
                   @else
                   <td>Purchase</td>
                   @endif
        
                  <?php $account_type= DB::table('account')->where('pk_id',$results->account_type)->first();
                        if(empty($account_type)){ ?>
                         
                     

                  <?php }else{ ?>

                       
                         
                   <?php } ?>

                        @if($results->purchase == "tax")
                   <td>{{($total_q2[0]->{'SUM(quantity)'})}}</td>
                   @else
                   <td>{{($total_q1[0]->{'SUM(quantity)'})}}</td>
                   @endif
                     <td>PKR {{number_format($results->total_amount)}}</td>
                     @php
                   $balance= ($results->total_amount)  -$results->paid_amount
                   @endphp
                   <td>{{$balance    }}   </td>


 @if( $results->paid_amount   == $results->total_amount )
<td>  Paid 
</td>

@elseif($results->paid_amount   != $results->total_amount )
<td>  Open</td> 
@endif



                      <td>{{$results->created_at}}</td>
                        <td><a href="{{url('/')}}/admin/home/view/purchase/detail/{{$results->pk_id}}/{{$results->purchase}}" class="bordersets">view</a>  
                           
                        
                        <a href="{{url('/')}}/admin/home/create/purchase/payment/{{$results->pk_id}}" class="bordersets" >Create Payment</a> 
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