<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

//...........................Admin Login...................//





//................admin login view

Route::get('/admin','adminController@admin_login_view');

//................admin login index

Route::post('/admin/login','adminController@index');

Route::get('/admin/login','adminController@admin_login_view');

//.................admin logour
Route::get('/admin/logout','adminController@logout');

//.................admin home

Route::get('/admin/home','adminController@admin_home');

//====================================== Recommendations ===================================//

//..................... C A T E G O R I E S ........................//

Route::get('/admin/home/view/recommendation/category/list','adminController@recom_category_list');
Route::get('/admin/home/add/recommendation/category/view','adminController@recom_category_add_view');
Route::post('/admin/home/add/recommendation/category','adminController@recom_category_add');

Route::get('/admin/home/edit/recommendation/category/view/{pk_id}','adminController@recom_category_edit_view');
Route::post('/admin/home/edit/recommendation/category/{pk_id}','adminController@recom_category_edit');

Route::get('/admin/home/delete/recommendation/category/{pk_id}','adminController@delete_recom_category');

// ....................... Recommendations. ...................//

Route::get('/admin/home/view/recommendation','adminController@recommendation_list');

Route::get('/admin/home/view/detail/recommendation/{pk_id}','adminController@recommendation_detail');

Route::get('/admin/home/view/edit/recommendation/view/{pk_id}','adminController@edit_recommendation_view');
Route::post('/admin/home/view/edit/recommendation/{pk_id}','adminController@edit_recommendation');

Route::get('/admin/home/add/recommendation/view','adminController@add_recommendation_view');
Route::post('/admin/home/add/recommendation','adminController@add_recommendation');


Route::get('/admin/home/delete/recommendation/{pk_id}','adminController@delete_recommendation');

// ============================= END OF RECOMMENDATION =====================//

Route::get('/admin/home/view/admin','adminController@admin_list_view');
Route::get('/admin/home/view/admin/{id}','adminController@admin_specific_view');
Route::get('/admin/home/view/admin/edit/admin/{id}','adminController@edit_admin_view');
Route::post('/admin/home/view/admin/edit/admin/{id}','adminController@edit_admin');
Route::get('/admin/home/delete/admin/{id}','adminController@delete_admin');
Route::post('/admin/home/create/admin','adminController@create_admin');
Route::get('/admin/home/create/admin','adminController@create_admin_view');


//........................Category Managment.................//

Route::get('/admin/home/add/main/category','adminController@add_main_category_view');
Route::post('/admin/home/add/main/category','adminController@add_main_category');

//..................categories list view
Route::get('/admin/home/view/main/category','adminController@main_category_list_view');
Route::get('/admin/home/view/sub/category','adminController@sub_category_list_view');

//..................Edit Category
Route::get('/admin/home/edit/main/category/{sku}','adminController@edit_main_category_view');
Route::post('/admin/home/edit/main/category/{sku}','adminController@edit_main_category');

//..................Delete Main Category

Route::get('/admin/home/delete/main/category/{pk_id}','adminController@delete_main_category');

/////////////////////...............sub category...................//////////

//.............sub category list view
Route::get('/admin/home/view/sub/category','adminController@sub_category_list_view');

//.............Add Sub Category

Route::get('/admin/home/add/sub/category','adminController@add_sub_category_view');
Route::post('/admin/home/add/sub/category','adminController@add_sub_category');

//.............edit sub category

Route::get('/admin/home/edit/sub/category/{sku}','adminController@edit_sub_category_view');
Route::post('/admin/home/edit/sub/category/{sku}','adminController@edit_sub_category');

//.............delete sub category

Route::get('/admin/home/delete/sub/category/{pk_id}','adminController@delete_sub_category');

//.....................Brand Mangment......................//

//.............brand list view

Route::get('/admin/home/view/brand','adminController@brand_list_view');

//.............add brand

Route::get('/admin/home/add/brand','adminController@add_brand_view');
Route::post('/admin/home/add/brand','adminController@add_brand');

