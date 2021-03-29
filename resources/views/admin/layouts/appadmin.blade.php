<!DOCTYPE html>
<html lang="en">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
<link rel="shortcut icon" href="{{url('/')}}/images/favicon.png"/>
<title>The Food Pharmacy</title>

<!-- Bootstrap -->

<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<link href="{{url('/')}}/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome CSS-->
<link rel="stylesheet" href="{{url('/')}}/client/css/font-awesome.min.css">
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
<link href="{{url('/')}}/css/bootstrap-colorpicker.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
</head>

<body class="nav-md">
<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title"> <a href="index.html" class="site_title"><i><img src="{{url('/')}}/images/favicon.png" alt="logo"></i> <span>FoodPharmacy</span></a> </div>
        <div class="clearfix"></div>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <ul class="nav side-menu">
              <li><a href="{{URL('/')}}/admin/home"><i class="fa fa-tachometer"></i> Home </a> </li>
              @if(session('admin_management')==1)
              <li><a href="{{url('/')}}/admin/home/view/admin"><i class="fa fa-user"></i> Admin & permissions </a> </li>
              @endif
              
              @if(session('product_management')==1)
              <li><a><i class="fa fa-table"></i> Product Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{URL('/')}}/admin/home/view/product">Products</a></li>
                </ul>
              </li>
              @endif
              
              @if(session('category_management')==1)
              <li><a><i class="fa fa-table"></i> Category Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{URL('/')}}/admin/home/view/main/category">Categories</a></li>
                  <li><a href="{{URL('/')}}/admin/home/view/sub/category">Sub Categories</a></li>
                </ul>
              </li>
              @endif
              
              
              @if(session('brand_management')==1)
              <li><a><i class="fa fa-table"></i> Brand Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{URL('/')}}/admin/home/view/brand">Brand</a></li>
                </ul>
              </li>
              @endif
              <li><a><i class="fa fa-table"></i> Blog Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{URL('/')}}/admin/home/view/blogs/list">Blogs</a></li>
                </ul>
              </li>
              @if(session('order_management')==1)
              <li><a><i class="fa fa-shopping-bag"> </i> Order Management<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{URL('/')}}/admin/home/view/active/orders"> Active Orders</a></li>
                  <li><a href="{{URL('/')}}/admin/home/view/shipped/orders"> Shipped Orders</a></li>
                  <li><a href="{{URL('/')}}/admin/home/view/complete/orders"> Deliverd Orders</a></li>
                  <li><a href="{{URL('/')}}/admin/home/view/cancelled/orders"> Cancelled Orders</a></li>
                  <li><a href="{{URL('/')}}/admin/home/view/returned/orders"> Refunded Orders</a></li>
                </ul>
              </li>
              @endif
              
              @if(session('reporting')==1)
              <li><a><i class="fa fa-table"></i> Reporting Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{URL('/')}}/admin/home/view/reporting/by/products">By Product</a></li>
                  <li><a  href="{{URL('/')}}/admin/home/view/reporting/by/sale">By Sales</a></li>
                  <li><a href="{{URL('/')}}/admin/home/view/reporting/by/customer">By Customer</a></li>
                </ul>
              </li>
              @endif
              
              @if(session('discount')==1)
              <li><a href="{{URL('/')}}/admin/home/view/discount"><i class="fa fa-table"></i> Discount </a> </li>
              @endif
              
              @if(session('promocode')==1)
              <li><a href="{{url('/')}}/admin/home/view/promo"><i class="fa fa-table"></i> Promo Code </a> </li>
              @endif
              
              @if(session('promocode')==1)
              <li><a><i class="fa fa-table"></i> Recommendations <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{url('/')}}/admin/home/view/recommendation">View Recommendations</a></li>
                  <li><a  href="{{URL('/')}}/admin/home/view/recommendation/category/list">View Categories</a></li>
                </ul>
              </li>
              @endif
              
              @if(session('vendor_management')==1)
              <li><a><i class="fa fa-table"></i> Vendor Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a><i class="fa fa-table"></i> Vendors <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a  href="{{url('/')}}/admin/home/view/vendors/list">Approved</a></li>
                      <li><a  href="{{URL('/')}}/admin/home/view/pending/vendors/list">Pending</a></li>
                      <li><a href="{{URL('/')}}/admin/home/view/blocked/vendors/list">Blocked</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Vendor Products <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{URL('/')}}/admin/home/view/approved/products">Approved</a></li>
                      <li><a href="{{URL('/')}}/admin/home/view/cancel/products">Cancelled</a></li>
                      <li><a  href="{{URL('/')}}/admin/home/view/pending/products">Pending</a></li>
                    </ul>
                  </li>
                  <li><a href="{{URL('/')}}/admin/view/vendors/payments">Vendor Payments</a></li>
                  <li><a href="{{URL('/')}}/admin/view/vendor/reporting">Vendor Reporting</a></li>
                </ul>
              </li>
              @endif
              
              @if(session('coaching_management')==1)
              <li><a><i class="fa fa-table"></i> Coaching Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a><i class="fa fa-table"></i> Payments <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('payment.approved.list')}}">Approved</a></li>
                      <li><a href="{{route('payment.rejected.list')}}">Rejected</a></li>
                      <li><a  href="{{route('payment.pending')}}">Pending</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Diet Plan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('diet.plan.list')}}">View Diet Plan</a></li>
                      <li><a href="{{route('user.request.list')}}">User Request</a></li>
                    </ul>
                  </li>
                  @endif
                </ul>
              </li>
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
            <li class=""> <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="{{url('/')}}/images/favicon.png" alt=""> {{Session::get('name')}} <span class=" fa fa-angle-down"></span> </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="javascript:;"> Profile</a></li>
                <li><a href="{{URL('/')}}/admin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
      <div> Copyright © 2020 The Food Pharamacy. All rights reserved. </div>
      <div> Powered By <a href="https://greengrapez.com">
      Green Grapez 
      <img src="{{url('/')}}/images/greengrapez.png" alt="green grapez" style="width:5%;">
      </a> 
      </div>
      <div class="clearfix"></div>
      </footer>
    <!-- /footer content --> 
  </div>
