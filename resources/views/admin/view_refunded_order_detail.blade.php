<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Houzz">
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta name="author" content="The Food Pharmacy">
<link rel="shortcut icon" href="images/favicon.png"/>
<title>The Food Pharmacy</title>

<!-- Bootstrap -->

<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet">
<!-- bootstrap-progressbar -->
<link href="css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<!-- iCheck -->
<link href="css/green.css" rel="stylesheet">
<!-- Custom Theme Style -->
<link href="css/custom.min.css" rel="stylesheet">
<!-- Datatables -->
<link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="css/scroller.bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-colorpicker.min.css" rel="stylesheet"/>
</head>

<body class="nav-md">
<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title"> <a href="index.html" class="site_title"><i><img src="images/favicon.png" alt="logo"></i> <span>FoodPharmacy</span></a> </div>
        <div class="clearfix"></div>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <ul class="nav side-menu">
              <li><a href="index.html"><i class="fa fa-tachometer"></i> Home </a> </li>
              <li><a href="admin_list.html"><i class="fa fa-user"></i> Admin & permissions </a> </li>
              <li><a><i class="fa fa-table"></i> Product Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="product_list.html">Products</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-table"></i> Category Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="category_list.html">Categories</a></li>
                  <li><a href="sub_category_list.html">Sub Categories</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-table"></i> Brand Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="brand_list.html">Brand</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-shopping-bag"> </i> Order Management<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="active_order.html"> Active Orders</a></li>
                  <li><a href="completed_order.html"> Completed Orders</a></li>
                  <li><a href="cancel_order.html"> Cancelled Orders</a></li>
                  <li><a href="refunded_order.html"> Refunded Orders</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-table"></i> Reporting Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="by_product_list.html">By Product</a></li>
                  <li><a href="by_sale_list.html">By Sales</a></li>
                  
                  <li><a href="by_customer.html">By Customer</a></li>
                </ul>
              </li>
              <li><a href="discount_list.html"><i class="fa fa-table"></i> Discount </a> </li>
              <li><a href="promo_code_list.html"><i class="fa fa-table"></i> Promo Code </a> </li>
              
              <li><a><i class="fa fa-table"></i> Vendor Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="vendor_list.html">Vendor</a></li>
                  
                  <li><a><i class="fa fa-table"></i> Vendor Products <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="vendor_approved_product_list.html">Approved</a></li>
                  <li><a href="vendor_cancelled_product_list.html">Cancelled</a></li>
                  
                  <li><a href="vendor_pending_product_list.html">Pending</a></li>
                </ul>
              </li>
                  
                  <li><a href="vendor_payment.html">Vendor Payments</a></li>
                  <li><a href="vendor_reporting.html">Vendor Reporting</a></li>
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
            <li class=""> <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="images/vendorprofile.png" alt="">Ibrahim Anwar <span class=" fa fa-angle-down"></span> </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="javascript:;"> Profile</a></li>
                <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- /top navigation -->  
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
          <h3>Order Managment</h3>
            <h4>View Refunded Order</h4>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_content">
                <div class="member-left-side">
                  <div class="member-email clearfix"> <b>O-ID</b> <span>1</span> </div>
                  <div class="member-email clearfix"> <b>Customer Name</b> <span>Fahad</span> </div>
                  
                  <div class="member-email clearfix"> <b>Price</b> <span>54$</span> </div>
                  
                  <div class="member-email clearfix"> <b>Payment Method</b> <span>Online</span> </div>
                  
                  <div class="member-email clearfix"> <b>Shippment Address</b> <span>Lahore</span> </div>
                  <div class="member-email clearfix"> <b>Status</b> <span>Refund</span> </div>
                  
                  <div class="member-email clearfix"> <b>Phone</b> <span>090078601</span> </div>
                </div>
                <div class="col-md-6"> <a href="active_order.html" class="btn btn-success">Back</a> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_content">
                <table id="datatable-responsive" class="table table-condense dt-responsive" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>SKU</th>
                      <th>P-Name</th>
                      <th>Price</th>
                      <th>Size</th>
                      <th>Vedor Name</th>
                      <th>Status</th>
                      <th>Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>01</td>
                      <td>Acacia Tree Bark</td>
                      <td>400$</td>
                      <td>small</td>
                      <td>ali</td>
                      <td>Refund</td>
                      <td>65</td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content --> 
    
  <!-- footer content -->
    <footer>
      <div class=""> Copyright © 2020 The Food Pharamacy. All rights reserved. </div>
      <div class="pull-right"> Powered By <a href="https://greengrapez.com">Green Grapez <img src="images/greengrapez.png" alt="green grapez" style="width:5%;"></a> </div>
      
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content --> 
  </div>
</div>

<!-- jQuery --> 
<script src="js/jquery.min.js"></script> 
<!-- Bootstrap --> 
<script src="js/bootstrap.min.js"></script> 
<!-- DateJS --> 
<script src="js/build/date.js"></script> 
<!-- bootstrap-progressbar --> 
<script src="js/bootstrap-progressbar.min.js"></script> 
<!-- iCheck --> 
<script src="js/icheck.min.js"></script> 
<!-- bootstrap-daterangepicker --> 
<script src="js/moment.min.js"></script> 
<script src="js/daterangepicker.js"></script> 
<!-- Custom Theme Scripts --> 
<script src="js/custom.min.js"></script> 
<!-- Datatables --> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/dataTables.bootstrap.min.js"></script> 
<script src="js/dataTables.responsive.min.js"></script> 
<script src="js/responsive.bootstrap.js"></script> 
<script src="js/dataTables.scroller.min.js"></script>
<script src="js/bootstrap-colorpicker.min.js" type="text/javascript"></script>
<script>
$(".my-colorpicker2").colorpicker();
</script>
</body>
</html>
