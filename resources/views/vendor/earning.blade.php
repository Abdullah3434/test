
    @extends('vendor.layouts.appvendor')
@section('content')

<div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Vendor Management</h3>
            <h4>EarnNing</h4>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">


          @if(count($result)>0)
                    @foreach($result as $results)
              <h2 style="color:black;">Amount To Be Paid: <strong>PKR {{number_format($results->payment)}}</strong></h2>
              @endforeach
              @else
                  <h2 style="color:#ab0f23;margin:0px;">Amount To Be Paid: <strong>PKR 0</strong></h2>
                    
              @endif






          
          </div>
        </div>
      </div>
    </div>











@endsection 