</div>

<!-- jQuery --> 
<script src="{{url('/')}}/js/jquery.min.js"></script> 
<!-- Bootstrap --> 
<script src="{{url('/')}}/js/bootstrap.min.js"></script> 
<!-- DateJS --> 
<script src="{{url('/')}}/js/build/date.js"></script> 
<!-- bootstrap-progressbar --> 
<script src="{{url('/')}}/js/bootstrap-progressbar.min.js"></script> 
<!-- iCheck --> 
<script src="{{url('/')}}/js/icheck.min.js"></script> 
<!-- bootstrap-daterangepicker --> 
<script src="{{url('/')}}/js/moment.min.js"></script> 
<script src="{{url('/')}}/js/daterangepicker.js"></script> 
<!-- Custom Theme Scripts --> 
<script src="{{url('/')}}/js/custom.min.js"></script> 
<!-- Datatables --> 

<script src="{{url('/')}}/js/jquery.dataTables.min.js"></script> 
<script src="{{url('/')}}/js/dataTables.bootstrap.min.js"></script> 
<script src="{{url('/')}}/js/dataTables.responsive.min.js"></script> 
<script src="{{url('/')}}/js/responsive.bootstrap.js"></script> 
<script src="{{url('/')}}/js/dataTables.scroller.min.js"></script> 
<script  src="{{url('/')}}/js/bootstrap-colorpicker.min.js" type="text/javascript"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js">
</script> 
<script>
$(".my-colorpicker2").colorpicker();
</script> 
<script>
$("#b1").click(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var status = $('#status').val();
        $.ajax({
          /* the route pointing to the post function */
          url: "{{URL('/')}}/admin/home/order/update/status",
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
    
        $("#p1").click(function(){
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      var status = $('#status').val();
      $.ajax({
        /* the route pointing to the post function */
        url: "{{URL('/')}}/admin/home/product/update/status",
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
  
  
  
  
  
  
    
        $("#v1").click(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var status = $('#status').val();
        $.ajax({
          /* the route pointing to the post function */
          url: "{{URL('/')}}/admin/home/vendor/update/status",
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
    
    
    $("#active_order").click(function(){
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      var status = $('#status').val();
      $.ajax({
        /* the route pointing to the post function */
        url: "{{URL('/')}}/admin/home/order/update/status",
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
<script>

  @php
  $result = DB::select("select* from client_details ");
  @endphp
  $(document).ready(function() {
  var max_field      = 10; //maximum input boxes allowed
  var wrappers         = $(".promoinput"); //Fields wrapper
  var add_buttons      = $(".promobtn"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_buttons).click(function(e){ //on add input button click
      e.preventDefault();
      if(x < max_field){ //max input box allowed
          x++; //text box increment
          $(wrappers).append('<div><div class="col-lg-12 lpadding"><h5> Promo Code for Specific Person</h5><select class="selectpicker form-control" data-show-subtext="true" name="promoinput[]" data-live-search="true"><option class="form-control"></option>@foreach($result as $results)<option class="form-control" value="{{$results->username}}">{{$results->username}}</option>@endforeach</select></div><a href="#" class="remove_field">Remove</a></div>'); //add input box
      }
  });
  
  $(wrappers).on("click",".remove_field", function(e){ //user click on remove text
      e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});

</script> 
<script type="text/javascript">
    $("#mainCategory").on('change',function(e){

      console.log(e);
      
      var cat_id = e.target.value;
     
      $.get('{{URL('/')}}/ajax-subcat?cat_id='+ cat_id,function(data){
        console.log(data);
        $('#SubCategory').empty();
        $('#SubCategory').append('<option value="" disable="true" selected="true" >---Select Sub Category---</option>');
        
        $.each(data,function(create,subcatObj){
         
          $('#SubCategory').append('<option value ="'+subcatObj.SKU+'">'+subcatObj.sub_category+'</option>');
      });
   


      });


  });

    $("#SubCategory").on('change',function(e){

      console.log(e);
      
      var type_id = e.target.value;
    
      $.get('{{URL('/')}}/ajax-product-type?type_id='+ type_id,function(data){
        console.log(data);
      $('#ProductType').empty();
        $('#ProductType').append('<option value="" disable="true" selected="true" >---Add Product Type---</option>');
        $.each(data,function(create,typeObj){
         
          $('#ProductType').append('<option value ="'+typeObj.product_type+'">'+typeObj.product_type+'</option>');
      });
   


      });


  });
</script> 
<script type="text/javascript">
    
      $(function () {
        $("#example1").dataTable({
    "order": [[ 0, "desc" ]]
    } );
        $("#example2").dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": false,
          "bAutoWidth": false
        });
      });

     
      
    </script> 
<script type="text/javascript">
      $("#MainCategory").on('change',function(e){

        console.log(e);
        
        var cat_id =  e.target.value;
       
        $.get('{{URL('/')}}/ajax-subcat?cat_id='+ cat_id,function(data){
          console.log(data);
          $('#subCategory').empty();
          $('#subCategory').append('<option value="" disable="true" selected="true" >---Select Sub Category---</option>');
          
          $.each(data,function(create,subcatObj){
           
            $('#subCategory').append('<option value ="'+subcatObj.sub_category+'">'+subcatObj.sub_category+'</option>');
        });
     


        });
  

    });
 
  </script> 
<script>
      
    $(function() {
$('input:text').keydown(function(e) {
if(e.keyCode==191)
    return false;

});
});
  </script>
</body>
</html>