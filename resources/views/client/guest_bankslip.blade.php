@extends('client.layouts.appclient')
@section('content')

<div class="checkout-area mb-80 mt-70">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-6">


      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>  
    @endif


        <form action ="{{route('guest.bank.slip.submit')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="checkbox-form">
            <h3>Upload Slip</h3>
            <div class="checkout-form-list">
              <label>Name</label>
              <input type="text" name="name" placeholder="Name" pattern="[a-zA-Z0-9\s]+" maxlength="50" required>
            </div>
            <div class="checkout-form-list">
              <label>Email</label>
              <input type="email" name="email" placeholder="Email"  maxlength="50" required>
            </div>
            <div class="form-group">
              <label>Amount</label>
              <input type="number" name="amount" value="{{$data['price']}}" class="form-control" placeholder="Amount" disabled>
              
              <input type="hidden" name="amount" value="{{$data['price']}}" class="form-control" placeholder="Amount" >
            </div>
            <div class="form-group">
              <label>Packge</label>
              <input type="text" name="package" class="form-control" value="{{$data['package']}}" disabled>
              
              <input type="hidden" name="package" class="form-control" value="{{$data['package']}}" >
            </div>
            <div class="form-group">  
              <input type='file' name='file'  required="" id="imgInp">
              <!-- <input type="file" class="form-control" name="file" onchange="readURL(this);"/> -->
              <img id="blah" src="{{url('client/img/demo.png')}}" alt="Product Image" style="width:350px; height:300px;" /> </div>
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