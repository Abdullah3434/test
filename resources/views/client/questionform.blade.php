@extends('client.layouts.appclient')
@section('content')
<div class="breadcrumb-tow mb-120">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-title">
          <h1>Answer Question</h1>
        </div>
        <div class="breadcrumb-content breadcrumb-content-tow">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li class="active">Answer Question</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Breadcrumb Tow End--> 
<!--Checkout Area Strat-->

<div class="wrap">
  <div class="checkout-area mb-80"> @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong> </div>
    @endif
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-12">
          <form  method="POST" action="{{ route('question.answer.form.submit') }}" >
            @csrf
            <div class="checkbox-form">
              <h3>Health History Form</h3>
              <div class="row">
                <div class="col-md-12">
                  <div class="country-select clearfix">
                    <label>Health History for Female/Male for Gut Health targeting
                      problems including: </label>
                    <div class="form-check">
                      <input  name="poorImmunity" value="yes" class="form-check-input" type="checkbox">
                      <label class="form-check-label"> Poor Immunity </label>
                    </div>
                    <div class="form-check">
                      <input  name="acidity"  value="yes" class="form-check-input" type="checkbox">
                      <label class="form-check-label"> Acidity </label>
                    </div>
                    <div class="form-check">
                      <input name="constipation"  value="yes" class="form-check-input" type="checkbox">
                      <label class="form-check-label"> Constipation </label>
                    </div>
                    <div class="form-check">
                      <input  name="diarrhoea"  value="yes" class="form-check-input" type="checkbox">
                      <label class="form-check-label"> Diarrhoea </label>
                    </div>
                    <div class="form-check">
                      <input  name="leakyGut"  value="yes" class="form-check-input" type="checkbox">
                      <label class="form-check-label"> Leaky Gut which is precursor to: </label>
                    </div>
                    <div class="form-check">
                      <input  name="diagnosedIBS"  value="yes" class="form-check-input" type="checkbox">
                      <label class="form-check-label"> Diagnosed IBS </label>
                    </div>
                    <div class="form-check">
                      <input name="immuneDiseases"  value="yes" value="yes" class="form-check-input" type="checkbox">
                      <label class="form-check-label"> Auto Immune Diseases </label>
                    </div>
                    <div class="form-check">
                      <input name="foodAlergies"  value="yes" class="form-check-input" type="checkbox">
                      <label class="form-check-label"> Food alergies and intolerance </label>
                    </div>
                    <div class="form-check">
                      <input  name="insulinResistance"  value="yes" class="form-check-input" type="checkbox">
                      <label class="form-check-label"> Insulin resistance </label>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <input value="{{session::get('fname')}} {{session::get('lname')}}" name="name" type="hidden" disabled>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Address </label>
                    <input   name ="adress"  type="text" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <input value="{{session::get('username')}}"  name ="email" type="hidden" disabled>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Phone Number </label>
                    <input  class="form-control" name="whatsapp" type="tel" required>
                  </div>
                </div>
                <!-- <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Zoom Id  </label>
                    <input type="text" name ="zoomId" >
                  </div>
                </div> -->
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Age </label>
                    <input name ="age"  type="text" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Gender </label>
                    <select id="gender" name ="gender"  required>
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>DOB </label>
                    <input class="form-control" name="dob" type="date" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="checkout-form-list">
                    <label>Current Weight </label>
                    <input  class="form-control" name="currentWeigt" type="number" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="checkout-form-list">
                    <label>Weight 6 Month Ago </label>
                    <input class="form-control" name="weightSixMonthBefore" type="number" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="checkout-form-list">
                    <label>Weight 1 Year Ago </label>
                    <input class="form-control" name="weighOneYearBefore" type="number" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Would you like your weight to different?</label>
                    <input type="radio" name="weightDifferent" value="yes" onclick="show2();"/>
                    Yes
                    <input type="radio" name="weightDifferent"  value="no" onclick="show1();"  checked/>
                    No </div>
                  <div id="div1" class="hide">
                    <div class="col-md-12">
                      <div class="checkout-form-list">
                        <label>How to do you intend to lose?</label>
                        <input placeholder=""  name="intentLose"  type="text" >
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="checkout-form-list">
                        <label>Relationship Status</label>
                        <select name ="relationship" >
                          <option value="single">Single</option>
                          <option value="merried">Married</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="checkout-form-list">
                        <label>Children</label>
                        <input placeholder="" class="form-control" name="children"  type="number">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="checkout-form-list">
                        <label>Occupation</label>
                        <input placeholder="" name="Occupation"  type="text">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="checkout-form-list">
                        <label>Do you like your line of work?</label>
                        <input placeholder="" name="lineOfWork"  type="text">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="checkout-form-list">
                        <label>How much stress do you face at work? Please describe.</label>
                        <textarea class="form-control" name="stressOnWork"  rows="9"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="checkout-form-list">
                        <label>Do you work long hours?</label>
                        <input placeholder="" name="workHour"  type="text">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="checkout-form-list">
                        <label>Describe your domestic life?</label>
                        <textarea class="form-control" name="demesticLife"  rows="9"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="checkout-form-list">
                        <label>Please list your main gut health concerns?</label>
                        <textarea class="form-control" name="healthConcerns"  rows="9"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="checkout-form-list">
                        <label>When were you diagnosed?</label>
                        <input placeholder="" name="diagnosed"  type="text">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="checkout-form-list">
                        <label>What medication are you taking if any?</label>
                        <input placeholder="" name="medication"  type="text">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="checkout-form-list">
                        <label>What supplements are you taking if any?</label>
                        <textarea class="form-control" name="suppliments"  rows="9"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Are there members of your family with the same gut health problem</label>
                    <input type="radio" name="helathProblem" value="yes" />
                    Yes
                    <input type="radio" name="helathProblem"  value="no" checked />
                    No </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>What is your blood type?</label>
                    <select  name="bloodGroop" required>
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Are you taking hormone birth control pills?</label>
                    <input type="radio" name="controlpills" value="yes"/>
                    Yes
                    <input type="radio" name="controlpills"  value="no" checked/>
                    No </div>
                </div>
                <div id="femaleonlyDiv" class="col-md-12">
                  <div  class="checkout-form-list">
                    <label>(Females only) Describe your menstrual cycle.</label>
                    <input placeholder="" id="femaleonly" name="menstrualCycle"  type="text" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label class="green">Describe your digestion; constipation/ diarrhoea/gas?
                      And for how long has it been this way?Do you have any
                      food allergies or sensitivities?</label>
                    <label>constipation/ diarrhoea/gas</label>
                    <input placeholder="" name="allergiesOrSensitivities"  type="text" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>How long has it been this way?</label>
                    <input placeholder="" name="howLongAllergiesOrSensitivities"  type="text" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Do you have any food allergies or sensitivities?</label>
                    <input type="radio" name="foodAllergies" value="yes"/>
                    Yes
                    <input type="radio" name="foodAllergies"  value="no" checked/>
                    No </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Are you physically active?</label>
                    <input type="radio" name="physicallyActive" value="yes"/>
                    Yes
                    <input type="radio" name="physicallyActive"  value="no" checked/>
                    No </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Do you engage in any daily exercise? If so please describe. If you don’t please explain why</label>
                    <input type="radio" name="dailyExercise" value="yes"/>
                    Yes
                    <input type="radio" name="dailyExercise"  value="no" checked/>
                    No
                    <textarea class="form-control" rows="9" required></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label class="green">Food.<br>
                      Please describe with timings in detail,</label>
                    <label>what you eat and drink for breakfast through to dinner</label>
                    <input placeholder="" name="foodTiming"  type="text" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <label>what time you exercise if you do so?</label>
                  <div class="form-check">
                    <input class="form-check-input" value="morning" name="exerciseTimeMoring"   type="checkbox">
                    <label class="form-check-label"> Morning </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" value="afternoon"  name="exerciseTimeAfternoon"  type="checkbox" >
                    <label class="form-check-label"> Afternoon </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" value="evening" name="exerciseTimeEvening"  type="checkbox" >
                    <label class="form-check-label"> Evening </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input"  name="exerciseTimeNight"  type="checkbox">
                    <label class="form-check-label"> Night </label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>and for how long?</label>
                    <input placeholder=""  name="exerciseFrom" type="text" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Describe your portion size?</label>
                    <input placeholder="" name="exercisePortionSize"  type="text" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>How much water do you drink in the day?</label>
                    <input placeholder="" name="waterQuantity"  type="text" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <label>Do you drink or smoke or consume soft drinks?</label>
                  <div class="form-check">
                    <input class="form-check-input" value="drink" name="consumeDrink"  type="checkbox" >
                    <label class="form-check-label"> Drink </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" value="smoking" name="consumeSmoking"  type="checkbox">
                    <label class="form-check-label"> Smoking </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" value="softDrink" name="consumeSoftDrink"  type="checkbox">
                    <label class="form-check-label"> Soft Drink </label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>How often?</label>
                    <input placeholder="" value="" name="consumeDrinkFrom" type="text" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Do you have any major addiction?</label>
                    <input placeholder=""  value="" name="addiction" type="text" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Food or sugar or drugs?</label>
                    <input placeholder="" value="" name="foodSugarDrugs"  type="text" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Do you eat out a lot, or cook at home ?</label>
                    <input placeholder="" value="" name="eatFrom" type="text" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Do you eat more when you are upset or stressed or angry?</label>
                    <input type="radio" name="dailyEatMoreWhenUpset" value="yes"/>
                    Yes
                    <input type="radio" name="dailyEatMoreWhenUpset"  value="no" checked/>
                    No 
                    <!-- <textarea class="form-control" rows="9"></textarea> --> 
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>If so what do you teach for?</label>
                    <input placeholder="" name="teachMore"  type="text" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Is there any other relevant information I need to know?</label>
                    <input type="radio" name="relevantInfo" id="relevantInfoYes" value="yes"/>
                    Yes
                    <input type="radio" name="relevantInfo"  id="relevantInfoNo"  value="no" checked/>
                    No 
                  </div>
                </div>
                <div id="relevantInfoDiv" style="display:none" class="col-md-12">
                  <div class="checkout-form-list">
                    <label>If Yes</label>
                    <textarea id="relevantInfoDescriptionYes"  class="form-control" name="relevantInfoDescription"  rows="9"></textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="order-button-payment">
                    <input value="Submit" type="submit">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection