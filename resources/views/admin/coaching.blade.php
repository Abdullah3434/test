@extends('admin.layouts.appadmin')
 
 @section('content')
<div class="container">
<div class="row">
	<div class="col-12">
    	<div class="pull-right">
            @php  $id = Auth::user()->id; $data =  DB::table('bank_slips')->where('user_id',$id)->get();
                $data = json_decode(json_encode($data), true);

            if(empty($data)  )
            {
            @endphp
        	<a href="{{route('create.payment')}}" class="btn-coaching">	Create Payment</a>
          @php } @endphp
        </div>
    </div>
    
@if(Session::has('message'))
  <p >{{ Session::get('message') }}</p>
@endif

@php  
 if(empty($data) || (isset($data[0]) && $data[0]['status'] == 'pending'))
 {
 @endphp
</div>
<div class="row justify-content-center">
<div class="col-3" >
    	<div class="coaching text-center">
        	<img src="{{url('assets/img/Untitled-5.png')}}" alt="img">
        </div>
        <div class="text-center mt-10 mb-20"> <button  disabled class="btn-coaching text-center">Schedule</button> </div>
    
    </div>
    <div class="col-3">
    	<div class="coaching text-center">
        	<img src="{{url('assets/img/Untitled-6.png')}}" alt="img">
        </div>
        
        <div class="text-center mt-10 mb-20"> <button disabled="" class="btn-coaching text-center">Question/Answer</button> </div>
    </div>
    <div class="col-3">
    	<div class="coaching text-center">
        	<img src="{{url('assets/img/Untitled-7.png')}}" alt="img">
        </div>
        <div class="text-center mt-10 mb-20"> <button  disabled="" class="btn-coaching text-center">Diet Plan</button> </div>
    
    </div>
</div>
@php }else{ @endphp
<!-- <div class="row justify-content-center"> -->
<div class="col-3" >
      <div class="coaching text-center">
          <img src="{{url('assets/img/Untitled-5.png')}}" alt="img">
        </div>
        <div class="text-center mt-10 mb-20"> <a href="{{route('calendly.scheduling')}}" class="btn-coaching text-center">Schedule</a> </div>
    
    </div>
    <div class="col-3">
      <div class="coaching text-center">
          <img src="{{url('assets/img/Untitled-6.png')}}" alt="img">
        </div>
        
        <div class="text-center mt-10 mb-20"> <a href="{{route('question.answer.form')}}" class="btn-coaching text-center">Question/Answer</a> </div>
    </div>
    <div class="col-3">
      <div class="coaching text-center">
          <img src="{{url('assets/img/Untitled-7.png')}}" alt="img">
        </div>
        <div class="text-center mt-10 mb-20"> <a href="#" class="btn-coaching text-center">Diet Plan</a> </div>
    
    </div>
<!-- </div> -->

@php } @endphp
</div>
@endsection