//.............edit brand

Route::get('/admin/home/edit/brand/{sku}','adminController@edit_brand_view');
Route::post('/admin/home/edit/brand/{sku}','adminController@edit_brand');

//............delete brand
Route::get('/admin/home/delete/brand/{pk_id}','adminController@delete_brand');

//.....................Product Mangment.................................//

//.............product list view

Route::get('/admin/home/view/product','adminController@product_list_view');

//..............product detailed view

Route::get('/admin/home/view/product/{id}','adminController@product_detail_view');

//..............add product view

Route::get('/admin/home/add/product','adminController@add_product_view');

//..............add product
Route::post('/admin/home/add/product','adminController@add_product');

//..............script for subcat
Route::get('/ajax-subcat','adminController@sub');

//.............delete product

Route::get('/admin/home/delete/product/{id}','adminController@delete_product');

//..............edit product

Route::get('/admin/home/edit/product/{id}','adminController@edit_product_view');
Route::post('/admin/home/edit/product/{id}','adminController@edit_product');

//.................................Discount Mangment....................//

//.............add discount view

Route::get('/admin/home/add/discount','adminController@add_discount_view');

//............add discount
Route::post('/admin/home/add/discount','adminController@add_discount');

//...........view discount list
Route::get('/admin/home/view/discount','adminController@view_discount');

//............delete discount

Route::get('/admin/home/delete/discount/{id}','adminController@delete_discount');

//.............discount detailed view

Route::get('/admin/home/view/discount/{id}','adminController@discount_detail_view');

//............update status

Route::get('/admin/home/view/product/status/update/{pk_id}/{status}','adminController@updateProductStatus');



Route::get('/admin/delete/dietplan/{pk_id}','adminController@delete_diet_plan');

Route::get('/admin/edit/dietplan/{pk_id}','adminController@edit_diet_plan_view');

// ............. vendor reporting

Route::get('/admin/view/vendor/reporting','adminController@vendor_reporting_list_view');

// ............. recommendation
Route::get('/recommendation/list','adminController@recommendation_list');
Route::get('/add/recommendation','adminController@add_recommendation');
Route::get('/recommendation/detail','adminController@recommendation_detail');

//.===========================..Client Side...====================================..//


Route::get('/aboutus','clientController@about_us');

Route::get('/blog','clientController@blog');

Route::post('comments/{pk_id}','clientController@comments');

Route::get('/single/blog/{pk_id}','clientController@single_blog');

Route::get('/contactus','clientController@contact_us');

Route::post('/contact','clientController@contact');

Route::get('/FAQ','clientController@faq');

Route::get('/termsandcondition','clientController@termsandcondition');

Route::get('/privacypolicy','clientController@privacypolicy');

Route::get('/recommendation','clientController@recommendations');
Route::get('/recommendation/detail/{pk_id}','clientController@recommendation_detail');


Route::get('/','clientController@home_view');
Route::get('/home','clientController@home_view');

Route::get('/products/details/{pk_id}/{sku}','clientController@product_detail_view');

Route::get('/shop','clientController@shop');

Route::post('/return/{id}','clientController@return_active_order');

Route::post('/product/add/wishlist/{id}','clientController@add_wishlist');
Route::get('/view/wishlist','clientController@view_wishlist');
Route::get('/delete/wishlist/{pk_id}','clientController@delete_wishlist');

Route::get('/flush',function()
{

    session()->forget('cart');
});

Route::post('/product/add/cart/{pk_id}','clientController@addToCart');

Route::get('/cart','clientController@getCart');

Route::post('/product/buy/now/{pk_id}','clientController@buynow');

Route::get('remove/item/cart/{id}/{qty}','clientController@removeCart');

Route::get('/signup','clientController@create_client_view');
Route::post('/signup','clientController@create_client');



Route::get('/cart/guest/checkout','clientController@guest_checkout_view');
Route::post('/cart/guest/checkout','clientController@guest_checkout');




