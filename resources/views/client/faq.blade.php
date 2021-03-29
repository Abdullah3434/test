@extends('client.layouts.appclient')
@section('content')
<!--Breadcrumb Tow Start-->
<div class="breadcrumb-tow mb-120">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-title">
                    <h1>FAQ</h1>
                </div>
                <div class="breadcrumb-content breadcrumb-content-tow">
                    <ul>
                        <li><a href="{{url('/')}}/">Home</a></li>
                        <li class="active">FAQ</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumb Tow End-->
<!--FAQ Area Start-->
<div class="faq-area mb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--FAQ Accordin Start-->
                <div class="faq-accordion">
                    <div id="accordion">
                      <div class="card actives">
                        <div class="card-header" id="headingOne">
                          <h5 class="mb-0">
                            <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                               How many calories does my meal contain?
                            </a>
                          </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                          <div class="card-body">
                            Calories are the unit of measurement of energy that the food provides. Here, you will learn to eat more nutrient-dense foods , rather than count calories to lose weight.
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingTwo">
                          <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                               Are the plans Keto- based ?

                            </a>
                          </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                          <div class="card-body">
                            No. I do not recommend any Fad or trend based diet to solve your health problems or to lose weight.
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingThree">
                          <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              How much weight will I lose in a week?

                            </a>
                          </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                          <div class="card-body">
                            Weight-loss, weight-gain, and how much pounds and kilos you can lose in a week is dependent on your physical activity level, your unique biology, and how consistent you are in following what’s recommended to eat and sleep and stress levels. No one can honestly predict how much weight you will lose in what time. 

                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingFour">
                          <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                              Can I have protein shakes to lose weight and build muscle?
                            </a>
                          </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                          <div class="card-body">
                            Taking protein shakes for whatever reason is completely up to you. But a lot of 
mainstream ones do contain added sugars and artificial flavours which can result in negative health benefits in the long run.

                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingFive">
                          <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                             What kind of foods can I expect to see on my meal plan?
                            </a>
                          </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                          <div class="card-body">
                            Expect to see unprocessed, fresh fruit and vegetables, whole-grains, no added sugars, nuts, seeds, legumes and beans, and organic meat and poultry and dairy as supplemental if you are a meat-eater/ and or required to eat it as in the case of auto-immune sufferers.
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingSix">
                          <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                               Can I call you in between sessions?

                            </a>
                          </h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                          <div class="card-body">
                            No. We will talk face to face once a week. If you have inquires that must be asked during the week and can’t be saved   for the next discussion, then you can email. The whole purpose of a lifestyle change or healing via food is for you to find your way and learn and listen to your body. It’s to encourage you to look inwards rather than outwards. The sort of questions that will arise along the way will empower you to take charge of your own health. Note them down. It will make for a great and insightful session each time.
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <!--FAQ Accordin Start-->
            </div>
        </div>
    </div>
</div>
<!--FAQ Area End-->
@endsection