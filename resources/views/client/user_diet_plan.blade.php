@extends('client.layouts.appclient')
@section('content') 

<!-- page content -->
<div class="container"> @if($dietplan>0)
  @foreach($dietplan as $results )
  <div class="row">
    <div class="col-lg-12">
      <div class="des">
        <h3 class="green">{{$results->name}}</h3>
        <p>{{$results->description}}.</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="row">
    <div class="col-lg-12 col-sm-10 col-md-12 col-xs-12">
      <div class="dividers"></div>
    </div>
  </div>
  <div class="page-title">
    <h3><b>Saturday</b></h3>
  </div>
  <div class="page-title">
    <h4><b>Breakfast</b></h4>
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
  @if(count($saturday)>0)
  @foreach($saturday as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Lunch</b></h4>
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
  @if(count($saturdaylunch)>0)
  @foreach($saturdaylunch as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Snacks</b></h4>
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
  @if(count($saturdaysnacks)>0)
  @foreach($saturdaysnacks as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Dinner</b></h4>
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
  @if(count($saturdaydinner)>0)
  @foreach($saturdaydinner as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h3><b>Sunday</b></h3>
  </div>
  <div class="page-title">
    <h4><b>Breakfast</b></h4>
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
  @if(count($sundaybreakfast)>0)
  @foreach($sundaybreakfast as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->recepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Lunch</b></h4>
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
  @if(count($sundaylunch)>0)
  @foreach($sundaylunch as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->recepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Snacks</b></h4>
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
  @if(count($sundaysnacks)>0)
  @foreach($sundaysnacks as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->recepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Dinner</b></h4>
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
  @if(count($sundaydinner)>0)
  @foreach($sundaydinner as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->recepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h3><b>Monday</b></h3>
  </div>
  <div class="page-title">
    <h4><b>Breakfast</b></h4>
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
  @if(count($mondaybreakfast)>0)
  @foreach($mondaybreakfast as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Lunch</b></h4>
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
  @if(count($mondaylunch)>0)
  @foreach($mondaylunch as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Snacks</b></h4>
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
  @if(count($mondaysnacks)>0)
  @foreach($mondaysnacks as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Dinner</b></h4>
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
  @if(count($mondaydinner)>0)
  @foreach($mondaydinner as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h3><b>Tuesday</b></h3>
  </div>
  <div class="page-title">
    <h4><b>Breakfast</b></h4>
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
  @if(count($tuesdaybreakfast)>0)
  @foreach($tuesdaybreakfast as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Lunch</b></h4>
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
  @if(count($tuesdaylunch)>0)
  @foreach($tuesdaylunch as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Snacks</b></h4>
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
  @if(count($tuesdaysnacks)>0)
  @foreach($tuesdaysnacks as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Dinner</b></h4>
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
  @if(count($tuesdaydinner)>0)
  @foreach($tuesdaydinner as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h3><b>Wednesday</b></h3>
  </div>
  <div class="page-title">
    <h4><b>Breakfast</b></h4>
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
  @if(count($wednesdaybreakfast)>0)
  @foreach($wednesdaybreakfast as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Lunch</b></h4>
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
  @if(count($wednesdaylunch)>0)
  @foreach($wednesdaylunch as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Snacks</b></h4>
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
  @if(count($wednesdaysnacks)>0)
  @foreach($wednesdaysnacks as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Dinner</b></h4>
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
  @if(count($wednesdaydinner)>0)
  @foreach($wednesdaydinner as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h3><b>Thursday</b></h3>
  </div>
  <div class="page-title">
    <h4><b>Breakfast</b></h4>
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
  @if(count($thursdaybreakfast)>0)
  @foreach($thursdaybreakfast as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Lunch</b></h4>
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
  @if(count($thursdaylunch)>0)
  @foreach($thursdaylunch as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Snacks</b></h4>
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
  @if(count($thursdaysnacks)>0)
  @foreach($thursdaysnacks as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Dinner</b></h4>
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
  @if(count($thursdaydinner)>0)
  @foreach($thursdaydinner as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h3><b>Friday</b></h3>
  </div>
  <div class="page-title">
    <h4><b>Breakfast</b></h4>
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
  @if(count($fridaybreakfast)>0)
  @foreach($fridaybreakfast as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Lunch</b></h4>
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
  @if(count($fridaylunch)>0)
  @foreach($fridaylunch as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Snacks</b></h4>
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
  @if(count($fridaysnacks)>0)
  @foreach($fridaysnacks as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  <div class="page-title">
    <h4><b>Dinner</b></h4>
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
  @if(count($fridaydinner)>0)
  @foreach($fridaydinner as $results)
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->item}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->reciepe}}</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="dbparahs" style="text-align:center">
        <p>{{$results->grocery}}</p>
      </div>
    </div>
  </div>
  @endforeach
  @endif </div>
<!-- /page content --> 
@endsection 