Route::get('/cart/guest/checkout/address/view/order/complete/order','clientController@guest_payment_view');
Route::post('/cart/guest/checkout/address/view/order/complete/order','clientController@guest_confirm_order');

Route::get('/guest/order/tracking/view','clientController@guest_order_tracking_view');
Route::post('/guest/order/tracking','clientController@guest_order_tracking');



Route::get('/admin/home/view/active/order/view/specific/order/{id}','adminController@active_order_detail_view');
Route::get('/admin/home/view/complete/order/view/specific/order/{id}','adminController@complete_order_detail_view');
Route::get('/admin/home/view/cancel/order/view/specific/order/{id}','adminController@cancel_order_detail_view');
Route::get('/admin/home/view/return/order/view/specific/order/{id}','adminController@return_order_detail_view');

Route::get('/admin/home/view/shipped/order/view/specific/order/{id}','adminController@shipped_order_detail_view');


Route::get('/logout','clientController@client_logout');

Route::get('/login','clientController@client_login_view');
Route::post('/login','clientController@client_login');

Route::get('/cart/checkout','clientController@checkout_view');
Route::post('/cart/checkout','clientController@login');

Route::get('/cart/checkout/address','clientController@address_view');
Route::post('/cart/checkout/address','clientController@address');

Route::get('/cart/checkout/add/address','clientController@add_address_view');
Route::post('/cart/checkout/add/address','clientController@add_address');

Route::get('/cart/checkout/add/new/address','clientController@add_new_address_view');
Route::post('/cart/checkout/add/new/address','clientController@add_new_address');

Route::get('/cart/checkout/address/view/order/{id}','clientController@order_view');


Route::post('/cart/checkout/address/view/order/complete/order/add/promo/{id}/{sub_cat}/{price}','clientController@add_promo_code');

Route::get('/cart/checkout/address/view/order/confirm/{id}','clientController@order_payment_view');

// Route::get('/cart/checkout/address/view/order/complete/order/{id}','clientController@order_payment_view');
Route::post('/cart/checkout/address/view/order/complete/order','clientController@confirm_order');

Route::get('order/tracking/view','clientController@order_tracking_view');
Route::get('/order/tracking/detail/{id}','clientController@order_tracking_detail_view');
Route::post('order/tracking','clientController@order_tracking');


Route::get('/admin/home/view/active/orders','adminController@active_order_view');





Route::post('/admin/home/order/update/status','adminController@update_order_status');

Route::get('/admin/home/view/complete/orders','adminController@complete_order_list_view');
Route::get('/admin/home/view/complete/order/view/specific/order/{id}','adminController@complete_order_detail_view');

Route::get('/admin/home/view/shipped/orders','adminController@shipped_order_list_view');
Route::get('/admin/home/view/complete/order/view/specific/order/{id}','adminController@complete_order_detail_view');

Route::get('/admin/home/view/cancelled/orders','adminController@cancelled_order_list_view');
Route::get('/admin/home/view/complete/order/view/specific/order/{id}','adminController@complete_order_detail_view');

Route::get('/admin/home/view/returned/orders','adminController@returned_order_list_view');
Route::get('/admin/home/view/complete/order/view/specific/order/{id}','adminController@complete_order_detail_view');




//==========================Vendor Managment=======================////////////
Route::get('/admin/home/view/blogs/list','adminController@view_blog_list');
Route::get('/admin/home/view/add/blogs','adminController@add_blog_view');
Route::post('/admin/home/add/blog','adminController@add_blog');

Route::get('/admin/home/edit/blog/{id}','adminController@edit_blog_view');
Route::post('/admin/home/edit/blog/{id}','adminController@edit_blog');

Route::get('/admin/home/delete/blog/{id}','adminController@delete_blog');



Route::get('/admin/home/view/vendors/list','adminController@vendor_list_view');
Route::get('/admin/home/view/blocked/vendors/list','adminController@vendor_block_list_view');
Route::get('/admin/home/view/pending/vendors/list','adminController@vendor_pending_list_view');


