@extends('admin.layouts.appadmin')
 
 @section('content')
 <!-- page content -->
 <div class="right_col" role="main">
      <div class="page-title">
        <div class="title_left">
          <h3>Coaching Management</h3>
          <h4 style="display:block;">View Answered</h4>
        </div>
      </div>
       @foreach($user as $value)
      <div class="wrap">
        <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Name</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">

              <p>{{$value->fname}}</p>
            </div>
          </div>
        </div>
        
          <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Email</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
              <p>{{$value->username}}</p>
            </div>
          </div>
        </div>
        @endforeach
         @foreach($data as $value)
        <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Address</h4>
            </div>
          </div>
           
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
             <p>{{$value->adress}}</p>
            </div>
          </div>
        </div>
      
        <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Whatsapp No</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
             <p>{{$value->whatsapp}}</p>
            </div>
          </div>
        </div>
      
        <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Age</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
             <p>{{$value->age}}</p>
            </div>
          </div>
        </div>
        <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Gender</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->gender}}</p>
            </div>
          </div>
        </div>
        <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Date of Birth</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->dob}}</p>
            </div>
          </div>
        </div>
        
        
        
        
          <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Poor Immunity</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->poorImmunity}}</p>
            </div>
          </div>
        </div>
        
        
        
          <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Acidity</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->acidity}}</p>
            </div>
          </div>
        </div>
        
        
        
        
          <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Constipation</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->constipation}}</p>
            </div>
          </div>
        </div>
        
        
        
        
          <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Diarrhoea</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->diarrhoea}}</p>
            </div>
          </div>
        </div>
        
        
        
        
          <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Leaky Gut</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->leakyGut}}</p>
            </div>
          </div>
        </div>
        
        
        
        
        
          <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Diagnosed IBS</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->diagnosedIBS}}</p>
            </div>
          </div>
        </div>
        
        
     
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Immune Diseases</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->immuneDiseases}}</p>
            </div>
          </div>
        </div>
        
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Food Alergies  </h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->foodAlergies}}</p>
            </div>
          </div>
        </div>
        
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Insulin Resistance</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->insulinResistance}}</p>
            </div>
          </div>
        </div>
        
        
        
                <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Current Weigt</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->currentWeigt}}</p>
            </div>
          </div>
        </div>
        
                <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Weight Six Month Before</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->weightSixMonthBefore}}</p>
            </div>
          </div>
        </div>
        
        
                <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Weight One Year Before</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->weighOneYearBefore}}</p>
            </div>
          </div>
        </div>
        
        
                <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>weight Different</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->weightDifferent}}</p>
            </div>
          </div>
        </div>
        
        
                <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Intent Lose</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->intentLose}}</p>
            </div>
          </div>
        </div>
        
        
        
                <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Relationship</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->relationship}}</p>
            </div>
          </div>
        </div>
        
        
        
                <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>children</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->children}}</p>
            </div>
          </div>
        </div>
        
        
        
                <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Occupation</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->occupation}}</p>
            </div>
          </div>
        </div>
        
        
        
                <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>lineOfWork</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->lineOfWork}}</p>
            </div>
          </div>
        </div>
        
        
        
                <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Stress On Work</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->stressOnWork}}</p>
            </div>
          </div>
        </div>
        
        
        
                <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Work Hour</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->workHour}}</p>
            </div>
          </div>
        </div>
        
        
        
                <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>demesticLife</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->demesticLife}}</p>
            </div>
          </div>
        </div>
        
        
        
        
                <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>healthConcerns</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->healthConcerns}}</p>
            </div>
          </div>
        </div>
        
        
        
        
                <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>diagnosed</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->diagnosed}}</p>
            </div>
          </div>
        </div>
        
        
        
        
        
     <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Medication</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->medication}}</p>
            </div>
          </div>
        </div>
        
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>suppliments</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->suppliments}}</p>
            </div>
          </div>
        </div>
        
        
        
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>helathProblem</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->helathProblem}}</p>
            </div>
          </div>
        </div>
        
        
        
        
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Blood Group</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->bloodGroop}}</p>
            </div>
          </div>
        </div>
        
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Control pills</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->controlpills}}</p>
            </div>
          </div>
        </div>
        
        
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Menstrual Cycle</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->menstrualCycle}}</p>
            </div>
          </div>
        </div>
        
        
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Allergies Or Sensitivities</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->allergiesOrSensitivities}}</p>
            </div>
          </div>
        </div>
        
        
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>How Long Allergies Or Sensitivities</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->howLongAllergiesOrSensitivities}}</p>
            </div>
          </div>
        </div>
        
        
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Food Allergies</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->foodAllergies}}</p>
            </div>
          </div>
        </div>
        
        
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Physically Active</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->physicallyActive}}</p>
            </div>
          </div>
        </div>
        
        
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Daily Exercise</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->dailyExercise}}</p>
            </div>
          </div>
        </div>
        
        
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>food Timing</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->foodTiming}}</p>
            </div>
          </div>
        </div>
        
        
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Exercise Time Morning</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->exerciseTimeMoring}}</p>
            </div>
          </div>
        </div>
        
        
        
        
        <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Exercise Time Afternoon</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->exerciseTimeAfternoon}}</p>
            </div>
          </div>
        </div>
        
        
        
        
        <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Exercise Time Evening</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->exerciseTimeEvening}}</p>
            </div>
          </div>
        </div>
        
        
        
        
        <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Exercise Time Night</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->exerciseTimeNight}}</p>
            </div>
          </div>
        </div>
        
        
        
        
        <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Exercise From</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->exerciseFrom}}</p>
            </div>
          </div>
        </div>
        
        
        
        
        <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Exercise Portion Size</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->exercisePortionSize}}</p>
            </div>
          </div>
        </div>
        
        
        
        
        
        <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Water Quantity</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->waterQuantity}}</p>
            </div>
          </div>
        </div>
        
        
        
        
        <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Consume Drink</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->consumeDrink}}</p>
            </div>
          </div>
        </div>
        
        
        
        
        <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Consume Smoking</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->consumeSmoking}}</p>
            </div>
          </div>
        </div>
        
        
        
        
        <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Consume Soft Drinkg</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->consumeSoftDrink}}</p>
            </div>
          </div>
        </div>
        
        
        
        
        <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Consume Drink From</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->consumeDrinkFrom}}</p>
            </div>
          </div>
        </div>
        
        
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Addiction</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->addiction}}</p>
            </div>
          </div>
        </div>
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Food Sugar Drugs</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->foodSugarDrugs}}</p>
            </div>
          </div>
        </div>
        
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Eat From</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->eatFrom}}</p>
            </div>
          </div>
        </div>
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Daily Eat More When Upset</h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->dailyEatMoreWhenUpset}}</p>
            </div>
          </div>
        </div>
        
        
        
         <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Teach More </h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->teachMore}}</p>
            </div>
          </div>
        </div>
        
        
        
        <div class="row borderbotms">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dbicons">
              <h4>Relevant Info Description </h4>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="dbparahsss">
            <p>{{$value->relevantInfoDescription}}</p>
            </div>
          </div>
        </div>
        
        
        
        
        
        
        
        
      </div>
      @endforeach
      <div class="row">
        <div class="col-lg-12 col-sm-10 col-md-12 col-xs-12">
          <div class="dividers"></div>
        </div>
      </div>

      <form method="POST" action="{{route('assign.diet.plan')}}">
        @csrf
      <div class="wrap">
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <div class="form-group">
              <label>Diet Plan</label>
              <select class="form-control" name="diet_plan_id">
                @foreach($deitPlan as $value)
                  <option value="{{$value->pk_id}}">{{$value->name}}</option>
                @endforeach
              </select>
               @foreach($data as $data)
              <input type="hidden" name="user_id" value="{{$data->user_id}}">
                @endforeach
            </div>
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-success btn-lg pull-right">Submit</button>
          </div>
        </div>
      </div>
      </form>

    </div>
    <!-- /page content --> 
    @endsection