@extends('admin.layouts.appadmin')

@section('content') 
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Coaching Management</h3>
            <h4 style="display: block;">Add Diet Plan</h4>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">  
          <div class="col-md-12 col-sm-12 col-xs-12">
                @if($dietplan>0)
                     
            <form method="post" action="{{URL('/')}}/admin/home/edit/diet/plan/{{$dietplan[0]->pk_id}}" class="login-form" enctype="multipart/form-data">
          
@endif
      
           
           
            {{ csrf_field() }}
            @if($errors->any())

                            
                            <div class="alert alert-danger">
  <strong>Danger!</strong> {{$errors->first()}}
</div>
  @endif
  


              <div class="x_content">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      @if(count($dietplan)>0)
                      @foreach($dietplan as $results)
                    <div class="row">
                      <div class="form-group">
                        <label>Diet Plan Name</label>
                        <input type="text" class="form-control" name="diet" value="{{$results->name}}" required>
                      </div>
                      <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="5" name="description" value="{{$results->description}}">{{$results->description}}</textarea>
                      </div>
                    </div>
                  </div>
                </div>
@endforeach
@endif
                <div class="col-md-12">
                  <div class="divider"></div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h3><b>Sunday</b></h3>
                    </div>
                  </div>
                </div>
                 @if(count($sundaybreakfast)>0)
              @foreach($sundaybreakfast as $results)
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Breakfast</b></h5>
                      <input type="hidden" name="breakfast" value="breakfast">
                    </div>
                  </div>
                </div>
                <div class="input_field_wrap">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="mytextt[]"  class="form-control"  value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="mytextt[]" class="form-control"  value="{{$results->recepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="mytextt[]" class="form-control"  value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
@endif
                <br>
                <button class="add_fields_button btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Lunch</b></h5>
                      <input type="hidden" name="lunch" value="lunch">
                    </div>
                  </div>
                </div>
                  @if(count($sundaylunch)>0)
              @foreach($sundaylunch as $results)
                <div class="input_field_wrap_lunch_sunday">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="mytextt1[]" class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="mytextt1[]" class="form-control" value="{{$results->recepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="mytextt1[]"  class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                 @endforeach
@endif
                <br>
                <button class="add_fields_button_lunch_sunday btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                


                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Snacks</b></h5>
                      <input type="hidden" name="snacks" value="snacks">
                    </div>
                  </div>
                </div>
                 @if(count($sundaysnacks)>0)
              @foreach($sundaysnacks as $results)
                <div class="input_field_wrap_snacks_sunday">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="mytextt2[]"  class="form-control"  value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="mytextt2[]" class="form-control"  value="{{$results->recepe}}"  >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="mytextt2[]" class="form-control"  value="{{$results->grocery}}"  >
                      </div>
                    </div>
                  </div>
                </div>
                 @endforeach