Route::get('/admin/home/view/vendor/{id}','adminController@vendor_detail_view');
Route::get('/admin/home/view/pending/vendor/{id}','adminController@vendor_pending_detail_view');
Route::get('/admin/home/view/blocked/vendor/{id}','adminController@vendor_block_detail_view');


Route::post('/admin/home/vendor/update/status','adminController@update_vendor_status');

// ===================== Reporting ==========================//


Route::get('/admin/home/view/reporting/by/products','adminController@reporting_by_product_list_view');
Route::get('/admin/home/view/detail/reporting/by/products/{id}','adminController@reporting_by_product');

Route::get('/admin/home/view/reporting/by/customer','adminController@customer_reporting_list_view');
Route::get('/admin/home/view/detail/reporting/by/customer/{id}','adminController@customer_reporting');
//Route::get('/admin/home/view/detail/reporting/by/specific/customer/{id}','adminController@customer_specific_reporting');

Route::get('/vendor/home/view/earning','VendorController@earning_view');

Route::get('/admin/home/view/reporting/by/sale','adminController@reporting_by_sale_list_view');
Route::get('/admin/home/view/detail/reporting/by/sale/{id}','adminController@reporting_by_sale');

// =============== PROMO CODE ==================//

Route::get('/admin/home/add/promo','adminController@add_promo_view');
Route::post('/admin/home/add/promo','adminController@add_promo');
Route::get('/admin/home/view/promo','adminController@view_promo_list');
Route::get('/admin/home/view/promo/detail/{id}','adminController@view_promo_detail');

Route::get('/admin/home/edit/promo/{id}','adminController@edit_promo_view');
Route::post('/admin/home/edit/promo/{id}','adminController@edit_promo');

Route::get('/admin/home/delete/promo/{id}','adminController@delete_promo_code');

// -======================= vendor Products -==========================//

Route::get('product/{main?}/{sub?}','clientController@searchByCategory');

Route::get('recommendation/{main?}','clientController@searchByCategory_recom');

Route::get('/admin/home/view/pending/products','adminController@pending_product_list_view');
Route::get('/admin/home/view/pending/products/view/detail/product/{id}','adminController@pending_product_detail_view');

Route::post('/admin/home/product/update/status','adminController@update_ven_product_status');

Route::get('/admin/home/view/approved/products','adminController@approved_product_list_view');
Route::get('/admin/home/view/approved/products/view/detail/product/{id}','adminController@approved_product_detail_view');


Route::get('/admin/home/view/cancel/products','adminController@cancel_product_list_view');
Route::get('/admin/home/view/cancel/products/view/detail/product/{id}','adminController@cancel_product_detail_view');







//===================adil work==================//

Route::get('diet-plan-list','adminController@dietPlanList')->name('diet.plan.list');
Route::get('create-diet-plan','adminController@createDietPlan')->name('create.diet.plan');
Route::post('create-diet-plan-submit','adminController@createDietPlanSubmit')->name('create.diet.plan.submit');
Route::post('update-diet-plan','Admin\DietPlanController@updateDietPlanSubmit')->name('create.diet.plan.update');
Route::get('view-diet-plan/{pk_id}','adminController@viewDietPlan')->name('view.deit.plan');


Route::post('/admin/home/edit/diet/plan/{pk_id}','adminController@edit_diet_plan');

Route::get('user-request','adminController@userRequest')->name('user.request.list');
Route::get('view-answer/{id}','adminController@veiwAnswer')->name('view.answer');


Route::get('diet_plan_history','adminController@diet_plan_history');

Route::post('assign-diet-plan','adminController@assignDietPlan')->name('assign.diet.plan');

