<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="The Food Pharamacy">
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta name="author" content="The Food Pharamacy">
<meta name="google-site-verification" content="-3fR2s0fAH-tDmr1Fkt1Zn9Zv3qA3tcabWHX8mpCd28" />
<link rel="shortcut icon" href="{{URL('/')}}/images/favicon.png"/>
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<title>The Food Pharamacy</title>

<!-- Bootstrap -->
<link href="{{url('/')}}/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{url('/')}}/css/font-awesome.min.css" rel="stylesheet">
<!-- bootstrap-progressbar -->
<link href="{{url('/')}}/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<!-- iCheck -->
<link href="{{url('/')}}/css/green.css" rel="stylesheet">
<!-- Custom Theme Style -->
<link href="{{url('/')}}/css/custom.min.css" rel="stylesheet">
<!-- Datatables -->
<link href="{{url('/')}}/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="{{url('/')}}/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="{{url('/')}}/css/scroller.bootstrap.min.css" rel="stylesheet">
</head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
         
          @if($errors->any())
    <div class="alert alert-danger">{{$errors->first()}}</div>
 
    @endif
    @if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
<form method="post" action = "{{url('/')}}/admin/password/change/{{$username}}" class="login-form">
      {{ csrf_field() }}
              <h1>Password Reset</h1>
              <div>
                <input type="hidden" class="form-control" name="username" placeholder="username" >
                
                <input  class="form-control" type="password" name="password" placeholder="Enter Your New Password">
              </div>
              
              <div>
              <button class="btn btn-success submit">Submit</button>
              
              
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div>
                  <h1><i><img src="{{URL('/')}}/images/logo.png" alt="logo" style="max-width:250px;"></i></h1>
                  <p>Copyright © 2019-2020 The Food Pharamacy. All rights reserved.</p>
                  <p>Powered By <a href="https://greengrapez.com">Green Grapez <img src="{{URL('/')}}/images/greengrapez.png" alt="green grapez" style="width:20%;"></a></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