@endif
                <br>
                <button class="add_fields_button_snacks_sunday btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
           
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Dinner</b></h5>
                      <input type="hidden" name="dinner" value="dinner">
                    </div>
                  </div>
                </div>
                  @if(count($sundaydinner)>0)
              @foreach($sundaydinner as $results)
                <div class="input_field_wrap_dinner_sunday">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="mytextt3[]" class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="mytextt3[]" class="form-control" value="{{$results->recepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="mytextt3[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                 @endforeach
@endif
                <br>
                <button class="add_fields_button_dinner_sunday btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                <div class="col-md-12">
                  <div class="divider"></div>
                </div>


<!-- //////////......................,monday.................//////// -->

                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h3><b>Monday</b></h3>
                      
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Breakfast</b></h5>
                      <input type="hidden" name="breakfast" value="breakfast">
                    </div>
                  </div>
                </div>
                @if(count($mondaybreakfast)>0)
              @foreach($mondaybreakfast as $results)
                <div class="input_field_wraps">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="mytextt4[]" class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="mytextt4[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="mytextt4[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                 @endforeach
@endif
                <br>
                <button class="add_field_button btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Lunch</b></h5>
                      <input type="hidden" name="lunch" value="lunch">
                    </div>
                  </div>
                </div>
                 @if(count($mondaylunch)>0)
              @foreach($mondaylunch as $results)
                <div class="input_field_wrap_lunch_monday">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="mytextt5[]" class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="mytextt5[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="mytextt5[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
@endif
                <br>
                <button class="add_field_button_lunch_monday btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Snacks</b></h5>
                      <input type="hidden" name="snacks" value="sncaks">
                    </div>
                  </div>
                </div>
                 @if(count($mondaysnacks)>0)
              @foreach($mondaysnacks as $results)
                <div class="input_field_wrap_snacks_monday">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="mytextt6[]"  class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="mytextt6[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="mytextt6[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                 @endforeach
@endif
                <br>
                <button class="add_field_button_snacks_monday btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Dinner</b></h5>
                      <input type="hidden" name="dinner" value="dinner">
                    </div>
                  </div>
                </div>
                  @if(count($mondaydinner)>0)
              @foreach($mondaydinner as $results)
                <div class="input_field_wrap_dinner_monday">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="mytextt7[]" class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="mytextt7[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="mytextt7[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                 @endforeach
@endif
                <br>
                <button class="add_field_button_dinner_monday btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
      
<!-- //////.........................tuesday................................//// -->

<div class="col-md-12">
                  <div class="divider"></div>
                </div>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h3><b>Tuesday</b></h3>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Breakfast</b></h5>
                      <input type="hidden" name="breakfast" value="breakfast">
                    </div>
                  </div>
                </div>
                 @if(count($tuesdaybreakfast)>0)
              @foreach($tuesdaybreakfast as $results)
                <div class="input_field_wrapss">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="mytextt8[]" class="form-control" value="{{$results->item}}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="mytextt8[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="mytextt8[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                 @endforeach
@endif
                <br>
                <button class="add_field_buttonss btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Lunch</b></h5>
                      <input type="hidden" name="lunch" value="lunch">
                    </div>
                  </div>
                </div>
                   @if(count($tuesdaylunch)>0)
              @foreach($tuesdaylunch as $results)
                <div class="input_field_wrap_lunch_tuesday">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="mytextt9[]"  class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text"  name="mytextt9[]"  class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text"  name="mytextt9[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
@endif
                <br>
                <button class="add_field_button_lunch_tuesday btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Snacks</b></h5>
                      <input type="hidden" name="snacks" value="snacks">
                    </div>
                  </div>
                </div>
                 @if(count($tuesdaysnacks)>0)
              @foreach($tuesdaysnacks as $results)
                <div class="input_field_wrap_snacks_tuesday">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="mytextt10[]"  class="form-control" value="{{$results->item}}"  >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="mytextt10[]" class="form-control" value="{{$results->reciepe}}"  >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="mytextt10[]" class="form-control" value="{{$results->grocery}}"  >
                      </div>
                    </div>
                  </div>
                </div>
                 @endforeach
@endif
                <br>
                <button class="add_field_button_snacks_tuesday btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Dinner</b></h5>
                      <input type="hidden" name="dinner" value="dinner">
                    </div>
                  </div>
                </div>
                @if(count($tuesdaydinner)>0)
              @foreach($tuesdaydinner as $results)
                <div class="input_field_wrap_dinner_tuesday">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="mytextt11[]"  class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="mytextt11[]"  class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="mytextt11[]"  class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
@endif
                <br>
                <button class="add_field_button_dinner_tuesday btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
              <!-- //.......=============......Wednesday.....=================// -->

              <div class="col-md-12">
                  <div class="divider"></div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h3><b>Wednesday</b></h3>
                    </div>
                  </div>
                </div>
                  @if(count($wednesdaybreakfast)>0)
              @foreach($wednesdaybreakfast as $results)
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Breakfast</b></h5>
                      <input type="hidden" name="breakfast" value="breakfast">
                    </div>
                  </div>
                </div>
                <div class="input_field_wrapsss">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="mytextt12[]"  class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="mytextt12[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="mytextt12[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                 @endforeach
@endif
                <br>
                <button class="add_field_buttonsss btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Lunch</b></h5>
                      <input type="hidden" name="lunch" value="lunch">
                    </div>
                  </div>
                </div>
                 @if(count($wednesdaylunch)>0)
              @foreach($wednesdaylunch as $results)
                <div class="input_field_wrap_lunch_wed">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="mytextt13[]" class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="mytextt13[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="mytextt13[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
     @endforeach
@endif
                <br>
                <button class="add_field_button_lunch_wed btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Snacks</b></h5>
                      <input type="hidden" name="snacks" value="snacks">
                    </div>
                  </div>
                </div>
                @if(count($wednesdaysnacks)>0)
              @foreach($wednesdaysnacks as $results)
                <div class="input_field_wrap_snacks_wed">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="mytextt14[]" class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="mytextt14[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="mytextt14[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
     @endforeach
@endif
                <br>
                <button class="add_field_button_snacks_wed btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Dinner</b></h5>
                      <input type="hidden" name="dinner" value="dinner">
                    </div>
                  </div>
                </div>
                 @if(count($wednesdaydinner)>0)
              @foreach($wednesdaydinner as $results)
                <div class="input_field_wrap_dinner_wed">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="mytextt15[]" class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="mytextt15[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="mytextt15[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                  @endforeach
@endif
                <br>
                <button class="add_field_button_dinner_wed btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                
                <div class="col-md-12">
                  <div class="divider"></div>
                </div>


                <!-- //.................Thursday....................................//
               -->

               <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h3><b>Thursday</b></h3>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Breakfast</b></h5>
                      <input type="hidden" name="breakfast" value="breakfast">
                    </div>
                  </div>
                </div>
                 @if(count($thursdaybreakfast)>0)
              @foreach($thursdaybreakfast as $results)
                <div class="input_field_wrapssss">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="thursday[]" class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="thursday[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="thursday[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                  @endforeach
@endif
                <br>
                <button class="add_field_buttonssss btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Lunch</b></h5>
                      <input type="hidden" name="lunch" value="lunch">
                    </div>
                  </div>
                </div>
                 @if(count($thursdaylunch)>0)
              @foreach($thursdaylunch as $results)
                <div class="input_field_wrap_lunch_thurs">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text"  name="thursday1[]" class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="thursday1[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="thursday1[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                 @endforeach
@endif
                <br>
                <button class="add_field_button_lunch_thurs btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Snacks</b></h5>
                      <input type="hidden" name="snacks" value="snacks">
                    </div>
                  </div>
                </div>
                  @if(count($thursdaysnacks)>0)
              @foreach($thursdaysnacks as $results)
                <div class="input_field_wrap_snacks_thurs">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="thursday2[]" class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="thursday2[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="thursday2[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                 @endforeach
@endif
                <br>
                <button class="add_field_button_snacks_thurs btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Dinner</b></h5>
                      <input type="hidden" name="dinner" value="dinner">
                    </div>
                  </div>
                </div>
                @if(count($thursdaydinner)>0)
              @foreach($thursdaydinner as $results)
                <div class="input_field_wrap_dinner_thurs">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="thursday3[]" class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text"  name="thursday3[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text"  name="thursday3[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                 @endforeach
@endif
                <br>
                <button class="add_field_button_dinner_thurs btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                

                <!-- ///////.........============.....Friday........===========////////// -->

                
                <div class="col-md-12">
                  <div class="divider"></div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h3><b>Friday</b></h3>
                      <input type="hidden" name="breakfast" value="breakfast">
                    </div>
                  </div>
                </div>
                 @if(count($fridaybreakfast)>0)
              @foreach($fridaybreakfast as $results)
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Breakfast</b></h5>
                    </div>
                  </div>
                </div>
                <div class="input_field_wrap6">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="friday[]" class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="friday[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="friday[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
@endif
                <br>
                <button class="add_field_button6 btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Lunch</b></h5>
                      <input type="hidden" name="lunch" value="lunch">
                    </div>
                  </div>
                </div>
                 @if(count($fridaylunch)>0)
              @foreach($fridaylunch as $results)
                <div class="input_field_wrap_lunch_fri">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="friday1[]" class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="friday1[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="friday1[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
@endif
                <br>
                <button class="add_field_button_lunch_fri btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Snacks</b></h5>
                      <input type="hidden" name="snacks" value="snacks">
                    </div>
                  </div>
                </div>
                 @if(count($fridaysnacks)>0)
              @foreach($fridaysnacks as $results)
                <div class="input_field_wrap_snacks_fri">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="friday2[]" class="form-control" value="{{$results->item}}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="friday2[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="friday2[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                 @endforeach
@endif
                <br>
                <button class="add_field_button_snacks_fri btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Dinner</b></h5>
                      <input type="hidden" name="dinner" value="dinner">
                    </div>
                  </div>
                </div>
                 @if(count($fridaydinner)>0)
              @foreach($fridaydinner as $results)
                <div class="input_field_wrap_dinner_fri">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="friday3[]"  class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="friday3[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="friday3[]" class="form-control" value="{{$results->grocery}}">
                      </div>
                    </div>
                  </div>
                </div>
      @endforeach
@endif
                <br>
                <button class="add_field_button_dinner_fri btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
               <!-- ///////.........==========.......Saturday......===========////////// -->
                
                <div class="col-md-12">
                  <div class="divider"></div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h3><b>Saturday</b></h3>
                    </div>
                  </div>
                </div>
               
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Breakfast</b></h5>
                      <input type="hidden" name="breakfast" value="breakfast">
                    </div>
                  </div>
                </div>
                  @if(count($saturday)>0)
              @foreach($saturday as $results)
                <div class="input_field_wrap7">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="saturday[]" class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="saturday[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="saturday[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                  @endforeach
@endif
                <br>
                <button class="add_field_button7 btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Lunch</b></h5>
                      <input type="hidden" name="lunch" value="lunch">
                    </div>
                  </div>
                </div>
                 @if(count($saturdaylunch)>0)
              @foreach($saturdaylunch as $results)
                <div class="input_field_wrap_lunch_sat">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="saturday1[]" class="form-control" value="{{$results->item}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="saturday1[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="saturday1[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                 @endforeach
@endif
                <br>
                <button class="add_field_button_lunch_sat btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Snacks</b></h5>
                      <input type="hidden" name="snacks" value="snacks">
                    </div>
                  </div>
                </div>
                  @if(count($saturdaysnacks)>0)
              @foreach($saturdaysnacks as $results)
                <div class="input_field_wrap_snacks_sat">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text"  name="saturday2[]" class="form-control" value="{{$results->item}}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="saturday2[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="saturday2[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
@endif
                <br>
                <button class="add_field_button_snacks_sat btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="page-title">
                      <h5><b>Dinner</b></h5>
                      <input type="hidden" name="dinner" value="dinner">
                    </div>
                  </div>
                </div>
                @if(count($saturdaydinner)>0)
              @foreach($saturdaydinner as $results)
                <div class="input_field_wrap_dinner_sat">
                  <div class="row>">
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Item</label>
                        <input type="text" name="saturday3[]"  class="form-control" value="{{$results->item}}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Reciepe Direction</label>
                        <input type="text" name="saturday3[]" class="form-control" value="{{$results->reciepe}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class=" form-group">
                        <label for="text">Grocery List</label>
                        <input type="text" name="saturday3[]" class="form-control" value="{{$results->grocery}}" >
                      </div>
                    </div>
                  </div>
                </div>
                 @endforeach
@endif
                <br>
                <button class="add_field_button_dinner_sat btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
     


                <div class="col-md-6 pull-right">
                  <button type="submit" class="btn btn-success btn-lg pull-right">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content --> 
    @endsection
   