Route::get('payment-pending','adminController@pendingPayment')->name('payment.pending');
Route::get('payment-approve/{id}','adminController@approvePayment')->name('payment.approve');
Route::get('payment-reject/{id}','adminController@rejectPayment')->name('payment.reject');
Route::get('payment-appoved-list/','adminController@approvedPaymentList')->name('payment.approved.list');

Route::get('payment-rejected-list/','adminController@rejectedPaymentList')->name('payment.rejected.list');

Route::get('coaching','clientController@coaching')->name('coaching');

Route::get('schedule-meeting','clientController@calendlySheduling')->name('calendly.scheduling');

Route::get('guest-schedule-meeting','clientController@guestcalendlySheduling')->name('guest.calendly.scheduling');

Route::get('coaching','clientController@coaching')->name('coaching');

Route::get('guest_coaching','clientController@guest_coaching')->name('coaching');

Route::get('create-payment','clientController@createPayment')->name('create.payment');

Route::get('guest-create-payment','clientController@guestcreatePayment')->name('guest.create.payment');

Route::get('assigned-diet-plan','clientController@assigned_diet')->name('view.assigned.diet');


Route::get('/bank-slip', 'clientController@bankSlip')->name('bank.slip');
Route::post('/bank-slipp', 'clientController@bankSlip')->name('bank.slipp');


Route::post('/bank_slip_submitt', 'clientController@bankSlipSubmit');


Route::get('question-answer-form','clientController@questionform')->name('question.answer.form');
Route::post('question-answer-form-submit','clientController@questionAnswerFormSubmit')->name('question.answer.form.submit');

Route::get('guest-question-answer-form','clientController@guestquestionform')->name('guest.question.answer.form');
Route::post('guest-question-answer-form-submit','clientController@guestquestionAnswerFormSubmit')->name('guest.question.answer.form.submit');

Route::get('calendly','clientController@calendly');



Route::get('/verify/{username}/{verfication_code}','clientController@verify_code');
Route::get('/password/reset','clientController@reset_password_view');

Route::post('/password/reset','clientController@reset_password');


Route::post('/password/change/{username}','clientController@password_change');



//================================V E N D O R============================//

Route::get('/vendor/signup','VendorController@vendor_signup_view');
Route::post('vendor/signnup','VendorController@create_vendor');

Route::get('vendor/login','VendorController@vendor_login_view');
Route::post('vendor/login','VendorController@vendor_login');

Route::get('/vendor/logout','VendorController@logout');

Route::get('/vendor/home','VendorController@home');




//................Category Managment....................//

Route::get('/vendor/home/add/main/category','VendorController@add_main_category_view');
Route::post('/vendor/home/add/main/category','VendorController@add_main_category');

Route::get('/vendor/home/add/sub/category','VendorController@add_sub_category_view');
Route::post('/vendor/home/add/sub/category','VendorController@add_sub_category');

Route::get('/vendor/home/view/main/category','VendorController@main_category_list_view');
Route::get('/vendor/home/view/sub/category','VendorController@sub_category_list_view');

Route::get('/vendor/edit/main/category/{sku}','VendorController@edit_main_category_view');
Route::post('/vendor/home/edit/main/category/{sku}','VendorController@edit_main_category');

Route::get('/vendor/home/edit/sub/category/{sku}','VendorController@edit_sub_category_view');
Route::post('/vendor/home/edit/sub/category/{sku}','VendorController@edit_sub_category');

Route::get('/vendor/home/delete/main/category/{pk_id}','VendorController@delete_main_category');
Route::get('/vendor/home/delete/sub/category/{pk_id}','VendorController@delete_sub_category');

//.............. brand managment....................//

Route::get('/vendor/home/add/brand','VendorController@add_brand_view');
Route::post('/vendor/home/add/brand','VendorController@add_brand');

Route::get('/vendor/home/view/brand','VendorController@brand_list_view');

Route::get('/vendor/home/edit/brand/{sku}','VendorController@edit_brand_view');
Route::post('/vendor/home/edit/brand/{sku}','VendorController@edit_brand');

