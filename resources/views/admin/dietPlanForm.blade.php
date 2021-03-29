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
  @if($data)
  <form method="POST" action = " @php if(Request::segment(3) != '') { echo route('create.diet.plan.update'); } else {  echo route('create.diet.plan.submit'); } @endphp" class="login-form" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{request()->segment(count(request()->segments()))}}">
    <!-- <div class="alert alert-danger"> <strong></strong> Error Message </div> -->
    
    <div class="x_content">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="row">
            <div class="form-group">
              <label>Diet Plan Name</label>
              <input type="text" class="form-control" name="dietPlanName" value="{{$data->name}}" placeholder="Diet Plan Name" required>
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control" rows="5" name="dietPlanDescription"  placeholder="Description">{{$data->description}}</textarea>
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
            <h5><b>Sundy</b></h5>
          </div>
        </div>
      </div>
      <div class="input_field_wrap">
        <div class="row>"> @php $sun = 0; $dataa = json_decode($data->dayDite); $dataa = json_decode($dataa->sunday);
          if(isset($dataa->Item)) { $sundayItemcount = count($dataa->Item); }  if(isset($dataa->Reciepe)){ $sundayReciepecount = count($dataa->Reciepe); }  if(isset($dataa->Grocery)) {$sundayGrocerycount = count($dataa->Grocery);}  @endphp
          @if(isset($sundayItemcount) >= 1 || isset($sundayReciepecount) >= 1 || isset($sundayGrocerycount) >= 1 )
          @for($i = 1; $i == $sundayItemcount || $i == $sundayReciepecount || $i == $sundayGrocerycount; $i++ )
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Item</label>
              <input type="text" name="sundayItem[]" value="@php if(isset($dataa->Item[$sun] )) { echo  $dataa->Item[$sun]; } @endphp"  class="form-control" placeholder="Item" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Reciepe Direction</label>
              <input type="text" name="sundayReciepe[]" class="form-control" value="@php if(isset($dataa->Reciepe[$sun] )) { echo  $dataa->Reciepe[$sun]; } @endphp"  placeholder="Reciepe Direction" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Grocery List</label>
              <input type="text" name="sundayGrocery[]" class="form-control" value="@php if(isset($dataa->Grocery[$sun] )) { echo  $dataa->Grocery[$sun]; } @endphp"  placeholder="Grocery List" required>
            </div>
          </div>
          @php $sun++; @endphp
          @endfor
          @else
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Item</label>
              <input type="text" name="sundayItem[]"   class="form-control" placeholder="Item" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Reciepe Direction</label>
              <input type="text" name="sundayReciepe[]" class="form-control"   placeholder="Reciepe Direction" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Grocery List</label>
              <input type="text" name="sundayGrocery[]" class="form-control"   placeholder="Grocery List" required>
            </div>
          </div>
          @endif </div>
      </div>
      <br>
      <button class="add_fields_button btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
      <div class="col-md-12">
        <div class="divider"></div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
          <div class="page-title">
            <h5><b>Monday</b></h5>
          </div>
        </div>
      </div>
      <div class="input_field_wraps">
        <div class="row>"> @php $mon = 0; $dataa = json_decode($data->dayDite); $dataa = json_decode($dataa->monday); 
          if(isset($dataa->Item)) {  $mondayItemcount = count($dataa->Item); } if(isset($dataa->Reciepe))  { $mondayReciepecount = count($dataa->Reciepe); } if(isset($dataa->Grocery)) { $mondayGrocerycount = count($dataa->Grocery);} // dd($mondayItemcount,$mondayReciepecount,$mondayGrocerycount)  @endphp
          @if(isset($mondayItemcount) >= 1 || isset($mondayReciepecount) >= 1 || isset($mondayGrocerycount) >= 1 )
          @for($i = 1; $i == $mondayItemcount || $i == $mondayReciepecount || $i == $mondayGrocerycount; $i++ )
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Item</label>
              <input type="text" name="mondayItem[]" value="@php if(isset($dataa->Item[$mon] )) { echo  $dataa->Item[$mon]; } @endphp"  class="form-control" placeholder="Item" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Reciepe Direction</label>
              <input type="text" name="mondayReciepe[]" value="@php if(isset($dataa->Reciepe[$mon] )) { echo  $dataa->Reciepe[$mon]; } @endphp" class="form-control" placeholder="Reciepe Direction" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Grocery List</label>
              <input type="text" name="mondayGrocery[]" value="@php if(isset($dataa->Grocery[$mon] )) { echo  $dataa->Grocery[$mon]; } @endphp" class="form-control" placeholder="Grocery List" required>
            </div>
          </div>
          @php $mon++; @endphp
          @endfor
          @else
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Item</label>
              <input type="text" name="mondayItem[]"  class="form-control" placeholder="Item" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Reciepe Direction</label>
              <input type="text" name="mondayReciepe[]"  class="form-control" placeholder="Reciepe Direction" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Grocery List</label>
              <input type="text" name="mondayGrocery[]"  class="form-control" placeholder="Grocery List" required>
            </div>
          </div>
          @endif </div>
      </div>
      <br>
      <button class="add_field_button btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
      <div class="col-md-12">
        <div class="divider"></div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
          <div class="page-title">
            <h5><b>Tuesday</b></h5>
          </div>
        </div>
      </div>
      <div class="input_field_wrapss">
        <div class="row>"> @php $tues = 0; $dataa = json_decode($data->dayDite); $dataa = json_decode($dataa->tuesday);
          if(isset($dataa->Item)) {$tuesdayItemcount = count($dataa->Item); }  if(isset($dataa->Reciepe))
          { $tuesdayReciepecount = count($dataa->Reciepe); }  if(isset($dataa->Grocery)) { $tuesdayGrocerycount = count($dataa->Grocery);}  // dd($tuesdayItemcount,$tuesdayReciepecount,$tuesdayGrocerycount)  @endphp
          @if(isset($tuesdayItemcount) >= 1 || isset($tuesdayReciepecount) >= 1 || isset($tuesdayGrocerycount) >= 1 )
          @for($i = 1; $i == $tuesdayItemcount || $i == $tuesdayReciepecount || $i == $tuesdayGrocerycount; $i++ )
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Item</label>
              <input type="text"  name="tuesdayItem[]"  value="@php if(isset($dataa->Item[$tues] )) { echo  $dataa->Item[$tues]; } @endphp"  class="form-control" placeholder="Item" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Reciepe Direction</label>
              <input type="text" name="tuesdayReciepe[]"  value="@php if(isset($dataa->Reciepe[$tues] )) { echo  $dataa->Reciepe[$tues]; } @endphp"  class="form-control" placeholder="Reciepe Direction" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Grocery List</label>
              <input type="text" name="tuesdayGrocery[]" value="@php if(isset($dataa->Grocery[$tues] )) { echo  $dataa->Grocery[$tues]; } @endphp" class="form-control" placeholder="Grocery List" required>
            </div>
          </div>
          @php $tues++; @endphp
          @endfor
          @else
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Item</label>
              <input type="text"  name="tuesdayItem[]"  class="form-control" placeholder="Item" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Reciepe Direction</label>
              <input type="text" name="tuesdayReciepe[]"  class="form-control" placeholder="Reciepe Direction" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Grocery List</label>
              <input type="text" name="tuesdayGrocery[]" class="form-control" placeholder="Grocery List" required>
            </div>
          </div>
          @endif </div>
      </div>
    </div>
    <br>
    <button class="add_field_buttonss btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
    <div class="col-md-12">
      <div class="divider"></div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="page-title">
          <h5><b>Wednesday</b></h5>
        </div>
      </div>
    </div>
    <div class="input_field_wrapsss">
      <div class="row>"> @php $wed = 0; $dataa = json_decode($data->dayDite); $dataa = json_decode($dataa->wednesday);
        
        
        if(isset($dataa->Item)) 
        { 
        
        $wednesdayItemcount = count($dataa->Item); } 
        if(isset($dataa->Reciepe))  
        {$wednesdayReciepecount = count($dataa->Reciepe); } 
        if(isset($dataa->Grocery) && $dataa->Grocery != null) 
        { 
        
        $tuesdayGrocerycount = count($dataa->Grocery);}  
        @endphp
        @if(isset($wednesdayItemcount) >= 1 || isset($wednesdayReciepecount) >=1 || isset($tuesdayGrocerycount)>= 1 )
        @for($i = 1; $i == $wednesdayItemcount || $i == $wednesdayReciepecount || $i == $tuesdayGrocerycount; $i++ )
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Item</label>
            <input type="text" name="wednesdayItem[]" value="@php if(isset($dataa->Item[$wed] )) { echo  $dataa->Item[$wed]; } @endphp" class="form-control" placeholder="Item" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Reciepe Direction</label>
            <input type="text" name="wednesdayReciepe[]"  value="@php if(isset($dataa->Reciepe[$wed] )) { echo  $dataa->Reciepe[$wed]; } @endphp"  class="form-control" placeholder="Reciepe Direction" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Grocery List</label>
            <input type="text" name="wednesdayGrocery[]" value="@php if(isset($dataa->Grocery[$wed] )) { echo  $dataa->Grocery[$wed]; } @endphp" class="form-control" placeholder="Grocery List" required>
          </div>
        </div>
        @php $wed++; @endphp
        @endfor
        @else
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Item</label>
            <input type="text" name="wednesdayItem[]" class="form-control" placeholder="Item" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Reciepe Direction</label>
            <input type="text" name="wednesdayReciepe[]"  class="form-control" placeholder="Reciepe Direction" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Grocery List</label>
            <input type="text" name="wednesdayGrocery[]"  class="form-control" placeholder="Grocery List" required>
          </div>
        </div>
        @endif </div>
    </div>
    </div>
    <br>
    <button class="add_field_buttonsss btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
    <div class="col-md-12">
      <div class="divider"></div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="page-title">
          <h5><b>Thursday</b></h5>
        </div>
      </div>
    </div>
    <div class="input_field_wrapssss">
      <div class="row>"> @php $thurs = 0; $dataa = json_decode($data->dayDite); $dataa = json_decode($dataa->thursday);
        if(isset($dataa->Item)) { $thursdayItemcount = count($dataa->Item); }  if(isset($dataa->Reciepe)) { $thursdayReciepecount = count($dataa->Reciepe); } if(isset($dataa->Grocery)) { $thursdayGrocerycount = count($dataa->Grocery); }  // dd($thursdayItemcount,$tuesdayReciepecount,$thursdayGrocerycount)  @endphp
        @if(isset($thursdayItemcount) >=1 || isset($thursdayReciepecount)>= 1 || isset($thursdayGrocerycount) >=1 )
        @for($i = 1; $i == $thursdayItemcount || $i == $thursdayReciepecount || $i == $thursdayGrocerycount; $i++ )
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Item</label>
            <input type="text" name="thursdayItem[]" value="@php if(isset($dataa->Item[$thurs] )) { echo  $dataa->Item[$thurs]; } @endphp"  class="form-control" placeholder="Item" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Reciepe Direction</label>
            <input type="text" name="thursdayReciepe[]" value="@php if(isset($dataa->Reciepe[$thurs] )) { echo  $dataa->Reciepe[$thurs]; } @endphp"  class="form-control" placeholder="Reciepe Direction" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Grocery List</label>
            <input type="text" value="@php if(isset($dataa->Grocery[$thurs] )) { echo  $dataa->Grocery[$thurs]; } @endphp" name="thursdayGrocery[]" class="form-control" placeholder="Grocery List" required>
          </div>
        </div>
        @php $thurs++; @endphp
        @endfor
        @else
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Item</label>
            <input type="text" name="thursdayItem[]"  class="form-control" placeholder="Item" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Reciepe Direction</label>
            <input type="text" name="thursdayReciepe[]"  class="form-control" placeholder="Reciepe Direction" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Grocery List</label>
            <input type="text" name="thursdayGrocery[]" class="form-control" placeholder="Grocery List" required>
          </div>
        </div>
        @endif </div>
    </div>
    <br>
    <button class="add_field_buttonssss btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
    <div class="col-md-12">
      <div class="divider"></div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="page-title">
          <h5><b>Friday</b></h5>
        </div>
      </div>
    </div>
    <div class="input_field_wrap6">
      <div class="row>"> @php $fri = 0; $dataa = json_decode($data->dayDite); $dataa = json_decode($dataa->friday);
        
        
        if(isset($dataa->Item)) 
        { $fridayItemcount = count($dataa->Item); } 
        
        if(isset($dataa->Reciepe)) 
        { 
        $fridayReciepecount = count($dataa->Reciepe);
        } 
        if(isset($dataa->Grocery)) { $fridayGrocerycount = count($dataa->Grocery); }
        
        @endphp
        @if(isset($fridayItemcount) >= 1 || isset($fridayReciepecount) >=1 || isset($fridayGrocerycount) >=1 )
        @for($i = 1; $i == $fridayItemcount || $i == $fridayReciepecount || $i == $fridayGrocerycount; $i++ )
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Item</label>
            <input type="text" name="fridayItem[]" value="@php if(isset($dataa->Item[$fri] )) { echo  $dataa->Item[$fri]; } @endphp" class="form-control" placeholder="Item" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Reciepe Direction</label>
            <input type="text" name="fridayReciepe[]" value="@php if(isset($dataa->Reciepe[$fri] )) { echo  $dataa->Reciepe[$fri]; } @endphp" class="form-control" placeholder="Reciepe Direction" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Grocery List</label>
            <input type="text" name="fridayGrocery[]" value="@php if(isset($dataa->Grocery[$fri] )) { echo  $dataa->Grocery[$fri]; } @endphp" class="form-control" placeholder="Grocery List" required>
          </div>
        </div>
        @php $fri++; @endphp
        @endfor
        @else
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Item</label>
            <input type="text" name="fridayItem[]"  class="form-control" placeholder="Item" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Reciepe Direction</label>
            <input type="text" name="fridayReciepe[]"  class="form-control" placeholder="Reciepe Direction" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Grocery List</label>
            <input type="text" name="fridayGrocery[]" class="form-control" placeholder="Grocery List" required>
          </div>
        </div>
        @endif </div>
    </div>
    </div>
    <br>
    <button class="add_field_button6 btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
    <div class="col-md-12">
      <div class="divider"></div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="page-title">
          <h5><b>Saturday</b></h5>
        </div>
      </div>
    </div>
    <div class="input_field_wrap7">
      <div class="row>"> @php $sat = 0; $dataa = json_decode($data->dayDite); $dataa = json_decode($dataa->saturday);
        if(isset($dataa->Item)){ $saturdayItemcount = count($dataa->Item); } if(isset($dataa->Reciepe)) { $saturdayReciepecount = count($dataa->Reciepe); } if(isset($dataa->Grocery)) { $saturdayGrocerycount = count($dataa->Grocery); } // dd($saturdayItemcount,$saturdayReciepecount,$saturdayGrocerycount)  @endphp
        @if(isset($saturdayItemcount) > 1 || isset($saturdayReciepecount) > 1 || isset($saturdayGrocerycount) > 1 )
        @for($i = 1; $i == $saturdayItemcount || $i == $saturdayReciepecount || $i == $saturdayGrocerycount; $i++ )
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Item</label>
            <input type="text" name="saturdayItem[]" value="@php if(isset($dataa->Item[$sat] )) { echo  $dataa->Item[$sat]; } @endphp" class="form-control" placeholder="Item" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Reciepe Direction</label>
            <input type="text" name="saturdayReciepe[]" value="@php if(isset($dataa->Reciepe[$sat] )) { echo  $dataa->Reciepe[$sat]; } @endphp" class="form-control" placeholder="Reciepe Direction" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Grocery List</label>
            <input type="text" name="saturdayGrocery[]" value="@php if(isset($dataa->Grocery[$sat] )) { echo  $dataa->Grocery[$sat]; } @endphp" class="form-control" placeholder="Grocery List" required>
          </div>
        </div>
        @php $sat++; @endphp
        @endfor
        @else
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Item</label>
            <input type="text" name="saturdayItem[]" value="@php if(isset($dataa->Item[$sat] )) { echo  $dataa->Item[$sat]; } @endphp" class="form-control" placeholder="Item" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Reciepe Direction</label>
            <input type="text" name="saturdayReciepe[]" value="@php if(isset($dataa->Reciepe[$sat] )) { echo  $dataa->Reciepe[$sat]; } @endphp" class="form-control" placeholder="Reciepe Direction" required>
          </div>
        </div>
        <div class="col-lg-4">
          <div class=" form-group">
            <label for="text">Grocery List</label>
            <input type="text" name="saturdayGrocery[]" value="@php if(isset($dataa->Grocery[$sat] )) { echo  $dataa->Grocery[$sat]; } @endphp" class="form-control" placeholder="Grocery List" required>
          </div>
        </div>
        @endif </div>
    </div>
    <br>
    <button class="add_field_button7 btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
    <div class="col-md-6 pull-right">
      <button type="submit" class="btn btn-success btn-lg pull-right">Submit</button>
    </div>
    </div>
  </form>
  @else
  <form method="POST" action = "{{route('create.diet.plan.submit')}}" class="login-form" enctype="multipart/form-data">
    @csrf 
    
    <!-- <div class="alert alert-danger"> <strong></strong> Error Message </div> -->
    <div class="x_content">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="row">
            <div class="form-group">
              <label>Diet Plan Name</label>
              <input type="text" class="form-control" name="dietPlanName" placeholder="Diet Plan Name" required>
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control" rows="5" name="dietPlanDescription" placeholder="Description"></textarea>
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
            <h5><b>Sundy</b></h5>
          </div>
        </div>
      </div>
      <div class="input_field_wrap">
        <div class="row>">
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Item</label>
              <input type="text" name="sundayItem[]" class="form-control" placeholder="Item" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Reciepe Direction</label>
              <input type="text" name="sundayReciepe[]" class="form-control" placeholder="Reciepe Direction" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Grocery List</label>
              <input type="text" name="sundayGrocery[]" class="form-control" placeholder="Grocery List" required>
            </div>
          </div>
        </div>
      </div>
      <br>
      <button class="add_fields_button btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
      <div class="col-md-12">
        <div class="divider"></div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
          <div class="page-title">
            <h5><b>Monday</b></h5>
          </div>
        </div>
      </div>
      <div class="input_field_wraps">
        <div class="row>">
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Item</label>
              <input type="text" name="mondayItem[]" class="form-control" placeholder="Item" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Reciepe Direction</label>
              <input type="text" name="mondayReciepe[]" class="form-control" placeholder="Reciepe Direction" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Grocery List</label>
              <input type="text" name="mondayGrocery[]" class="form-control" placeholder="Grocery List" required>
            </div>
          </div>
        </div>
      </div>
      <br>
      <button class="add_field_button btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
      <div class="col-md-12">
        <div class="divider"></div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
          <div class="page-title">
            <h5><b>Tuesday</b></h5>
          </div>
        </div>
      </div>
      <div class="input_field_wrapss">
        <div class="row>">
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Item</label>
              <input type="text"  name="tuesdayItem[]" class="form-control" placeholder="Item" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Reciepe Direction</label>
              <input type="text" name="tuesdayReciepe[]" class="form-control" placeholder="Reciepe Direction" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Grocery List</label>
              <input type="text" name="tuesdayGrocery[]" class="form-control" placeholder="Grocery List" required>
            </div>
          </div>
        </div>
      </div>
      <br>
      <button class="add_field_buttonss btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
      <div class="col-md-12">
        <div class="divider"></div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
          <div class="page-title">
            <h5><b>Wednesday</b></h5>
          </div>
        </div>
      </div>
      <div class="input_field_wrapsss">
        <div class="row>">
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Item</label>
              <input type="text" name="wednesdayItem[]" class="form-control" placeholder="Item" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Reciepe Direction</label>
              <input type="text" name="wednesdayReciepe[]" class="form-control" placeholder="Reciepe Direction" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Grocery List</label>
              <input type="text" name="wednesdayGrocery[]" class="form-control" placeholder="Grocery List" required>
            </div>
          </div>
        </div>
      </div>
      <br>
      <button class="add_field_buttonsss btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
      <div class="col-md-12">
        <div class="divider"></div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
          <div class="page-title">
            <h5><b>Thursday</b></h5>
          </div>
        </div>
      </div>
      <div class="input_field_wrapssss">
        <div class="row>">
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Item</label>
              <input type="text" name="thursdayItem[]"  class="form-control" placeholder="Item" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Reciepe Direction</label>
              <input type="text" name="thursdayReciepe[]" class="form-control" placeholder="Reciepe Direction" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Grocery List</label>
              <input type="text" name="thursdayGrocery[]" class="form-control" placeholder="Grocery List" required>
            </div>
          </div>
        </div>
      </div>
      <br>
      <button class="add_field_buttonssss btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
      <div class="col-md-12">
        <div class="divider"></div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
          <div class="page-title">
            <h5><b>Friday</b></h5>
          </div>
        </div>
      </div>
      <div class="input_field_wrap6">
        <div class="row>">
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Item</label>
              <input type="text" name="fridayItem[]"  class="form-control" placeholder="Item" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Reciepe Direction</label>
              <input type="text" name="fridayReciepe[]" class="form-control" placeholder="Reciepe Direction" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Grocery List</label>
              <input type="text" name="fridayGrocery[]" class="form-control" placeholder="Grocery List" required>
            </div>
          </div>
        </div>
      </div>
      <br>
      <button class="add_field_button6 btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
      <div class="col-md-12">
        <div class="divider"></div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
          <div class="page-title">
            <h5><b>Saturday</b></h5>
          </div>
        </div>
      </div>
      <div class="input_field_wrap7">
        <div class="row>">
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Item</label>
              <input type="text" name="saturdayItem[]" class="form-control" placeholder="Item" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Reciepe Direction</label>
              <input type="text" name="saturdayReciepe[]" class="form-control" placeholder="Reciepe Direction" required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class=" form-group">
              <label for="text">Grocery List</label>
              <input type="text" name="saturdayGrocery[]" class="form-control" placeholder="Grocery List" required>
            </div>
          </div>
        </div>
      </div>
      <br>
      <button class="add_field_button7 btn btn-success"><i class="fa fa-plus"></i> Add More Item</button>
      <div class="col-md-6 pull-right">
        <button type="submit" class="btn btn-success btn-lg pull-right">Submit</button>
      </div>
    </div>
  </form>
  @endif </div>
</div>
</div>
</div>
<!-- /page content --> 
@endsection