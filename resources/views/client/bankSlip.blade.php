@extends('client.layouts.appclient')
@section('content')
<div class="checkout-area mb-80 mt-70">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong> </div>
        @endif      
        <form  method="post" action="{{url('/')}}/bank_slip_submitt"  enctype="multipart/form-data">
          @csrf
          <div class="checkbox-form">
            <h3>Upload Slip</h3>
            <div class="checkout-form-list">
              <label>Name</label>
              <input type="text" name="name" class="form-control" placeholder="Name" pattern="[a-zA-Z0-9\s]+" maxlength="50" required>
            </div>
            <div class="checkout-form-list">
               <input type="hidden" name="email" class="form-control" value="{{session()->get('username')}}" >
            </div>
            <div class="form-group">
              <label>Amount</label>
              <select id="status" name="amount" class="form-control">
                <option>Select Sessions</option>
                <option value="5000">1 Session (5,000)</option>
                <option value="20000">4 Session (20,000)</option>
                <option value="25000">5 Session (25,000)</option>
              </select>
            </div>
            <div class="form-group">
              <input type="hidden" name="package" class="form-control" value="Live Coaching" >
            </div>
            <div class="form-group">
              <input type='file' name='file'  required="" id="imgInp">
              <!-- <input type="file" class="form-control" name="file" onchange="readURL(this);"/> --> 
              <img id="blah" src="{{url('assets/img/demo.png')}}" alt="Bank Slip" style="width:350px; height:300px;" /> </div>
            <button class="button" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<script type="text/javascript">
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {

  readURL(this);
});

</script> 
@endsection