Route::get('/vendor/home/delete/brand/{pk_id}','VendorController@delete_brand');

//,,........=========..Product Managment..........................////////


Route::get('/vendor/home/view/product','VendorController@product_list_view');

Route::get('/vendor/home/add/product','VendorController@add_product_view');
Route::post('/vendor/home/add/product','VendorController@add_product');

Route::get('/vendor/home/view/product/{id}','VendorController@product_detail_view');

Route::get('/vendor/home/edit/product/{id}','VendorController@edit_product_view');
Route::post('/vendor/home/edit/product/{id}','VendorController@edit_product');
Route::get('/vendor/home/delete/product/{id}','VendorController@delete_product');


Route::get('/vendor/ajax-subcat','VendorController@sub');


//=============    Vendor Reporting     ================//

Route::get('/vendor/home/view/reporting/by/products','VendorController@reporting_by_product_list_view');
Route::get('/vendor/home/view/detail/reporting/by/products/{id}','VendorController@reporting_by_product');

Route::get('/vendor/home/view/reporting/by/sale','VendorController@reporting_by_sale_list_view');

Route::get('/vendor/home/view/reporting/by/customer','VendorController@customer_reporting_list_view');
Route::get('/vendor/home/view/detail/reporting/by/customer/{id}','VendorController@customer_reporting');

// ......................  Vendor Order Managment .........................//

Route::get('/vendor/home/view/active/orders','VendorController@active_order_view');
Route::post('/vendor/home/order/update/status','VendorController@update_order_status');

Route::get('/vendor/home/view/cancel/orders','VendorController@cancel_order_list_view');
Route::get('/vendor/home/view/ship/orders','VendorController@ship_order_list_view');

Route::get('/vendor/home/view/return/orders','VendorController@return_order_list_view');
Route::get('/vendor/home/view/complete/orders','VendorController@complete_order_list_view');



Route::get('/vendor/home/view/active/order/view/specific/order/{id}/{o_id}','VendorController@active_order_detail_view');
Route::get('/vendor/home/view/ship/order/view/specific/order/{id}/{o_id}','VendorController@ship_order_detail_view');
Route::get('/vendor/home/view/complete/order/view/specific/order/{id}/{o_id}','VendorController@complete_order_detail_view');
Route::get('/vendor/home/view/cancel/order/view/specific/order/{id}/{o_id}','VendorController@cancel_order_detail_view');
Route::get('/vendor/home/view/return/order/view/specific/order/{id}/{o_id}','VendorController@return_order_detail_view');


//// =========== Vendor Discount =====================//


Route::get('/vendor/home/add/discount','VendorController@add_discount_view');

//............add discount
Route::post('/vendor/home/add/discount','VendorController@add_discount');

//...........view discount list
Route::get('/vendor/home/view/discount','VendorController@view_discount');

//............delete discount

Route::get('/vendor/home/delete/discount/{id}','VendorController@delete_discount');


//............ Vendor Payment .................///

Route::post('/admin/home/vendor/order/update/status','adminController@update_vendor_order_status');
Route::post('/admin/home/update/payment/status','adminController@update_vendor_payment_status');

Route::get('/admin/view/vendor/reporting','adminController@vendor_reporting_list_view');
Route::get('/admin/view/vendors/payments','adminController@vendor_payments_list_view');
Route::post('/admin/view/vendor/payment','adminController@create_payment');






Route::get('/vendor/verify/{username}/{verfication_code}','VendorController@verify_code');

Route::get('/vendor/password/reset','VendorController@reset_password_view');

Route::post('/vendor/password/reset','VendorController@vendor_reset_password');


Route::post('/vendor/password/change/{username}','VendorController@password_change');





Route::get('/admin/verify/{username}/{verfication_code}','adminController@verify_code');
Route::get('/admin/password/reset','adminController@reset_password_view');

Route::post('/admin/password/reset','adminController@admin_reset_password');


Route::post('/admin/password/change/{username}','adminController@password_change');



