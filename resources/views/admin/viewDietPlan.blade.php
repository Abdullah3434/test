@extends('admin.layouts.appadmin')
 @section('content')
 <!-- page content -->
 <div class="right_col" role="main">
    <div class="page-title">
      <div class="title_left">
        <h3>Coaching Management</h3>
        <h4 style="display:block;">Diet Plan View</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="des">
          <h3 class="green">About Your Meal</h3>
          <p>{{$data->description}}</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-sm-10 col-md-12 col-xs-12">
        <div class="dividers"></div>
      </div>
    </div>
    <div class="wrap">
      <div class="page-title">
        <h4><b>Saturday</b></h4>
      </div>
      <div class="row borderbotms">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>Item Name</h4>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>View Receipe Description</h4>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>View Grocery List</h4>
          </div>
        </div>
      </div>

  
      
      <div class="row">
        @php $i = 0; $dataa = json_decode($data->saturday);  @endphp

      @foreach($dataa as $value)
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p>@php if(isset($dataa->Item[$i])){ echo $dataa->Item[$i]; }  @endphp</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p>@php if(isset($dataa->Reciepe[$i])) { echo $dataa->Reciepe[$i]; } @endphp</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p> @php if(isset($dataa->Grocery[$i])) { echo $dataa->Grocery[$i]; } @endphp</p>
          </div>
        </div>
         @php $i++ @endphp
      @endforeach
      </div>
  
     
      <div class="page-title">
        <h4><b>Sunday</b></h4>
      </div>
      <div class="row borderbotms">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>Item Name</h4>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>View Receipe Description</h4>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>View Grocery List</h4>
          </div>
        </div>
      </div>


    
        

     <div class="row">
     @php $i = 0; $dataa = json_decode($data->sunday);  @endphp


      @foreach($data as $value)
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p>@php if(isset($dataa->Item[$i])){ echo $dataa->Item[$i]; }  @endphp</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p>@php if(isset($dataa->Reciepe[$i])) { echo $dataa->Reciepe[$i]; } @endphp</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p> @php if(isset($dataa->Grocery[$i])) { echo $dataa->Grocery[$i]; } @endphp</p>
          </div>
        </div>
        
   @php $i++ @endphp
    @endforeach
      </div>

     
    
      <div class="page-title">
        <h4><b>Monday</b></h4>
      </div>
      <div class="row borderbotms">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>Item Name</h4>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>View Receipe Description</h4>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>View Grocery List</h4>
          </div>
        </div>
      </div>

  

   <div class="row">
   @php $i = 0; $dataa = json_decode($data->monday);  @endphp


      @foreach($data as $value)
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p>@php if(isset($dataa->Item[$i])){ echo $dataa->Item[$i]; }  @endphp</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p>@php if(isset($dataa->Reciepe[$i])) { echo $dataa->Reciepe[$i]; } @endphp</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p> @php if(isset($dataa->Grocery[$i])) { echo $dataa->Grocery[$i]; } @endphp</p>
          </div>
        </div>
     @php $i++ @endphp
    @endforeach
      </div>
     
      <div class="page-title">
        <h4><b>Tuesday</b></h4>
      </div>
      <div class="row borderbotms">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>Item Name</h4>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>View Receipe Description</h4>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>View Grocery List</h4>
          </div>
        </div>
      </div>


     <div class="row">
      @php $i = 0; $dataa = json_decode($data->tuesday);  @endphp


      @foreach($data as $value)
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p>@php if(isset($dataa->Item[$i])){ echo $dataa->Item[$i]; }  @endphp</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p>@php if(isset($dataa->Reciepe[$i])) { echo $dataa->Reciepe[$i]; } @endphp</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p> @php if(isset($dataa->Grocery[$i])) { echo $dataa->Grocery[$i]; } @endphp</p>
          </div>
        </div>
   @php $i++ @endphp
    @endforeach
      </div>
     


      <div class="page-title">
        <h4><b>Wednesday</b></h4>
      </div>
      <div class="row borderbotms">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>Item Name</h4>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>View Receipe Description</h4>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>View Grocery List</h4>
          </div>
        </div>
      </div>

     <div class="row">
       @php $i = 0; $dataa = json_decode($data->wednesday);  @endphp


      @foreach($data as $value)
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p>@php if(isset($dataa->Item[$i])){ echo $dataa->Item[$i]; }  @endphp</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p>@php if(isset($dataa->Reciepe[$i])) { echo $dataa->Reciepe[$i]; } @endphp</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p> @php if(isset($dataa->Grocery[$i])) { echo $dataa->Grocery[$i]; } @endphp</p>
          </div>
        </div>
   @php $i++ @endphp
    @endforeach
      </div>
     
      <div class="page-title">
        <h4><b>Thursday</b></h4>
      </div>
      <div class="row borderbotms">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>Item Name</h4>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>View Receipe Description</h4>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>View Grocery List</h4>
          </div>
        </div>
      </div>
      
     <div class="row">
     @php $i = 0; $dataa = json_decode($data->thursday);  @endphp


      @foreach($data as $value)
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p>@php if(isset($dataa->Item[$i])){ echo $dataa->Item[$i]; }  @endphp</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p>@php if(isset($dataa->Reciepe[$i])) { echo $dataa->Reciepe[$i]; } @endphp</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p> @php if(isset($dataa->Grocery[$i])) { echo $dataa->Grocery[$i]; } @endphp</p>
          </div>
        </div>
        
   @php $i++ @endphp
    @endforeach
      </div>
     
      <div class="page-title">
        <h4><b>Friday</b></h4>
      </div>
      <div class="row borderbotms">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>Item Name</h4>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>View Receipe Description</h4>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbicons">
            <h4>View Grocery List</h4>
          </div>
        </div>
      </div>
   
     <div class="row">
      @php $i = 0; $dataa = json_decode($data->friday);  @endphp


      @foreach($data as $value)
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p>@php if(isset($dataa->Item[$i])){ echo $dataa->Item[$i]; }  @endphp</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p>@php if(isset($dataa->Reciepe[$i])) { echo $dataa->Reciepe[$i]; } @endphp</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="dbparahs" style="text-align:center">
            <p> @php if(isset($dataa->Grocery[$i])) { echo $dataa->Grocery[$i]; } @endphp</p>
          </div>
        </div>
   @php $i++ @endphp
    @endforeach
      </div>
     
    </div>
    </div>
    <!-- /page content --> 
    @endsection