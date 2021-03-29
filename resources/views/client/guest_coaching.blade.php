 @extends('client.layouts.appclient')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="tab-list-option mb-50">
        <ul class="nav">
          <li> <a class="active" data-toggle="tab" href="#grid">Programs and Charges</a> </li>
          <li> <a data-toggle="tab" href="#list">Health Coaching</a> </li>
          <li> <a href="{{route('guest.create.payment')}}">Create Payment</a> </li>
        </ul>
      </div>
      <!--<div class="pull-right"> <a href="{{route('guest.create.payment')}}" class="btn-coaching">Create Payment</a> </div>--> 
      @if(Session::has('message'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ Session::get('message') }}</strong> </div>
      @endif </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="coaching text-center"> <img src="{{url('client/img/Untitled-5.png')}}" alt="img"> </div>
      <div class="text-center mt-10 mb-20"> <a href="{{route('guest.calendly.scheduling')}}" class="btn-coaching text-center">Schedule</a> </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="coaching text-center"> <img src="{{url('client/img/Untitled-6.png')}}" alt="img"> </div>
      <div class="text-center mt-10 mb-20"> <a href="{{route('guest.question.answer.form')}}" class="btn-coaching text-center">Health History</a> </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="coaching text-center"> <img src="{{url('client/img/Untitled-7.png')}}" alt="img"> </div>
      <div class="text-center mt-10 mb-20"> <a href="" class="btn-coaching text-center">Diet Plan</a> </div>
    </div>
  </div>
  <div id="myTabContent-2" class="tab-content">
    <div id="grid" class="tab-pane fade show active">
      <div class="product-grid-view">
        <div class="row">
          <div class="col-12">
            <div class="bgg mb-20">
              <h3>How the program works and charges:</h3>
            </div>
          </div>
        </div>
        <div class="row mb-50">
          <div class="col-md-6 col-sm-12 col-xs-12">
            <img src="{{url('/')}}/client/img/rightban.png" class="mb-10" alt="ban" style="width:100%;">
          </div>
          <div class="col-md-6 col-sm-12 col-xs-12">
            <img src="{{url('/')}}/client/img/left.png" class="mb-10" alt="ban" style="width:100%;">
          </div>
        </div>
        <div class="demo">
            <div class="row">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="pricingTable">
                  <div class="pricingTable-header">
                    <div class="price-value"> First Month </div>
                  </div>
                  <ul  class="content-list">
                    <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> <span class="green">1st session </span> health history <br>
                      via WhatsApp video phone call.</li>
                    <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> <span class="green">2nd session: </span>1st diet plan and <br>
                      recipe discussion during the session.<br>
                      30-40 mins</li>
                    <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> <span class="green">3rd session: </span>discussion of progress, weight,<br>
                      and any issues arising. From <br>
                      this information I will make your,<br>
                      next diet plan.</li>
                    <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> <span class="green">4th session: </span>discussion of progress,<br>
                      weight, and any issues arising with<br>
                      health. From this information I will<br>
                      make your next diet plan with<br>
                      minor changes.</li>
                    <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> <span class="green">5th session: </span>discussion of progress,<br>
                      weight and any other issues arising<br>
                      with health. From this information<br>
                      I will make your next diet plan with<br>
                      minor changes.</li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                  <div class="pricingTable-header">
                    <div class="price-value"> Second Month </div>
                  </div>
                  <ul  class="content-list">
                    <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> <span class="green"> </span>4 sessions plus 4 diet plans following the same format.</li>
                    <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> <span class="green"><strong>Rs.20,000, $120, £100</strong></span></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                  <div class="pricingTable-header">
                    <div class="price-value"> Third Month </div>
                  </div>
                  <ul  class="content-list">
                    <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> <span class="green"></span>4 sessions plus 4 diet plans following the same format.</li>
                    <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> <span class="green"><strong>Rs.20,000, $120, £100</strong></span></li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="bgg mb-20">
              <h3>Other Info:</h3>
            </div>
            <div class="bggg mb-50">
              <p class="text-justify">Any one time session can be booked for 60 mins WhatsApp video call. Here, you can discuss any ongoing health issue regarding gut health, hormone health or emotional eating without a diet plan. But detailed recommendations and recipes are included.</p>
              <p class="text-justify green"><b>Rs.5000, $35, £25</b></p>
            </div>
            <div class="bggg mb-50">
              <p class="text-justify">If you completed a month or 3 months with me, and prefer to follow up via one session for staying accountable this one time session is also for you!</p>
              <p class="text-justify green"><b>Rs.5000, $35, £25</b></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="list" class="tab-pane fade">
      <div class="row">
        <div class="col-12">
          <div class="bgg mb-20">
            <h3>Health coaching is for you if:</h3>
          </div>
        </div>
      </div>
      <div class="row mb-50">
        <div class="col-12">
          <h4>You’re looking for support to make lasting lifestyle changes that can lead to:</h4>
        </div>
        <div class="col-md-7 col-sm-12 col-xs-12">
          <div class="list mb-20">
            <ul>
              <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> Weight-loss.</li>
              <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> Balanced moods.</li>
              <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> Balanced hormones.</li>
              <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> A healthy gut microbiome.</li>
              <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> Being kinder to your environment and planet.</li>
              <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> Eating seasonally and locally.</li>
              <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> Want to eat nutrient-dense foods.</li>
            </ul>
          </div>
        </div>
        <div class="col-md-5 col-sm-12 col-xs-12">
          <div class="row">
            <h4><img src="{{url('/')}}/client/img/right.png"></h4>
          </div>
        </div>
      </div>
      <div class="row mb-50">
        <div class="col-12">
          <h4>Health Coaching is NOT for you if: You’re looking for:</h4>
        </div>
        <div class="col-md-7 col-sm-12 col-xs-12">
          <div class="list mb-20">
            <ul>
              <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> Therapy</li>
              <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> Counselling</li>
              <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> Fad diets</li>
              <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> Interpretation of lab results</li>
              <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> Writing prescriptions for medicines</li>
              <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> Bulking or Shredding</li>
              <li><img src="{{url('/')}}/client/img/DOT.png" alt='img'> Calorie counting</li>
            </ul>
          </div>
        </div>
        <div class="col-md-5 col-sm-12 col-xs-12">
          <div class="row">
            <h4><img src="{{url('/')}}/client/img/wrong.png"></h4>
          </div>
        </div>
      </div>
      <div class="row mb-50">
        <div class="col-12">
          <div class="bgg mb-20">
            <h3>Other Info:</h3>
          </div>
          <div class="bggg mb-20">
            <p class="text-justify">The coaching sessions are client led. You do the talking, I do the listening and offer support.Our relationship is collaborative. The diet plans I make with our online sessions, are individual based, according to your needs and goals. They serve as a guideline for you to follow to achieve these goals.</p>
          </div>
          <div class="bggg mb-20">
            <p class="text-justify">Recipes are given where needed along with portion sizes.</p>
            <p>Email access for questions before or during our sessions: <a href="mailto:thefoodpharmacyapp@gmail.com" class="green"><strong>thefoodpharmacyapp@gmail.com</strong></a></p>
          </div>
          <div class="bggg mb-20">
            <p class="text-justify"> The program is not-refundable.</p>
          </div>
          <div class="bggg mb-20">
            <p>Unforeseen Circumstances; if you have to postpone a session because of travel, or illness, you can postpone a session for that duration and come back to the program as soon as you’re available. You must inform me via email!</p>
          </div>
          <div class="bggg mb-20">
            <p>However if you don’t get back in touch for more than 4 weeks from date of postponement, your payment/program is considered expired. If you wish to rejoin after 4 weeks, you will have to pay <span class="green"><strong>Rs.20,000</strong></span> again, for renewal of 4 sessions and 4 diet plans plus recipes.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 