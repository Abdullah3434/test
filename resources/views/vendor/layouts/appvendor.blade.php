<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="The Food Pharmacy">
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta name="author" content="The Food Pharmacy">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
<link rel="shortcut icon" href="{{url('/')}}/vendor/images/favicon.png"/>
<title>The Food Pharmacy</title>

<!-- Bootstrap -->

<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<link href="{{url('/')}}/vendor/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{url('/')}}/vendor/css/font-awesome.min.css" rel="stylesheet">
<!-- bootstrap-progressbar -->
<link href="{{url('/')}}/vendor/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<!-- iCheck -->
<link href="{{url('/')}}/vendor/css/green.css" rel="stylesheet">
<!-- Custom Theme Style -->
<link href="{{url('/')}}/vendor/css/custom.min.css" rel="stylesheet">
<!-- Datatables -->
<link href="{{url('/')}}/vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="{{url('/')}}/vendor/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="{{url('/')}}/vendor/css/scroller.bootstrap.min.css" rel="stylesheet">
<link href="{{url('/')}}/vendor/css/bootstrap-colorpicker.min.css" rel="stylesheet"/>
</head>

<body class="nav-md">
<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title"> <a href="index.html" class="site_title"><i><img src="{{url('/')}}/vendor/images/favicon.png" alt="logo"></i> <span>FoodPharmacy</span></a> </div>
        <div class="clearfix"></div>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <ul class="nav side-menu">
              <li><a href="{{url('/')}}/vendor/home"><i class="fa fa-tachometer"></i> Home </a> </li>
              <li><a><i class="fa fa-table"></i> Product Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{URL('/')}}/vendor/home/view/product">Products</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-table"></i> Category Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{URL('/')}}/vendor/home/view/main/category">Categories</a></li>
                  <li><a href="{{URL('/')}}/vendor/home/view/sub/category">Sub Categories</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-table"></i> Brand Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{URL('/')}}/vendor/home/view/brand">Brand</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-shopping-bag"> </i> Order Management<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a  href="{{URL('/')}}/vendor/home/view/active/orders"> Active Orders</a></li>
                  <li><a href="{{URL('/')}}/vendor/home/view/ship/orders"> Shipped Orders</a></li>
                  <li><a  href="{{URL('/')}}/vendor/home/view/complete/orders"> Completed Orders</a></li>
                  <li><a href="{{URL('/')}}/vendor/home/view/cancel/orders"> Cancelled Orders</a></li>
                  <li><a href="{{URL('/')}}/vendor/home/view/return/orders"> Refunded Orders</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-table"></i> Reporting Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{URL('/')}}/vendor/home/view/reporting/by/products">By Product</a></li>
                  <li><a href="{{URL('/')}}/vendor/home/view/reporting/by/sale">By Sales</a></li>
                 
                  <li><a href="{{URL('/')}}/vendor/home/view/reporting/by/customer">By Customer</a></li>
                </ul>
              </li> 
              <li><a href="{{URL('/')}}/vendor/home/view/discount"><i class="fa fa-table"></i> Discount </a> </li>
              <li><a href="{{URL('/')}}/vendor/home/view/earning"><i class="fa fa-table"></i> Earning </a> </li>
            </ul>
          </div>
        </div>
        <!-- /sidebar menu --> 
      </div>
    </div>
    
    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
          <ul class="nav navbar-nav navbar-right">                                                                                           
            <li class=""> <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="{{url('/')}}/vendor/images/favicon.png" alt=""> {{Session::get('fname')}} {{Session::get('lname')}}  <span class=" fa fa-angle-down"></span> </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="javascript:;"> Profile</a></li>
                <li><a href="{{URL('/')}}/vendor/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- /top navigation --> 


    @yield('content')


   



    <!-- footer content -->
    <footer>
      <div class=""> Copyright © 2020 The Food Pharamacy. All rights reserved. </div>     
      <div class="pull-right"> Powered By <a href="https://greengrapez.com">Green Grapez <img src="{{url('/')}}/vendor/images/greengrapez.png" alt="green grapez" style="width:5%;"></a> </div>
      
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content --> 
  </div>
</div>

<!-- jQuery --> 
<script src="{{url('/')}}/vendor/js/jquery.min.js"></script> 
<!-- Bootstrap --> 
<script src="{{url('/')}}/vendor/js/bootstrap.min.js"></script> 
<!-- DateJS --> 
<script src="{{url('/')}}/vendor/js/build/date.js"></script> 
<!-- bootstrap-progressbar --> 
<script src="{{url('/')}}/vendor/js/bootstrap-progressbar.min.js"></script> 
<!-- iCheck --> 
<script src="{{url('/')}}/vendor/js/icheck.min.js"></script> 
<!-- bootstrap-daterangepicker --> 
<script src="{{url('/')}}/vendor/js/moment.min.js"></script> 
<script src="{{url('/')}}/vendor/js/daterangepicker.js"></script> 
<!-- Custom Theme Scripts --> 
<script src="{{url('/')}}/vendor/js/custom.min.js"></script> 
<!-- Datatables --> 
<!-- src="{{url('/')}}/vendor/js/bootstrap-colorpicker.min.js" -->
<script src="{{url('/')}}/vendor/js/jquery.dataTables.min.js"></script> 
<script src="{{url('/')}}/vendor/js/dataTables.bootstrap.min.js"></script> 
<script src="{{url('/')}}/vendor/js/dataTables.responsive.min.js"></script> 
<script src="{{url('/')}}/vendor/js/responsive.bootstrap.js"></script> 
<script src="{{url('/')}}/vendor/js/dataTables.scroller.min.js"></script>
<script src="{{url('/')}}/vendor/js/bootstrap-colorpicker.min.js" type="text/javascript"></script>

<script>
    
  </script>

<script type="text/javascript">
      $("#MainCategory").on('change',function(e){

        console.log(e);
        
        var cat_id = e.target.value;
       
        $.get('{{URL('/')}}/vendor/ajax-subcat?cat_id='+ cat_id,function(data){
          console.log(data);
          $('#subCategory').empty();
          $('#subCategory').append('<option value="" disable="true" selected="true" >---Select Sub Category---</option>');
          $.each(data,function(create,subcatObj){
           
            $('#subCategory').append('<option value ="'+subcatObj.sub_category+'">'+subcatObj.sub_category+'</option>');
        });
     


        });
  

    });





    $("#b1").click(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var status = $('#status').val();
        $.ajax({
          /* the route pointing to the post function */
          url: "{{URL('/')}}/vendor/home/order/update/status",
          type: 'POST',
          /* send the csrf-token and the input to the controller */
          data: {_token: CSRF_TOKEN, status:status,
          id: OrgID,
        },
          /* remind that 'data' is the response of the AjaxController */
          success: function (data) { 
            window.location.href = data;
          }
      }); 

    });
 
  </script>
  
   
  
  <script type="text/javascript">
    $("#mainCategory").on('change',function(e){

      console.log(e);
      
      var cat_id = e.target.value;
     
      $.get('{{URL('/')}}/vendor/ajax-subcat?cat_id='+ cat_id,function(data){
        console.log(data);
        $('#subCategory').empty();
        $('#subCategory').append('<option value="" disable="true" selected="true" >---Select Sub Category---</option>');
        
        $.each(data,function(create,subcatObj){
         
          $('#subCategory').append('<option value ="'+subcatObj.SKU+'">'+subcatObj.sub_category+'</option>');
      });
   


      });


  });

    </script>


<script>
$(".my-colorpicker2").colorpicker();
</script>
</body>
</html>