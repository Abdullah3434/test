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
        <form method="post" action ="{{route('create.diet.plan.submit')}}" class="login-form" enctype="multipart/form-data">
          {{ csrf_field() }}
          @if($errors->any())
          <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
          @endif
          <div class="x_content">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="row">
                  <div class="form-group">
                    <label>Diet Plan Name</label>
                    <input type="text" class="form-control" name="diet" placeholder="Diet Plan Name" required>
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="5" name="description" placeholder="Description"></textarea>
                  </div>
                </div>
              </div>
            </div>
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
                    <input type="text" name="mytextt[]"  class="form-control"  placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="mytextt[]" class="form-control"  placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="mytextt[]" class="form-control"  placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_lunch_sunday">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="mytextt1[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="mytextt1[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="mytextt1[]"  class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_snacks_sunday">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="mytextt2[]"  class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="mytextt2[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="mytextt2[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_dinner_sunday">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="mytextt3[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="mytextt3[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="mytextt3[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wraps">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="mytextt4[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="mytextt4[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="mytextt4[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_lunch_monday">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="mytextt5[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="mytextt5[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="mytextt5[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_snacks_monday">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="mytextt6[]"  class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="mytextt6[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="mytextt6[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_dinner_monday">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="mytextt7[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="mytextt7[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="mytextt7[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrapss">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="mytextt8[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="mytextt8[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="mytextt8[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_lunch_tuesday">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="mytextt9[]"  class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text"  name="mytextt9[]"  class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text"  name="mytextt9[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_snacks_tuesday">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="mytextt10[]"  class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="mytextt10[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="mytextt10[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_dinner_tuesday">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="mytextt11[]"  class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="mytextt11[]"  class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="mytextt11[]"  class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
                    <input type="text" name="mytextt12[]"  class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="mytextt12[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="mytextt12[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_lunch_wed">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="mytextt13[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="mytextt13[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="mytextt13[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_snacks_wed">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="mytextt14[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="mytextt14[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="mytextt14[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_dinner_wed">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="mytextt15[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="mytextt15[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="mytextt15[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrapssss">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="thursday[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="thursday[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="thursday[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_lunch_thurs">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text"  name="thursday1[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="thursday1[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="thursday1[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_snacks_thurs">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="thursday2[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="thursday2[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="thursday2[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_dinner_thurs">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="thursday3[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text"  name="thursday3[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text"  name="thursday3[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
                    <input type="text" name="friday[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="friday[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="friday[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_lunch_fri">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="friday1[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="friday1[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="friday1[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_snacks_fri">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="friday2[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="friday2[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="friday2[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_dinner_fri">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="friday3[]"  class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="friday3[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="friday3[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap7">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="saturday[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="saturday[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="saturday[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_lunch_sat">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="saturday1[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="saturday1[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="saturday1[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_snacks_sat">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text"  name="saturday2[]" class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="saturday2[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="saturday2[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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
            <div class="input_field_wrap_dinner_sat">
              <div class="row>">
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Item</label>
                    <input type="text" name="saturday3[]"  class="form-control" placeholder="Item"  required >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Recipe Direction</label>
                    <input type="text" name="saturday3[]" class="form-control" placeholder="Recipe Direction"  required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class=" form-group">
                    <label for="text">Grocery List</label>
                    <input type="text" name="saturday3[]" class="form-control" placeholder="Grocery List" required >
                  </div>
                </div>
              </div>
            </div>
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