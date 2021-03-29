@extends('client.layouts.appclient')
@section('content')
<!--Breadcrumb Tow Start-->
<div class="breadcrumb-tow mb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-title">
                    <h1>About Us</h1>
                </div>
                <div class="breadcrumb-content breadcrumb-content-tow">
                    <ul>
                        <li><a href="{{url('/')}}/">Home</a></li>
                        <li class="active">About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumb Tow End-->

<!--About Us Area 2 Start-->
<div class="about-us-area-2">
<div class="container">
<div class="row">
<div class="col-md-6">
  <div class="about-us-content-2">
    <h2><strong>Sonia Salim</strong></h2>
    <p>Sonia Salim is an Integrative Nutrition Health Coach, with a diploma from the Institute of Integrative Nutrition in New York. She studied separately for gut health and hormone health and then the Psychology of food, from the same institution and believes in the use of foods as medicine to treat these disorders. <br>
 
 She has founded her own nutrition company called The Food Pharmacy since 2017. She sees the client online on a one on one session, to support  and guide them with their hormone or gut health problems by recommending diet and lifestyle changes. All recipes prepared are targeted towards solving these problems, and help the client lose weight in the process.<br>
 
 She does this by taking a targeted health history of the client by which she formulates a bio-individual diet plan to aid the client achieve his/her health goals along with weekly online sessions.</p>
  </div>
</div>
<div class="col-md-6">
  <div class="about-us2-img text-center pb-50"> <img src="{{url('/')}}/client/img/sonia_salim.jpeg" alt="" style="width:100%;"> </div>
</div>
</div>
</div>
</div>
<!--About Us Area End--> 

<div class="about-us-area-2 mt-10">
<div class="container">
<div class="row">
<div class="col-12">
  <div class="about-us-content-2 mt-20">
    <h2><strong>Certificates</strong></h2>
  </div>
</div>
</div>
<div class="row">
<div class="col-md-3">
  <div class="about-us2-img text-center pb-50"> <img src="{{url('/')}}/client/img/Hormone_Health_Certificate.png" alt="" data-toggle="modal" data-target="#myModal"> </div>
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content"> 
        
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body"> <img src="{{url('/')}}/client/img/Hormone_Health_Certificate.png" alt="" style="width:100%;"> </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-3">
  <div class="about-us2-img text-center pb-50"> <img src="{{url('/')}}/client/img/Emotional_Eating_Certificate.png" alt="" data-toggle="modal" data-target="#myModal2"> </div>
  <div class="modal" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content"> 
        
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body"> <img src="{{url('/')}}/client/img/Emotional_Eating_Certificate.png" alt="" style="width:100%;"> </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-3">
  <div class="about-us2-img text-center pb-50"> <img src="{{url('/')}}/client/img/Gut_Health_Certificate.png" alt="" data-toggle="modal" data-target="#myModal3"> </div>
  <div class="modal" id="myModal3">
    <div class="modal-dialog">
      <div class="modal-content"> 
        
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body"> <img src="{{url('/')}}/client/img/Gut_Health_Certificate.png" alt="" style="width:100%;"> </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-3">
  <div class="about-us2-img text-center pb-50"> <img src="{{url('/')}}/client/img/SKMBT_C45220100205480.jpg" alt="" data-toggle="modal" data-target="#myModal4"> </div>
  <div class="modal" id="myModal4">
    <div class="modal-dialog">
      <div class="modal-content"> 
        
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body"> <img src="{{url('/')}}/client/img/SKMBT_C45220100205480.jpg" alt="" style="width:100%;"> </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
@endsection