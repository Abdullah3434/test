<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Mail;
use Response;
use Session;
use App\DayDite;
use App\DietPlan;
use App\QuestionAnswer;
use App\BankSlip;

use Carbon\Carbon;


class adminController extends Controller
{


  //......................admin login..................//

  //.................admin login view

  public  function admin_login_view() {
    if((session()->has('username') && session()->get('type')=='admin'))
  {
      return redirect('/admin/home');
  }
  elseif((session()->has('username') && session()->get('type')=='vendor'))
  {
      return redirect('/vendor/home');
  }elseif((session()->has('username') && session()->get('type')=='client'))
  {
      return redirect('/');
  }else
    {
        
        return view('admin.login');
    }
  
}


 public function reset_password_view()
    {

        return view('admin.password_reset');

    }
    
      public function admin_reset_password(Request $request)
    {

        $username = $request->input('username');
        $result = DB::select("select* from admin_details where username = '$username'");
        if (count($result) > 0)
        {
            $vcode = uniqid();
            DB::insert("insert into admin_reset_password (username,verification_code) values('$username','$vcode') ");
            $customer_name = $result[0]->{'fname'};
            $data = array(
                'customer_name' => $customer_name,
                'customer_username' => $username,
                'customer_verification_code' => $vcode,

            );
            Mail::send('admin_email_reset_password', $data, function ($message) use ($username)
            {

                $message->from('info@thefoodpharmacy.pk','The Food Pharmacy' );

                $message->to($username)->subject('Password Reset Confirmation Link');

            });
            return redirect()
                ->back()
                ->with('message', 'A Password reset link sent to your email');
        }
        else
        {
            return Redirect::back()
                ->withErrors('Username not found');
        }

    }
    
    
        public function verify_code($username, $code)
    {
        $result = DB::select("select* from admin_reset_password where username= '$username' and verification_code= '$code' and TIMESTAMPDIFF(MINUTE,admin_reset_password.created_at,NOW()) <=30 ");

        if (count($result) > 0)
        {
            return view('admin.change_password', compact('username'));
        }
        else return "The Verification code is expired";
    }
  public function password_change(Request $request, $username)
    {
        $password = md5($request->input('password'));
        DB::update("update admin_details set password ='$password' where username='$username'");
        return redirect('/admin')->with('message', 'Your Password has been changed Successfully');
    }

//.................admin login index

public function index(Request $request)
{
    
    $this->validate($request,['username' => 'required','password'=> 'required']);
    $password= md5($request->input('password'));
     $username= $request->input('username');
     $result = DB::select("select* from admin_details where username = '$username' and password='$password'");
    if(count($result)>0){
        $request->session()->put('username',$username);
          $request->session()->put('name',$result[0]->{'fname'}.' '.$result[0]->{'lname'});
          
          
           $request->session()->put('admin_management',$result[0]->{'admin_management'});
            $request->session()->put('product_management',$result[0]->{'product_management'});
             $request->session()->put('category_management',$result[0]->{'category_management'});
              $request->session()->put('brand_management',$result[0]->{'brand_management'});
               $request->session()->put('order_management',$result[0]->{'order_management'});
                $request->session()->put('reporting',$result[0]->{'reporting'});
                 $request->session()->put('discount',$result[0]->{'discount'});
                  $request->session()->put('promocode',$result[0]->{'promocode'});
                   $request->session()->put('vendor_management',$result[0]->{'vendor_management'});
                   $request->session()->put('coaching_management',$result[0]->{'coaching_management'});

        $request->session()->put('type','admin');
    
      //  $result = DB::select("select * from order_table where status = '0' or status = '1' ");
       
       
        // $result1 = DB::select("select* from client_details");
// $c = count($result1);
// $result2 = DB::select("select* from order_table ");
//  $o = count($result2);
//  $result3 = DB::select("select* from order_table where status = '4' ");
//    $com = count($result3);
  //  $result4 = DB::select("select* from product ");
  //    $p = count($result4);

        return view('admin.index');
    }
    
    else
    {
        return Redirect::back()->withErrors('Username or Password is incorrect');
    }
    
}

//................admin home 

public function admin_home() {
  if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

  //       $result = DB::select("select* from order_table where status = '0' or status = '1' ");
  // $result1 = DB::select("select* from client_details");
  //  $c = count($result1);
  //  $result2 = DB::select("select* from order_table ");
  //    $o = count($result2);
  //    $result3 = DB::select("select* from order_table where status = '4' ");
  //      $com = count($result3);
       $result4 = DB::select("select* from product ");
         $p = count($result4);

        return view('admin.index', compact('p'));
       
    }
    



//......................admin logout
public function logout()
{
    session()->flush();
    return redirect('/admin');
}

//.................................

public  function admin_list_view() {
  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
  if(session()->has('username'))
  {
      $result = DB::select("select* from admin_details");
   
      return view('admin.admin_list',compact('result'));

   
  }
  else
  {
      return redirect('/admin');
  }
 

}

//.................create admin view

public function create_admin_view() {
  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
  if(session()->has('username'))
  {
      return view('admin.add_admin');
  }
  else
  {
      return redirect('/admin');
  }

  
}

//...............admin create

public function create_admin(Request $request)
{
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

   

    // $admin_management = 0;
    $product_management = 0;
    $category_management = 0;
    $brand_management = 0;
    $order_management = 0;
    $reporting = 0;
    $discount = 0;
    $promocode = 0;
    $vendor_management = 0;
    $coaching_management = 0;
    // if($request->input('admin_management'))
    // {
    //     $admin_management = 1;
    // }
    if($request->input('product_management'))
    {
        $product_management = 1;
    }
    if($request->input('category_management'))
    {
        $category_management = 1;
    }
    
       if($request->input('brand_management'))
    {
        $brand_management = 1;
    }
    if($request->input('order_management'))
    {
        $order_management = 1;
    }
    if($request->input('reporting'))
    {
        $reporting = 1;
    }
    
           if($request->input('discount'))
    {
        $discount = 1;
    }
    if($request->input('promocode'))
    {
        $promocode = 1;
    }
    if($request->input('vendor_management'))
    {
        $vendor_management = 1;
    }

    if($request->input('coaching_management'))
    {
        $coaching_management = 1;
    }


    if($product_management==0 && $category_management==0 && $brand_management == 0 && $order_management== 0 && $reporting == 0 && $discount == 0 && $promocode== 0 && $vendor_management== 0 && $coaching_management== 0)
    {
         return Redirect::back()->withErrors('atleast you neeed to select one permission');
     
    }

    $thumbnail = "";
 if ($request->hasFile('image')) {
     $image = $request->file('image');
     $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
     $input['image'] = time().'.'.strtolower($image->getClientOriginalExtension());
    $image->storeAs('public/images',$uniqueFileName);
    
     $thumbnail=$uniqueFileName;
    }
    

    if ($request->input('password') == $request->input('confirm'))
    {
        $username =$request->input('email');

        $result = DB::select("select* from admin_details where username = '$username' ");

           if(count($result)>0)
           {
               
            return Redirect::back()->withErrors('Username already Exist');
           }
           else
           {
                  
                       DB::insert("insert into admin_details (fname,lname, username, password, telephone, address,  image, product_management, category_management,brand_management,order_management,reporting,discount,promocode,vendor_management, coaching_management ) values (?,?,?, ?,?,?, ?,?,?, ?,?,?,?, ?,?,?)",array($request->input('fname'),$request->input('lname'),$request->input('email'),md5($request->input('password')), $request->input('telephone'), $request->input('address'),  $thumbnail,$product_management,$category_management,$brand_management,$order_management,$reporting,$discount,$promocode,$vendor_management,$coaching_management));

                        return redirect('/admin/home/view/admin');
             }
                           

   
}
else{
    return Redirect::back()->withErrors('Password does not match');
   }
}

//............................view specific admin


public function admin_specific_view($id)
{
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    $result = DB::select("select* from admin_details where pk_id = '$id'");
    return view('admin.view_admin',compact('result'));
}


//.....................edit admin view

public function edit_admin_view($id) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
  if(session()->has('username'))
  {
      $result = DB::select("select*  from admin_details where pk_id = '$id'");
      return view('admin.edit_admin',compact('result'));
  }
  else
  {
      return redirect('/admin');
  }

  
}

//..........................edit admin

public function edit_admin($id, Request $request) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
  if(session()->has('username'))
  {
     
  $product_management = 0;
  $category_management = 0;
  $brand_management = 0;
  $order_management = 0;
  $reporting = 0;
  $discount = 0;
  $promocode = 0;
  $vendor_management = 0;
  $coaching_management = 0;
  
  if($request->input('product_management'))
  {
      $product_management = 1;
  }
  if($request->input('category_management'))
  {
      $category_management = 1;
  }
  
     if($request->input('brand_management'))
  {
      $brand_management = 1;
  }
  if($request->input('order_management'))
  {
      $order_management = 1;
  }
  if($request->input('reporting'))
  {
      $reporting = 1;
  }
  
         if($request->input('discount'))
  {
      $discount = 1;
  }
  if($request->input('promocode'))
  {
      $promocode = 1;
  }
  if($request->input('vendor_management'))
  {
      $vendor_management = 1;
  }
  if($request->input('coaching_management'))
  {
      $admin_management = 1;
  }

  if($product_management==0 && $category_management==0 && $brand_management == 0 && $order_management== 0 && $reporting == 0 && $discount == 0 && $promocode== 0 && $vendor_management== 0 && $coaching_management == 0 )
      {
             return Redirect::back()->withErrors('atleast you neeed to select one permission');
      }
}

$result = DB::select("select * from admin_details where pk_id = '$id'");

$image = $result[0]->image;
  if ($request->hasFile('image')) {
      $image = $request->file('image');
      $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
      $input['image'] = time().'.'.strtolower($image->getClientOriginalExtension());
      $destinationPath =public_path('/storage/images');
     $image->storeAs('public/images',$uniqueFileName);
      $image=$uniqueFileName;
  }


if (is_null($request->input('password')) && is_null($request->input('confirm'))){
DB::table('admin_details')->where('pk_id', $id)->update(['fname' =>$request->input('fname'),'lname' =>$request->input('lname'), 'telephone' =>$request->input('telephone'), 'address' =>$request->input('address'), 'image' =>$image,'product_management' =>$product_management,'category_management' =>$category_management ,'brand_management' =>$brand_management,'order_management' =>$order_management,'reporting' =>$reporting,'discount' =>$discount,'promocode' =>$promocode,'vendor_management' =>$vendor_management,'coaching_management' =>$coaching_management]);
        
return redirect('/admin/home/view/admin');
}
//   elseif ($request->input('password') == $request->input('confirm'))
//   {
  
      
//       DB::table('admin_details')->where('pk_id', $id)->update(['fname' =>$request->input('fname'),'lname' =>$request->input('lname'),'password' =>md5($request->input('password')),'admin_management' =>$admin_management,'product_management' =>$product_management,'category_management' =>$category_management ,'brand_management' =>$brand_management,'order_management' =>$order_management,'reporting' =>$reporting,'discount' =>$discount,'promocode' =>$promocode,'vendor_management' =>$vendor_management]);
        
//       return redirect('/admin/home/view/admin');
//            }
// else{
//   return Redirect::back()->withErrors('Password does not match');
//  }


}

//.......................delete admin

public function delete_admin($id) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  DB::delete("delete from admin_details where pk_id = '$id'");
  

  return redirect()->back(); 
 }
 



  //........................Category Managment..................//
    public function main_category_list_view() {

      if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }
          
       
       $result = DB::select("select* from main_category");
                 
      
        return view('admin.category_list_view',compact('result'));

}

//........................add main category view

public function add_main_category_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
      {
          return redirect('/admin');
      }
        
    
      return view('admin.add_category'); 
        
     }
//...............................add main category

     public function add_main_category(Request $request) {
      if(!(session()->has('type') && session()->get('type')=='admin'))
     {
         return redirect('/admin');
     }
     
     
        $cat = $request->input('mainCategory');
        $result = DB::select( DB::raw("SELECT * FROM main_category WHERE main_category = :value"), array(
    'value' => $cat,
  ));
         if(count($result)>0)
         {
              return Redirect::back()->withErrors('Category already Exist');
             
         }
         else
         
   {
       
     
     $username = 'admin';
   
           DB::insert("insert into main_category (main_category,username) values (?,?)",array($request->input('mainCategory'),$username));
           return redirect('/admin/home/view/main/category');   
          }
    }
 
//............................edit main category view

public function edit_main_category_view($sku) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $result = DB::select("select* from main_category where SKU = '$sku'");
 
    return view('admin.edit_category',compact('result'));

}

//........................edit main category

public function edit_main_category(Request $request, $sku) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    
          $cat = $request->input('mainCategory');
        $result = DB::select("select* from main_category where main_category = '$cat' ");
        if(count($result)>0)
        {
             return Redirect::back()->withErrors('Category already Exist');
            
        }
        else
        
  {
    

    $main_category =$request->input('mainCategory');

    DB::table('main_category')->where('SKU', $sku)->update(['main_category' =>$main_category]);
    return redirect('/admin/home/view/main/category');

}
}
//...............................delete main category

public function delete_main_category($id) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  DB::delete("delete from main_category where SKU = '$id'");
  

  return redirect()->back(); 
 }

//.........................sub category list view................//

public function sub_category_list_view() {
  if(!(session()->has('type') && session()->get('type')=='admin'))
{
    return redirect('/admin');
}

    $result = DB::select("select* from sub_category");
 
    return view('admin.sub_category_list',compact('result'));

}

//........................Add Sub Cateogy View

public function add_sub_category_view() {
  if(!(session()->has('type') && session()->get('type')=='admin'))
{
return redirect('/admin');
}

   $result = DB::select("select* from main_category");
   return view('admin.add_sub_category',compact('result'));        
  }


//....................................add sub category

public function add_sub_category(Request $request) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
{
return redirect('/admin');
}
$category = $request->input('mainCategory');

    $cat = $request->input('subCategory');
    
$result = DB::select( DB::raw("SELECT * FROM sub_category WHERE sub_category = :value and main_category= :value2"), array(
'value' => $cat,
'value2' => $category,
));   

//     $result = DB::select("select* from sub_category where sub_category = '$cat' and main_category='$category'  ");
if(count($result)>0)
{
  return Redirect::back()->withErrors('Subcategory already Exist');
 
}
else

{
$username = 'admin';
$category = $request->input('mainCategory');

       DB::insert("insert into sub_category (main_category,sub_category,username) values (?,?,?)",array($category,$request->input('subCategory'), $username));
       return redirect('/admin/home/view/sub/category'); 
      }
}
      
//.......................edit sub category view

public function edit_sub_category_view($sku) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $result = DB::select("select* from main_category");

    $result1 = DB::select("select* from sub_category where SKU = '$sku'");
 
    return view('admin.edit_sub_category',compact('result','result1'));

}

//................................edit sub category

public function edit_sub_category(Request $request, $sku) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
      $main_category =$request->input('mainCategory');
                $cat = $request->input('subCategory');
                
                        $result = DB::select( DB::raw("SELECT * FROM sub_category WHERE sub_category = :value and main_category= :value2"), array(
   'value' => $cat,
   'value2' => $main_category,
 ));
       
        if(count($result)>0)
        {
             return Redirect::back()->withErrors('Subcategory already Exist');
            
        }
        else
        
  {

  

    DB::table('sub_category')->where('SKU', $sku)->update(['main_category' =>$main_category,'sub_category' =>$cat]);
    return redirect('/admin/home/view/sub/category');

}
}
//..................delete sub category

public function delete_sub_category($id) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  DB::delete("delete from sub_category where SKU = '$id'");
  

  return redirect()->back(); 
 }

//...................brand list view


public function brand_list_view() {
  if(!(session()->has('type') && session()->get('type')=='admin'))
{
 return redirect('/admin');
}

         $result = DB::select("select* from brand");
      
         return view('admin.brand_list',compact('result'));

}


//............add brand view

public function add_brand_view() {
  if(!(session()->has('type') && session()->get('type')=='admin'))
{
    return redirect('/admin');
}
  
    return view('admin.add_brand_view'); 
      
   }

//...................add brand

public function add_brand(Request $request) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
{
 return redirect('/admin');
}
    $cat = $request->input('brandname');
 $result = DB::select("select* from brand where brand_name = '$cat' ");
 if(count($result)>0)
 {
      return Redirect::back()->withErrors('Brand already Exist');
     
 }
 else
 
{

 DB::insert("insert into brand (brand_name) values (?)",array($request->input('brandname')));
 return redirect('/admin/home/view/brand');     
}
}

//........................edit brand view

public function edit_brand_view($sku) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $result = DB::select("select* from brand where SKU = '$sku'");
 
    return view('admin.edit_brand',compact('result'));

}

//.............................edit brand

public function edit_brand(Request $request, $sku) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    
           $cat = $request->input('brandname');
        $result = DB::select("select* from brand where brand_name = '$cat' ");
        if(count($result)>0)
        {
             return Redirect::back()->withErrors('Brand already Exist');
            
        }
        else
        
  {
    
    $brand_name =$request->input('brandname');

    DB::table('brand')->where('SKU', $sku)->update(['brand_name' =>$brand_name]);
    return redirect('/admin/home/view/brand');

}
}

//...................delete brand

public function delete_brand($id) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  DB::delete("delete from brand where SKU = '$id'");
  

  return redirect()->back(); 
 }

 ///////////////////.........Product Mangment..........//////////////////////

 //............product list view

 public function product_list_view() {
  if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    $result = DB::select("select* from product where v_product_status='2' or v_product_status='0' ");
    return view('admin.product_list',compact('result')); 
   }

//.............add product view

public function add_product_view() {
  if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    // $result = DB::select("select* from product_type where product_type IS NOT NULL and username = 'admin'");
    $result1 = DB::select("select* from brand");
    $result2 = DB::select("select* from main_category where username = 'admin'");
    $result3 = DB::select("select* from sub_category where sub_category IS NOT NULL and username = 'admin'");
  
    return view('admin.add_product_view',compact('result1','result2','result3')); 
   }

//.....................add product

public function add_product(Request $request) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
 {
     return redirect('/admin');
 }
 
   $q = $request->input('mytextt');
 
                       $cat = $request->input('sku');
                       $result3 = DB::select("select* from product where SKU = '$cat' ");
if(count($result3)>0)
{
 
  // Session::flash('message','Already name Exist');

  return Redirect::back()->withErrors('This SKU Already Exist, Please select unique one.');
  
}

     $result = DB::select("select* from product where SKU = '$cat' ");

   
     $main_category = urldecode($request->input('mainCategory'));
     $sub_category = '';
    //  $product_type ='';
  if(!empty($main_category))
  {
 $a =  $request->input('SubCategory');
  $sub_category = DB::select("select* from sub_category where SKU = '$a' ");
 $sub_category = $sub_category[0]->sub_category;
 
  // $product_type = $request->input('ProductType');
 
  }
  

 $final_size="";

 $thumbnail = "";
 if ($request->hasFile('file1')) {
     $image = $request->file('file1');
     $uniqueFileName = uniqid() . $image->getClientOriginalName() ;
     $input['file1'] = time().'.'.strtolower($image);
     $image->storeAs('public/images',$uniqueFileName);
     $thumbnail=$uniqueFileName;
 }
 $thumbnail2 = "";
 if ($request->hasFile('file2')) {
     $image = $request->file('file2');
     $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
     $input['file2'] = time().'.'.strtolower($image->getClientOriginalExtension());
     $image->storeAs('public/images',$uniqueFileName);
     $thumbnail2=$uniqueFileName;
 }

 $thumbnail3 = "";
 if ($request->hasFile('file3')) {
     $image = $request->file('file3');
     $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
     $input['file3'] = time().'.'.strtolower($image->getClientOriginalExtension());
    $image->storeAs('public/images',$uniqueFileName);
    
     $thumbnail3=$uniqueFileName;
 }
 
 $thumbnail4 = "";
 if ($request->hasFile('file4')) {
     $image = $request->file('file4');
     $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
     $input['file4'] = time().'.'.strtolower($image->getClientOriginalExtension());
    $image->storeAs('public/images',$uniqueFileName);
    
     $thumbnail4=$uniqueFileName;
 }
 $status = 0;
 if($request->input('status'))
 {
     $status = 1;
 }
 

// $color = $request->input('_color');

$vendor_id = "admin";  
$v_product_status = 0;
$unit = $request->input('unit');
 
 DB::insert("insert into product (SKU,name,price,main_category,sub_category,brand_name,thumbnail,thumbnail2,thumbnail3,thumbnail4,description,status,size,unit,quantity_on_hand,v_product_status,vendor_id) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($request->input('sku'),$request->input('name'),$request->input('price'),$main_category,$sub_category,$request->input('brandName'),$thumbnail,$thumbnail2,$thumbnail3,$thumbnail4,$request->input('description'),$status,$final_size,$unit,$request->input('quantity_on_hand'),$v_product_status, $vendor_id));
 $sku = $request->input('sku');
   $sku = DB::select("select* from product where SKU = '$sku' ");
   if(!empty($sku))
   {
   $sku = $sku[0]->pk_id;
   for($i=0; $i < count($q); $i++ )
 {

     DB::insert("insert into size_detail (product_id,quantity,size) values (?,?,?)",array($sku,$q[$i],$q[++$i]));

 }
   }
 return redirect('/admin/home/view/product');

}

//.................script for subcat

public function sub(Request $request)
{
    $value = $request->Input('cat_id');
    

$subcategories = DB::select( DB::raw("SELECT * FROM sub_category WHERE main_category = :value"), array(
'value' => $value,
));

    
    return Response::json($subcategories);        

}
 
//.......................product detailed view

public function product_detail_view($pk_id) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
  $result = DB::select("select* from product where pk_id='$pk_id'");

  return view('admin.view_product',compact('result'));

}

//...............delete product

public function delete_product($id) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  DB::delete("delete from product where pk_id = '$id'");
  

  return redirect()->back(); 
 }
 
 
 
//...............delete diet plan
 
 public function delete_diet_plan($pk_id) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  DB::delete("delete from dietplan where pk_id = '$pk_id'");
  
  DB::delete("delete from sunday where dietplan_id = '$pk_id'");
  DB::delete("delete from monday where dietplan_id = '$pk_id'");
  DB::delete("delete from tuesday where dietplan_id = '$pk_id'");
  DB::delete("delete from wednesday where dietplan_id = '$pk_id'");
  DB::delete("delete from thursday where dietplan_id = '$pk_id'");
  DB::delete("delete from friday where dietplan_id = '$pk_id'");
   DB::delete("delete from saturday where dietplan_id = '$pk_id'");
  

  return redirect()->back(); 
 }
 
 
 
 
//..........................edit product view

public function edit_product_view($pk_id) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
 {
     return redirect('/admin');
 }

 $result = DB::select("select* from product where pk_id = '$pk_id'");
 $result1 = DB::select("select* from main_category");
 $main = $result[0]->main_category;
   $sub = $result[0]->sub_category;
   
  
          $result2 = DB::select( DB::raw("SELECT * FROM sub_category WHERE main_category = :value"), array(
'value' => $main,
));

      //  $result3 = DB::select( DB::raw("SELECT * FROM product_type WHERE main_category= :value and sub_category= :value2 "), array(
// 'value' => $main,
// 'value2' => $sub,
// ));

// $result2 = DB::select("select* from sub_category where main_category = '$main'");

//  $result3 = DB::select("select* from product_type  where main_category = '$main' and sub_category = '$sub' ");
 
 $result4 = DB::select("select* from brand");

 return view('admin.edit_product',compact('result','result1','result2','result4'));

}

//...............................edit product

public function edit_product($pk_id, Request $request) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
  

   $result = DB::select("select * from product where pk_id = '$pk_id'"); 
   
      if($request->input('mytextt'))
  {
       $q = $request->input('mytextt');
         DB::delete("delete from size_detail where product_id = '$pk_id'");
  
    for($i=0; $i < count($q); $i++ )
  {
          DB::insert("insert into size_detail (product_id,quantity,size) values (?,?,?)",array($pk_id,$q[$i],$q[++$i]));

  }

  
  }
  
    $status = 0;
  if($request->input('status'))
  {
      $status = 1;
  }
  
  
  
    $main_category = urldecode($request->input('mainCategory'));
   
      
    
  $a =  $request->input('SubCategory');
      $sub_category = DB::select( DB::raw("SELECT * FROM sub_category WHERE sub_category = :value"), array(
 'value' => $a,
));


  if(count($sub_category)>0)
  {
       $a = $sub_category[0]->sub_category;
      
  }
  else
  {
  
    $sub_category = DB::select( DB::raw("SELECT * FROM sub_category WHERE SKU = :value"), array(
 'value' => $a,
));

if(count($sub_category)>0)

  {
  $a = $sub_category[0]->sub_category;
  }
  else{
      $a = "";
  }
  }
  

  //  $product_type = $request->input('ProductType');
  
     $final_size="";

  $unit = $request->input('unit');

  $thumbnail = $result[0]->thumbnail;
  if ($request->hasFile('file')) {
      $image = $request->file('file');
      $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
      $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
      $destinationPath =public_path('/storage/images');
     $image->storeAs('public/images',$uniqueFileName);
      $thumbnail=$uniqueFileName;
  }
  $thumbnail2 = $result[0]->thumbnail2;
  if ($request->hasFile('images2')) {
      $image = $request->file('images2');
      $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
      $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
      $destinationPath =public_path('/storage/images');
    $image->storeAs('public/images',$uniqueFileName);
      $thumbnail2=$uniqueFileName;
  }

  $thumbnail3 = $result[0]->thumbnail3;
  if ($request->hasFile('images3')) {
      $image = $request->file('images3');
      $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
      $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
      $destinationPath =public_path('/storage/images');
  $image->storeAs('public/images',$uniqueFileName);
      $thumbnail3=$uniqueFileName;
  }
  
  $thumbnail4 = $result[0]->thumbnail4;
  if ($request->hasFile('images4')) {
      $image = $request->file('images4');
      $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
      $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
      $destinationPath =public_path('/storage/images');
  $image->storeAs('public/images',$uniqueFileName);
      $thumbnail4=$uniqueFileName;
  }
  // $color = $result[0]->color;

  //  if($request->input('_color'))
  // {
  //     $color = $request->input('_color');
  // }

 DB::table('product')->where('pk_id', $pk_id)->update(['sku' =>$request->input('sku'),'name' =>$request->input('name'),'price' =>$request->input('price'),'main_category' =>$main_category,'sub_category' =>$a,'brand_name' =>$request->input('brandName'),'thumbnail' =>$thumbnail,'thumbnail2' =>$thumbnail2,'thumbnail3' =>$thumbnail3,'thumbnail4' =>$thumbnail4,'status' =>$status,'quantity_on_hand'=>$request->input('quantity_on_hand'),'size' =>$final_size,'unit' =>$unit,'description' =>$request->input('description')]);

  if($request->input('mytextt'))
  {
       $q = $request->input('mytextt');
         DB::delete("delete from size_detail where product_id = '$pk_id'");
  
    for($i=0; $i < count($q); $i++ )
  {
          DB::insert("insert into size_detail (product_id,quantity,size) values (?,?,?)",array($pk_id,$q[$i],$q[++$i]));

  }
    }
 return redirect('/admin/home/view/product');
}

//.........................Discount............................//

//..............discount list view


public function view_discount() {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
  $username = session()->get('username');
  // return $username;
  $result = DB::select("select* from discount_table where username = '$username'");

  return view('admin.discount_list',compact('result'));

}

//.....................add discount view

public function add_discount_view() {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
 
        $result1 = DB::select("select* from sub_category");

  $result = DB::select("select* from product  ");
  return view('admin.add_discount',compact('result','result1'));

}

//......................add discount


public function add_discount(Request $request) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
  $username = session()->get('username');

       
  $status = "1";
        $sku = $request->input('sku');
        DB::insert("insert into discount_table (SKU,category,start_date,end_date,percentage,username) values (?,?,?,?,?,?)", array(
            $request->input('sku') ,
            $request->input('category'),
            $request->input('start_date') ,
            $request->input('end_date') ,
            $request->input('percentage'),
            
            $username
        ));
        if($request->input('sku')>0)
        {
        DB::table('product')
            ->where('SKU', $sku)->update(['discount_status' => $status]);
        }
        else
        {
            DB::table('product')
            ->where('sub_category', $request->input('category'))->update(['discount_status' => $status]);
        }

 return redirect('/admin/home/view/discount');  
    
    
    
    
}
       
//....................delete discount


public function delete_discount($id) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  DB::delete("delete from discount_table  where pk_id = '$id'");
  

  return redirect()->back(); 
 }
 
//...............discount detailed view

public function discount_detail_view($id){

   if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  $result = DB::select("select* from discount_table where pk_id='$id'");

  return view('admin.view_discount',compact('result'));

}

//................update status

public function updateProductStatus($pk_id,$status)
   {
     if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    
       DB::update("update product set status='$status' where pk_id = '$pk_id'");

       return $status;
   }



   //====================Vendor Mangment===============================//


   public function vendor_list_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
      {
          return redirect('/admin');
      }
      $result = DB::select("select* from vendors where vendor_status= '0'");
      return view('admin.vendor_list',compact('result')); 
     }


     public function vendor_block_list_view() {
      if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }
        $result = DB::select("select* from vendors where vendor_status= '1'");
        return view('admin.vendor_block_list',compact('result')); 
       }


       public function vendor_pending_list_view() {
        if(!(session()->has('type') && session()->get('type')=='admin'))
          {
              return redirect('/admin');
          }
          $result = DB::select("select* from vendors where vendor_status= '2'");
          return view('admin.vendor_pending_list',compact('result')); 
         }

     public function vendor_detail_view($pk_id) {
      if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }
    
    
        $result = DB::select("select* from vendors where id = '$pk_id'");
     
        return view('admin.view_vendor',compact('result'));
    
    }



    
    public function vendor_pending_detail_view($pk_id) {
      if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }
    
    
        $result = DB::select("select* from vendors where id = '$pk_id'");
     
        return view('admin.vendor_pending_detail_view',compact('result'));
    
    }

    


    public function vendor_block_detail_view($pk_id) {
      if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }
    
    
        $result = DB::select("select* from vendors where id = '$pk_id'");
     
        return view('admin.vendor_block_detail_view',compact('result'));
    
    }

//'''...................update vendor status................//


public function update_vendor_status(Request $request)
{
  if(!(session()->has('type') && session()->get('type')=='admin'))
 {
     return redirect('/admin');
 }
 $id = $request->input('id');
   DB::table('vendors')->where('id', $id)->update(['vendor_status' =>$request->input('status')]);
  
     
    
         
     return URL('/')."/admin/home/view/vendors/list";
}





//===============================Order MAngment================================///
   public function active_order_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
      {
          return redirect('/admin');
      }
  
  
   //$result = DB::select("select order_table.pk_id,order_table.fname,order_table.lname,address_table.fname,address_table.lname,order_table.amount,order_table.placed_at from order_table,address_table where order_table.shipment_address_id=address_table.pk_id or order_table.status = '0'");
  
  
   $result = DB::select("select* from order_table where status = '0' ");
  
  
   return view('admin.active_order',compact('result'));
  
  }

  public function complete_order_list_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
   {
       return redirect('/admin');
   }

  
   $result = DB::select("select* from order_table where status = '2'");
   return view('admin.deliver_order',compact('result')); 
  }

  public function shipped_order_list_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
   {
       return redirect('/admin');
   }

  
   $result = DB::select("select* from order_table where status = '1'");
   return view('admin.shipped_order',compact('result')); 
  }



  public function cancelled_order_list_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
   {
       return redirect('/admin');
   }

  
   $result = DB::select("select* from order_table where status = '3'");
   return view('admin.cancel_order',compact('result')); 
  }


  public function returned_order_list_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
   {
       return redirect('/admin');
   }

  
   $result = DB::select("select* from order_table where status = '4'");
   return view('admin.refunded_order',compact('result')); 
  }



//============================ Detailed view of Orders ============================


 public function active_order_detail_view($id)
    {
        if (!(session()->has('type') && session()
            ->get('type') == 'admin'))
        {
            return redirect('/admin');
        }

        $result = DB::select("select* from order_table where pk_id = '$id'");



        $o_id = $result[0]->user_id;
        if (empty($o_id))
        {
            $result1 = DB::select("select * from product,detail_table where  detail_table.order_id = '$id' and detail_table.sku = product.sku");

            return view('admin.view_active_order_detail', compact('result', 'result1'));

        }
        else
        {
            $result = DB::select("select order_table.pk_id ,order_table.username,order_table.promo_amount,address_table.fname,address_table.lname,order_table.amount,address_table.address,order_table.status,address_table.phone from order_table,address_table where order_table.shipment_address_id=address_table.pk_id and order_table.pk_id = '$id'");
    $result1 = DB::select("select * from product,detail_table where detail_table.order_id = '$id' and detail_table.sku = product.sku"); 
    return view('admin.view_active_order_detail',compact('result','result1')); 
        }
    }





public function shipped_order_detail_view($id)
    {
        if (!(session()->has('type') && session()
            ->get('type') == 'admin'))
        {
            return redirect('/admin');
        }

        $result = DB::select("select* from order_table where pk_id = '$id'");



        $o_id = $result[0]->user_id;
        if (empty($o_id))
        {
            $result1 = DB::select("select * from product,detail_table where  detail_table.order_id = '$id' and detail_table.sku = product.sku");

            return view('admin.view_shipped_order_detail', compact('result', 'result1'));

        }
        else
        {
            $result = DB::select("select order_table.pk_id ,order_table.username,order_table.promo_amount,address_table.fname,address_table.lname,order_table.amount,address_table.address,order_table.status,address_table.phone from order_table,address_table where order_table.shipment_address_id=address_table.pk_id and order_table.pk_id = '$id'");
    $result1 = DB::select("select * from product,detail_table where detail_table.order_id = '$id' and detail_table.sku = product.sku"); 
    return view('admin.view_shipped_order_detail',compact('result','result1')); 
        }
    }







 public function complete_order_detail_view($id)
    {
        if (!(session()->has('type') && session()
            ->get('type') == 'admin'))
        {
            return redirect('/admin');
        }

        $result = DB::select("select* from order_table where pk_id = '$id'");

        $o_id = $result[0]->user_id;
        if (empty($o_id))
        {
            $result1 = DB::select("select * from product,detail_table where detail_table.order_id = '$id' and detail_table.sku=product.sku");

            return view('admin.view_complete_order_detail', compact('result', 'result1'));

        }
        else
        {

            $result = DB::select("select order_table.pk_id ,order_table.promo_amount,address_table.fname,address_table.lname,order_table.amount,address_table.address,order_table.status,address_table.phone from order_table,address_table where order_table.shipment_address_id=address_table.pk_id and order_table.pk_id = '$id'");
            $result1 = DB::select("select * from product,detail_table where detail_table.order_id = '$id' and detail_table.sku = product.sku");
            return view('admin.view_complete_order_detail', compact('result', 'result1'));
        }
    }

    public function cancel_order_detail_view($id)
    {
        if (!(session()->has('type') && session()
            ->get('type') == 'admin'))
        {
            return redirect('/admin');
        }

        $result = DB::select("select* from order_table where pk_id = '$id'");

        $o_id = $result[0]->user_id;
        if (empty($o_id))
        {
            $result1 = DB::select("select * from product,detail_table where detail_table.order_id = '$id' and detail_table.sku = product.sku");
            return view('admin.view_cancelled_order_detail', compact('result', 'result1'));
        }
        else
        {
            $result = DB::select("select order_table.pk_id ,order_table.promo_amount,address_table.fname,address_table.lname,order_table.amount,address_table.address,order_table.status,address_table.phone from order_table,address_table where order_table.shipment_address_id=address_table.pk_id and order_table.pk_id = '$id'");
            $result1 = DB::select("select * from product, detail_table where detail_table.order_id = '$id' and detail_table.sku= product.sku");
            return view('admin.view_cancelled_order_detail', compact('result', 'result1'));
        }
    }

    public function return_order_detail_view($id)
    {
        if (!(session()->has('type') && session()
            ->get('type') == 'admin'))
        {
            return redirect('/admin');
        }

        $result = DB::select("select* from order_table where pk_id = '$id'");

        $o_id = $result[0]->user_id;
        if (empty($o_id))
        {
            $result1 = DB::select("select * from detail_table where order_id = '$id'");

            return view('admin.view_complete_order_detail', compact('result', 'result1'));

        }
        else
        {
            $result = DB::select("select order_table.pk_id ,order_table.promo_amount,address_table.fname,address_table.lname,order_table.amount,address_table.address,order_table.status,address_table.phone from order_table,address_table where order_table.shipment_address_id=address_table.pk_id and order_table.pk_id = '$id'");
            $result1 = DB::select("select * from detail_table where order_id = '$id'");
            return view('admin.view_complete_order_detail', compact('result', 'result1'));
        }
    }























  public function update_order_status(Request $request)
  {
    if(!(session()->has('type') && session()->get('type')=='admin'))
   {
       return redirect('/admin');
   }
   $id = $request->input('id');
//   return $id;
   $status = $request->input('status');
     DB::table('order_table')->where('pk_id', $request->input('id'))->update(['status' =>$request->input('status')]);
       DB::table('detail_table')->where('order_id', $request->input('id'))->update(['v_order_status' =>$request->input('status')]);
       
       
            $current = Carbon::now();
            $trialExpires = $current->addDays(7);

if($status=='2')
{
    DB::table('order_table')
            ->where('pk_id', $request->input('id'))
            ->update(['expire_at' =>  $trialExpires ]);
       
}

     
     
     

  
    
       
      
           
       return URL('/')."/admin/home/view/active/orders";
  }

//// =========================== Reporting ===========================//


public function customer_reporting_list_view() {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
  $result = DB::select("select* from client_details");


  return view('admin.by_customer',compact('result'));
 
}


public function customer_reporting($id) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

 $sum = 0;
  $result = DB::select("select * from order_table, client_details where order_table.user_id = client_details.pk_id and order_table.user_id = '$id' and order_table.status = '2'");

  if(count($result)>0)
  foreach($result as $results)
  {
      if($results->promo_amount == "")
$sum = $sum + $results->amount;
else
$sum = $sum + $results->promo_amount;
  }
  return view('admin.view_customer_report_detail',compact('result','sum'));

}


//============================== by sale 

public function reporting_by_sale_list_view() {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
$total = 0;
 
  $result = DB::select("select* from order_table where status = '2'");

  foreach( $result as  $results)
  {
      $total = $total + $results->amount;
  }
  return view('admin.by_sale',compact('result','total')); 
 }

// ========================= by Product

public function reporting_by_product_list_view() {
  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  $result = DB::select("select* from product");


  return view('admin.by_product_list',compact('result'));
 
}


public function reporting_by_product($sku) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
  $total = 0 ;
  $result = DB::select("select* from detail_table where product_id = '$sku'");
  $result1 = DB::select("SELECT SUM(detail_table.price) FROM detail_table WHERE detail_table.product_id='$sku'");
  // return $result1;
  $total = $result1[0]->{'SUM(detail_table.price)'};
  return view('admin.by_product_detail',compact('result','total'));
}

//======================= PROMO CODE  ====================//

public function view_promo_list() {
  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
 $result = DB::select("select* from promo_code,promo_for where promo_code.pk_id= promo_for.promo_id");
        $result1 = DB::select("select* from promo_code");
        return view('admin.promo_code_list', compact('result','result1'));


}

public function view_promo_detail($id) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
   $result = DB::select("select* from promo_code,promo_for where promo_code.pk_id= '$id' and promo_for.promo_id= '$id'  ");
        // return $result;
        $result1 = DB::select("select* from promo_code");
// return $result;
  return view('admin.view_promo',compact('result','result1'));

}


public function add_promo_view() {

  
  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
  $result = DB::select("select* from client_details ");
        $result1 = DB::select("select* from sub_category ");


  return view('admin.add_promo_code',compact('result','result1'));

}


public function add_promo(Request $request)
    {

        if (!(session()->has('type') && session()
            ->get('type') == 'admin'))
        {
            return redirect('/admin');
        }
        
        
        $promo_name = $request->input('promoinput') ;
        // return $promo_name;
       if( $request->input('category'))

       {
        $discount_category = $request->input('category') ;


       }
else{

    $discount_category = "0" ;

}

    //   $discount_category = $request->input('category') ;

      $use_time = $request->input('use_time') ;
    //   return $discount_category;
  
 
// return $promo_name;
        
        $status = 1;
        if ($request->input('status'))
        {
            $status = 0;
        }

        if ($request->input('radio') == '1')
        {
            $discount_type = 'fixed';
        }
        if ($request->input('radio') == '2')
        {
            $discount_type = 'percentage';
        }
        
        
//         if($request->input('username') )
//   {
//       $discount_for = "$promo_name";
  
//   }


  


        if ($request->input('optradio') == '3')
        {
            $discount_for = 'all customers';
        }
        if ($request->input('optradio') == '4')
        {
            $discount_for = 'existing customers';
        }
        if ($request->input('optradio') == '5')
        {
            $discount_for = 'new customers';
        }

        DB::insert("insert into promo_code (promo_code,use_time,discount_type,discount_amount,start_date,end_date,min_total,max_total, discount_category,status) values (?,?,?,?,?,?,?,?,?,?)", array(
            $request->input('promo') ,
            $use_time,
            $discount_type,
            $request->input('discount') ,
            $request->input('start_date') ,
            $request->input('end_date') ,
            $request->input('min') ,
            $request->input('max') ,
            // $discount_for,
            $discount_category,
            $status
        ));

        $dietPlanId = DB::getPdo()->lastInsertId();
        // return $dietPlanId;


        $promo_name = $request->input('promoinput') ;
//  return $promo_name;
          if(count($promo_name)>0)
          {
          
          for($i=0; $i < count($promo_name); $i++ )
        {
        
            DB::insert("insert into promo_for (promo_id,discount_for) values (?,?)",array($dietPlanId,$promo_name[$i]));
        
        }
          }
        




        DB::update("update client_details set promostatus = '$use_time' where username= '$promo_name[0]' ");
        return redirect('/admin/home/view/promo');
    }

 //.................. Edit Promo ..................//

 public function edit_promo_view($pk_id) {
    
  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
  $result = DB::select("select* from promo_code where pk_id = '$pk_id'");

  return view('admin.edit_promo_code',compact('result'));

}


public function edit_promo(Request $request, $pk_id) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
  $discount_type = "";

  $status = 1;
  if($request->input('status'))
  {
      $status = 0;
  }

  if($request->input('radio') == '1')
  {
      $discount_type = 'fixed';
  }
  if($request->input('radio') == '2')
  {
      $discount_type = 'percentage';
  }



  if($request->input('optradio') == '3')
  {
      $discount_for = 'all customers';
  }
  if($request->input('optradio') == '4')
  {
      $discount_for = 'existing customers';
  }
  if($request->input('optradio') == '5')
  {
      $discount_for = 'new customers';
  }
  DB::table('promo_code')->where('pk_id', $pk_id)->update(['promo_code' =>$request->input('promo'),'discount_type' => $discount_type,'start_date' => $request->input('start_date'),'end_date' => $request->input('end_date'),'min_total' => $request->input('min'),'max_total' => $request->input('max'),'discount_for' => $discount_for,'discount_amount' => $request->input('discount'),'status' => $status]);
  return redirect('/admin/home/view/promo');

}



public function delete_promo_code($id) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  DB::delete("delete from promo_code  where pk_id = '$id'");
  

  return redirect()->back(); 
 }

 // ========================= Vendor Products ===================//


 public function pending_product_list_view() {
  if(!(session()->has('type') && session()->get('type')=='admin'))
 {
     return redirect('/admin');
 }


 $result = DB::select("select* from product where v_product_status = '1'");
 return view('admin.vendor_pending_product_list',compact('result')); 
}

public function approved_product_list_view() {
  if(!(session()->has('type') && session()->get('type')=='admin'))
 {
     return redirect('/admin');
 }


 $result = DB::select("select* from product where v_product_status = '2'");
 return view('admin.vendor_approved_product_list',compact('result')); 
}


public function cancel_product_list_view() {
  if(!(session()->has('type') && session()->get('type')=='admin'))
 {
     return redirect('/admin');
 }


 $result = DB::select("select* from product where v_product_status = '3'");
 return view('admin.vendor_cancelled_product_list',compact('result')); 
}




public function update_ven_product_status(Request $request)
   {
     if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    $id = $request->input('id');
      DB::table('product')->where('pk_id', $request->input('id'))->update(['v_product_status' =>$request->input('status')]);
     
        
       return URL('/')."/admin/home/view/pending/products";
   }
 


// ...................... detailed view ......................//

public function pending_product_detail_view($id) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }


    $result = DB::select("select* from product  where pk_id = '$id'");
    $v_id = $result[0]->vendor_id;
    $result1 = DB::select("select* from vendors  where email = '$v_id'");
    return view('admin.view_vendor_pending_product',compact('result','result1'));

    }


 public function approved_product_detail_view($id) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }


    $result = DB::select("select* from product  where pk_id = '$id'");
    $v_id = $result[0]->vendor_id;
    $result1 = DB::select("select* from vendors  where email  = '$v_id'");
    return view('admin.view_vendor_product',compact('result','result1'));

    }




 public function cancel_product_detail_view($id) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }


    $result = DB::select("select* from product  where pk_id = '$id'");
    $v_id = $result[0]->vendor_id;
    $result1 = DB::select("select* from vendors  where email  = '$v_id'");
    return view('admin.view_vendor_pending_product',compact('result','result1'));

    }


//==========================coaching module========================//

public function dietPlanList()
{
 
      $data = DB::select("select* from dietplan ");
  return view('admin.dietPlanList',compact('data'));
  }
  
public function createDietPlan()
{
 
  return view('admin.add_diet_plan');
}

//=................create diet plan.....................//

// public function createDietPlanSubmit(Request $request)
// 	{
// 		// dd($request->all());

// 		$data = $request->input();
// 		unset($data['_token']);
// 		$newdata['name'] = $data['dietPlanName'];
// 		$newdata['description'] = $data['dietPlanDescription'];
// 		$newdata['created_at'] = date('Y:m:d H:i:s');
// 		unset($data['dietPlanName']);
// 		unset($data['dietPlanDescription']);
// 		DB::table('diet_plans')->insert($newdata);
// 		$dietPlanId = DB::getPdo()->lastInsertId();
// 		$toProcess = $output = array_slice($data, 0);
// 		 // dd($toProcess);
// 		foreach ($toProcess as $key => $value) {
// 			$sundayDiet[substr($key,6)] = $value;

// 			if($key == 'sundayGrocery') break;
// 		}

// 		$toProcess = $output = array_slice($data, 3); 
// 			foreach ($toProcess as $key => $value) {
// 			$mondayDiet[substr($key,6)] = $value;
// 			if($key == 'mondayGrocery') break;
// 		}

		

// 		$toProcess = $output = array_slice($data, 6); 
// 		// dd($toProcess);
// 		foreach ($toProcess as $key => $value) {
// 			$tuesdayDiet[substr($key,7)] = $value;
// 			// dd($tuesdayDiet);
// 			if($key == 'tuesdayGrocery') break;
// 		}
		

			
// 		$toProcess = $output = array_slice($data, 9); 
// 		foreach ($toProcess as $key => $value) {
// 			$wednedayDiet[substr($key,9)] = $value;
// 			if($key == 'wednesdayGrocery') break;
// 		}

// 		$toProcess = $output = array_slice($data, 12); 
// 		foreach ($toProcess as $key => $value) {
// 			$thurdayDiet[substr($key,8)] = $value;
// 			if($key == 'thursdayGrocery') break;
// 		}

// 		$toProcess = $output = array_slice($data, 15); 
// 		foreach ($toProcess as $key => $value) {
// 			$fridayDiet[substr($key,6)] = $value;
// 			if($key == 'fridayGrocery') break;
// 		}

// 		// dd($fridayDiet);
// 		$toProcess = $output = array_slice($data, 18); 
// 		foreach ($toProcess as $key => $value) {
// 			$saturdayDiet[substr($key,8)] = $value;
// 			if($key == 'saturdayGrocery') break;
// 		}

// 		// $dayDiet = new DayDite;

		
// 		$dayDiet['sunday'] = json_encode($sundayDiet);
// 		$dayDiet['monday'] = json_encode($mondayDiet);
// 		$dayDiet['tuesday']= json_encode($tuesdayDiet);
// 		$dayDiet['wednesday'] = json_encode($wednedayDiet);
// 		$dayDiet['thursday'] = json_encode($thurdayDiet);
// 		$dayDiet['friday'] = json_encode($fridayDiet);
// 		// dd($dayDiet['friday'] );
// 		$dayDiet['saturday'] = json_encode($saturdayDiet);
// 		$dayDiet['diet_plan_id'] = $dietPlanId;
// 		// dd($dayDiet);
// 		$dayDiet['created_at'] = date('Y:m:d H:i:s');
// 		DB::table('day_dites')->insert($dayDiet);
//   	 	Session::flash('message','Diet plan create successfully');
// 		return redirect(route('diet.plan.list'))->with('success','Diet plan create successfully');
			
// 	}


public function createDietPlanSubmit(Request $request)
{

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }



  DB::insert("insert into dietplan (name,description) values (?,?)",array($request->input('diet'),$request->input('description')));

  $dietPlanId = DB::getPdo()->lastInsertId();

  $q = $request->input("mytextt");
// return $q;
  $sku = $request->input('breakfast');
 
  // $time = DB::select("select* from sunday where time_id = '$sku'");
  // return $time;
  // return $sku;
  // $sku = DB::select("select* from sunday where item = '$sku' ");
  if(!empty($sku))
  {
  // $time = $time[0]->pk_id;
  for($i=0; $i < count($q); $i++ )
{

    DB::insert("insert into sunday (time_id,item,recepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));

}
  }


//=============.........Lunch......===============//

    $s = $request->input('mytextt1');
  // return $s;
   
      $sku = $request->input('lunch');
      // return $sku;
      // $sku = DB::select("select* from sunday where item = '$sku' ");
      if(!empty($sku))
      {
      // $sku = $sku[0]->breakfast;
      for($i=0; $i < count($s); $i++ )
    {
    
        DB::insert("insert into sunday (time_id,item,recepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$s[$i],$s[++$i],$s[++$i],$dietPlanId));
    
    }
      }

//............==================snacks/..........==========//


$l = $request->input("mytextt2");
// return $q;
  $sku = $request->input('snacks');
  // return $sku;
  // $sku = DB::select("select* from sunday where item = '$sku' ");
  if(!empty($sku))
  {
  // $sku = $sku[0]->breakfast;
  for($i=0; $i < count($l); $i++ )
{

    DB::insert("insert into sunday (time_id,item,recepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$l[$i],$l[++$i],$l[++$i],$dietPlanId));

}
  }



$d = $request->input("mytextt3");
// return $q;
  $sku = $request->input('dinner');
  // return $sku;
  // $sku = DB::select("select* from sunday where item = '$sku' ");
  if(!empty($sku))
  {
  // $sku = $sku[0]->breakfast;
  for($i=0; $i < count($d); $i++ )
{

    DB::insert("insert into sunday (time_id,item,recepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$d[$i],$d[++$i],$d[++$i],$dietPlanId));

}
  }


//......................................Monday................................///

$q = $request->input("mytextt4");
// return $q;
  $sku = $request->input('breakfast');
  // return $sku;
  // $sku = DB::select("select* from sunday where item = '$sku' ");
  if(!empty($sku))
  {
  // $sku = $sku[0]->breakfast;
  for($i=0; $i < count($q); $i++ )
{

    DB::insert("insert into monday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));

}
  }


//=============.........Lunch......===============//

    $s = $request->input('mytextt5');
  // return $s;
   
      $sku = $request->input('lunch');
      // return $sku;
      // $sku = DB::select("select* from sunday where item = '$sku' ");
      if(!empty($sku))
      {
      // $sku = $sku[0]->breakfast;
      for($i=0; $i < count($s); $i++ )
    {
    
        DB::insert("insert into monday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$s[$i],$s[++$i],$s[++$i],$dietPlanId));
    
    }
      }

//............==================snacks/..........==========//


$l = $request->input("mytextt6");
// return $q;
  $sku = $request->input('snacks');
  // return $sku;
  // $sku = DB::select("select* from sunday where item = '$sku' ");
  if(!empty($sku))
  {
  // $sku = $sku[0]->breakfast;
  for($i=0; $i < count($l); $i++ )
{

    DB::insert("insert into monday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$l[$i],$l[++$i],$l[++$i],$dietPlanId));

}
  }



$d = $request->input("mytextt7");
// return $q;
  $sku = $request->input('dinner');
  // return $sku;
  // $sku = DB::select("select* from sunday where item = '$sku' ");
  if(!empty($sku))
  {
  // $sku = $sku[0]->breakfast;
  for($i=0; $i < count($d); $i++ )
{

    DB::insert("insert into monday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$d[$i],$d[++$i],$d[++$i],$dietPlanId));

}
  }

  //..............................tuesday................................................................//


  $q = $request->input("mytextt8");
  // return $q;
    $sku = $request->input('breakfast');
    // return $sku;
    // $sku = DB::select("select* from sunday where item = '$sku' ");
    if(!empty($sku))
    {
    // $sku = $sku[0]->breakfast;
    for($i=0; $i < count($q); $i++ )
  {
  
      DB::insert("insert into tuesday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
  
  }
    }
  
  
  //=============.........Lunch......===============//
  
      $s = $request->input('mytextt9');
    // return $s;
     
        $sku = $request->input('lunch');
        // return $sku;
        // $sku = DB::select("select* from sunday where item = '$sku' ");
        if(!empty($sku))
        {
        // $sku = $sku[0]->breakfast;
        for($i=0; $i < count($s); $i++ )
      {
      
          DB::insert("insert into tuesday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$s[$i],$s[++$i],$s[++$i],$dietPlanId));
      
      }
        }
  
  //............==================snacks/..........==========//
  
  
  $l = $request->input("mytextt10");
  // return $q;
    $sku = $request->input('snacks');
    // return $sku;
    // $sku = DB::select("select* from sunday where item = '$sku' ");
    if(!empty($sku))
    {
    // $sku = $sku[0]->breakfast;
    for($i=0; $i < count($l); $i++ )
  {
  
      DB::insert("insert into tuesday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$l[$i],$l[++$i],$l[++$i],$dietPlanId));
  
  }
    }
  
  
  
  $d = $request->input("mytextt11");
  // return $q;
    $sku = $request->input('dinner');
    // return $sku;
    // $sku = DB::select("select* from sunday where item = '$sku' ");
    if(!empty($sku))
    {
    // $sku = $sku[0]->breakfast;
    for($i=0; $i < count($d); $i++ )
  {
  
      DB::insert("insert into tuesday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$d[$i],$d[++$i],$d[++$i],$dietPlanId));
  
  }
    }
  
    //......============...............Wednesday................==========.....//


    $q = $request->input("mytextt12");
  // return $q;
    $sku = $request->input('breakfast');
    // return $sku;
    // $sku = DB::select("select* from sunday where item = '$sku' ");
    if(!empty($sku))
    {
    // $sku = $sku[0]->breakfast;
    for($i=0; $i < count($q); $i++ )
  {
  
      DB::insert("insert into wednesday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
  
  }
    }
  
  
  //=============.........Lunch......===============//
  
      $s = $request->input('mytextt13');
    // return $s;
     
        $sku = $request->input('lunch');
        // return $sku;
        // $sku = DB::select("select* from sunday where item = '$sku' ");
        if(!empty($sku))
        {
        // $sku = $sku[0]->breakfast;
        for($i=0; $i < count($s); $i++ )
      {
      
          DB::insert("insert into wednesday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$s[$i],$s[++$i],$s[++$i],$dietPlanId));
      
      }
        }
  
  //............==================snacks/..........==========//
  
  
  $l = $request->input("mytextt14");
  // return $q;
    $sku = $request->input('snacks');
    // return $sku;
    // $sku = DB::select("select* from sunday where item = '$sku' ");
    if(!empty($sku))
    {
    // $sku = $sku[0]->breakfast;
    for($i=0; $i < count($l); $i++ )
  {
  
      DB::insert("insert into wednesday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$l[$i],$l[++$i],$l[++$i],$dietPlanId));
  
  }
    }
  
  //.........dinner...............//
  
  $d = $request->input("mytextt15");
  // return $q;
    $sku = $request->input('dinner');
    // return $sku;
    // $sku = DB::select("select* from sunday where item = '$sku' ");
    if(!empty($sku))
    {
    // $sku = $sku[0]->breakfast;
    for($i=0; $i < count($d); $i++ )
  {
  
      DB::insert("insert into wednesday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$d[$i],$d[++$i],$d[++$i],$dietPlanId));
  
  }
    }
  
    //.................T H U R S D A Y...........................//


    $q = $request->input("thursday");
  // return $q;
    $sku = $request->input('breakfast');
    // return $sku;
    // $sku = DB::select("select* from sunday where item = '$sku' ");
    if(!empty($sku))
    {
    // $sku = $sku[0]->breakfast;
    for($i=0; $i < count($q); $i++ )
  {
  
      DB::insert("insert into thursday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
  
  }
    }
  
  
  //=============.........Lunch......===============//
  
      $s = $request->input('thursday1');
    // return $s;
     
        $sku = $request->input('lunch');
        // return $sku;
        // $sku = DB::select("select* from sunday where item = '$sku' ");
        if(!empty($sku))
        {
        // $sku = $sku[0]->breakfast;
        for($i=0; $i < count($s); $i++ )
      {
      
          DB::insert("insert into thursday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$s[$i],$s[++$i],$s[++$i],$dietPlanId));
      
      }
        }
  
  //............==================snacks/..........==========//
  
  
  $l = $request->input("thursday2");
  // return $q;
    $sku = $request->input('snacks');
    // return $sku;
    // $sku = DB::select("select* from sunday where item = '$sku' ");
    if(!empty($sku))
    {
    // $sku = $sku[0]->breakfast;
    for($i=0; $i < count($l); $i++ )
  {
  
      DB::insert("insert into thursday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$l[$i],$l[++$i],$l[++$i],$dietPlanId));
  
  }
    }
  
  //.........dinner...............//
  
  $d = $request->input("thursday3");
  // return $q;
    $sku = $request->input('dinner');
    // return $sku;
    // $sku = DB::select("select* from sunday where item = '$sku' ");
    if(!empty($sku))
    {
    // $sku = $sku[0]->breakfast;
    for($i=0; $i < count($d); $i++ )
  {
  
      DB::insert("insert into thursday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$d[$i],$d[++$i],$d[++$i],$dietPlanId));
  
  }
    }
  
////////////...................F R I D A Y............................///////////////////


$q = $request->input("friday");
// return $q;
  $sku = $request->input('breakfast');
  // $time = DB::select("select* from friday where time_id = '$sku'");
  
  if(count($q)>0)
  {
  // $sku = $sku[0]->breakfast;
  // $time = $time[0]->pk_id;
  for($i=0; $i < count($q); $i++ )
{  

    DB::insert("insert into friday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));

}
  }


//=============.........Lunch......===============//

    $s = $request->input('friday1');
  // return $s;
   
      $sku = $request->input('lunch');
      // return $sku;
      // $sku = DB::select("select* from sunday where item = '$sku' ");
      if(!empty($sku))
      {
      // $sku = $sku[0]->breakfast;
      for($i=0; $i < count($s); $i++ )
    {
    
        DB::insert("insert into friday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$s[$i],$s[++$i],$s[++$i],$dietPlanId));
    
    }
      }

//............==================snacks/..........==========//


$l = $request->input("friday2");
// return $q;
  $sku = $request->input('snacks');
  // return $sku;
  // $sku = DB::select("select* from sunday where item = '$sku' ");
  if(!empty($sku))
  {
  // $sku = $sku[0]->breakfast;
  for($i=0; $i < count($l); $i++ )
{

    DB::insert("insert into friday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$l[$i],$l[++$i],$l[++$i],$dietPlanId));

}
  }

//.........dinner...............//

$d = $request->input("friday3");
// return $q;
  $sku = $request->input('dinner');
  // return $sku;
  // $sku = DB::select("select* from sunday where item = '$sku' ");
  if(!empty($sku))
  {
  // $sku = $sku[0]->breakfast;
  for($i=0; $i < count($d); $i++ )
{

    DB::insert("insert into friday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$d[$i],$d[++$i],$d[++$i],$dietPlanId));

}
  }


  ///////////......=========........S A T U R D A Y...................///////////////


  $q = $request->input("saturday");
// return $q;
  $sku = $request->input('breakfast');
  // return $sku;
  // $sku = DB::select("select* from sunday where item = '$sku' ");
  if(!empty($sku))
  {
  // $sku = $sku[0]->breakfast;
  for($i=0; $i < count($q); $i++ )
{

    DB::insert("insert into saturday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));

}
  }


//=============.........Lunch......===============//

    $s = $request->input('saturday1');
  // return $s;
   
      $sku = $request->input('lunch');
      // return $sku;
      // $sku = DB::select("select* from sunday where item = '$sku' ");
      if(!empty($sku))
      {
      // $sku = $sku[0]->breakfast;
      for($i=0; $i < count($s); $i++ )
    {
    
        DB::insert("insert into saturday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$s[$i],$s[++$i],$s[++$i],$dietPlanId));
    
    }
      }

//............==================snacks/..........==========//


$l = $request->input("saturday2");
// return $q;
  $sku = $request->input('snacks');
  // return $sku;
  // $sku = DB::select("select* from sunday where item = '$sku' ");
  if(!empty($sku))
  {
  // $sku = $sku[0]->breakfast;
  for($i=0; $i < count($l); $i++ )
{

    DB::insert("insert into saturday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$l[$i],$l[++$i],$l[++$i],$dietPlanId));

}
  }

//.........dinner...............//

$d = $request->input("saturday3");
// return $q;
  $sku = $request->input('dinner');
  // return $sku;
  // $sku = DB::select("select* from sunday where item = '$sku' ");
  if(!empty($sku))
  {
  // $sku = $sku[0]->breakfast;
  for($i=0; $i < count($d); $i++ )
{

    DB::insert("insert into saturday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$d[$i],$d[++$i],$d[++$i],$dietPlanId));

}
  }
      $data = DB::select("select* from dietplan ");
  return view('admin.dietPlanList',compact('data'))->with('success','Diet plan create successfully');


}


//...................view diet plan...........................//

public function viewDietPlan($pk_id)
{
  $dietplan = DB::select("select* from dietplan where pk_id='$pk_id'");

  $sundaybreakfast = DB::select("select* from sunday where dietplan_id='$pk_id' and time_id='breakfast' ");
  $sundaylunch = DB::select("select* from sunday where dietplan_id='$pk_id'  and time_id='lunch' ");
  $sundaysnacks = DB::select("select* from sunday where dietplan_id='$pk_id' and time_id='snacks' ");
  $sundaydinner = DB::select("select* from sunday where dietplan_id='$pk_id' and time_id='dinner'  ");

  $mondaybreakfast = DB::select("select* from monday where dietplan_id='$pk_id' and time_id='breakfast' ");
  $mondaylunch = DB::select("select* from monday where dietplan_id='$pk_id' and time_id='lunch' ");
  $mondaysnacks = DB::select("select* from monday where dietplan_id='$pk_id' and time_id='snacks' ");
  $mondaydinner = DB::select("select* from monday where dietplan_id='$pk_id' and time_id='dinner'  ");
  
  $tuesdaybreakfast = DB::select("select* from tuesday where dietplan_id='$pk_id' and time_id='breakfast' ");
  $tuesdaylunch = DB::select("select* from tuesday where dietplan_id='$pk_id' and time_id='lunch' ");
  $tuesdaysnacks = DB::select("select* from tuesday where dietplan_id='$pk_id' and time_id='snacks' ");
  $tuesdaydinner = DB::select("select* from tuesday where dietplan_id='$pk_id' and time_id='dinner'  ");

  $wednesdaybreakfast = DB::select("select* from wednesday where dietplan_id='$pk_id' and time_id='breakfast'  ");
  $wednesdaylunch = DB::select("select* from wednesday where dietplan_id='$pk_id' and time_id='lunch' ");
  $wednesdaysnacks = DB::select("select* from wednesday where dietplan_id='$pk_id' and time_id='snacks' ");
  $wednesdaydinner = DB::select("select* from wednesday where dietplan_id='$pk_id' and time_id='dinner' ");

  $thursdaybreakfast = DB::select("select* from thursday where dietplan_id='$pk_id' and time_id='breakfast' ");
  $thursdaylunch = DB::select("select* from thursday where dietplan_id='$pk_id' and time_id='lunch' ");
  $thursdaysnacks = DB::select("select* from thursday where dietplan_id='$pk_id' and time_id='snacks' ");
  $thursdaydinner = DB::select("select* from thursday where dietplan_id='$pk_id' and time_id='dinner' ");

  $fridaybreakfast = DB::select("select* from friday where dietplan_id='$pk_id' and time_id='breakfast' ");
  $fridaylunch = DB::select("select* from friday where dietplan_id='$pk_id'and time_id='lunch' ");
  $fridaysnacks = DB::select("select* from friday where dietplan_id='$pk_id' and time_id='snacks' ");
  $fridaydinner = DB::select("select* from friday where dietplan_id='$pk_id' and time_id='dinner' ");

  $saturday = DB::select("select* from saturday where dietplan_id='$pk_id' and time_id='breakfast' ");
  $saturdaylunch = DB::select("select* from saturday where dietplan_id='$pk_id' and time_id='lunch' ");
  $saturdaysnacks = DB::select("select* from saturday where dietplan_id='$pk_id' and time_id='snacks' ");
  $saturdaydinner = DB::select("select* from saturday where dietplan_id='$pk_id' and time_id='dinner' ");

 
  return view('admin.view_diet_plan',compact('dietplan','sundaybreakfast','sundaylunch','sundaysnacks',
  'sundaydinner','mondaybreakfast','mondaylunch','mondaysnacks','mondaydinner','tuesdaybreakfast',
  'tuesdaylunch','tuesdaysnacks','tuesdaydinner','wednesdaybreakfast','wednesdaylunch','wednesdaysnacks',
  'wednesdaydinner','thursdaybreakfast','thursdaylunch','thursdaysnacks','thursdaydinner','fridaybreakfast',
  'fridaylunch','fridaysnacks','fridaydinner',
  'saturday','saturdaylunch','saturdaysnacks','saturdaydinner'));
  

  
}

//..............user request....................//
public function userRequest()
	{
// 		DB::enableQueryLog();
// 		$data = QuestionAnswer::orderBy('id','desc')->paginate(10);
// 		$query = DB::getQueryLog();
// dd($query);
		// dd($data);
	   $data = DB::select("select* from question_answer,client_details where question_answer.user_id=client_details.pk_id ");
		
		
		
		
		return view('admin.userRequestList')->with('data',$data);
	}

  public function veiwAnswer($id)
	{
// 		$data = QuestionAnswer::find($id);
// 		$data = $data->getAttributes();
		$deitPlan = DB::table('dietplan')->get();
		
		 $data = DB::select("select* from question_answer where id= '$id' ");
		
		$user_id= $data[0]->user_id;
		
		$user = DB::select("select* from client_details where pk_id= '$user_id' ");
		
		return view('admin.viewAnswer')->with('data',$data)->with('deitPlan',$deitPlan)->with('user',$user);
	}

//.............assign diet plan..............////

public function assignDietPlan(Request $request)
	{
		$data = $request->input();
		$user_id= $request->input('user_id');
			$userr = DB::select("select* from client_details where pk_id= '$user_id' ");
		$user=	$userr[0]->username;
		$name=	$userr[0]->fname;
		unset($data['_token']);
		$data['created_at'] = date('Y:m:d H:i:s');
		DB::table('assigned_diet_plan_to_user')->insert($data);
		
		
		
		
		 Mail::send('email_diet_plan', $data, function ($message) use ($name, $user)
        {

           
          $message->from('info@thefoodpharmacy.pk','The Food Pharmacy' );

            $message->to($user)->subject('Dear,' . $name . ' Diet Plan Assigned You.');

        });
		
		
		Session::flash('message','Diet plan assigned to user successfully');
		return redirect(route('user.request.list'))->with('success','Diet plan assigned to user successfully');
	}



public function diet_plan_history()
	{
	   
	    
		 $data = DB::select("select* from assigned_diet_plan_to_user  ");    
	    
// 	return $data;
		return view('admin.user_diet_plan_history',compact('data'));
	}



//............................PAYMENTS......................//

public function pendingPayment()
	{
	    
	     $data = DB::select("select* from bank_slips where status='pending' ");
// 		$data = DB::table('bank_slips')
// 		->join('users','users.id','=','bank_slips.user_id')
// 		->where('bank_slips.status','pending')
// 		->select('bank_slips.*','users.id as userID','users.username','users.email')
// 		->get();
		 return view('admin.paymentPending',compact('data'));

  }
  
  public function approvePayment($id)
	{
    
   
    // $data = DB::select("select* from bank_slips where id='$id' and status= 'pending' ");
    
    // return $data2;
    $slip = BankSlip::find($id);
    // $userid = DB::table('bank_slips')
    // ->join('client_details','client_details.pk_id','=','bank_slips.user_id')
    // ->where('bank_slips.status','pending')
		// ->select('bank_slips.*','client_details.pk_id as userID')
    // ->get();
    // $user_id= DB::select("select user_id from bank_slips where id='$id' ");
    // $user_id = DB::Table('bank_slips')->select('user_id')->where('id',$id)->get();  
    // $data = DB::select("select* from bank_slips where status='pending' and id='$id'")->pluck('user_id');
// return $slip;
    $dataa =DB::table('bank_slips')
    ->where('id', $id)
    ->first()
    ->user_id;
    // return $dataa;
    
    $slip->status = 'approved';
    $data = $slip->update();

    
    $sessions = DB::select("select* from bank_slips where id='$id' ");
    $session= $sessions[0]->amount;
    if($session=='20000')
    {
$value = "4";
// return "hello";
DB::update("update client_details set payment_status = '$value' where pk_id= '$dataa' ");



// $result[0]->{'name'}
 $email= $sessions[0]->{'email'};
$name= $sessions[0]->{'name'};
// return $email;


 Mail::send('email_payment_approved', $sessions, function ($message) use ($name, $email)
        {

           
          $message->from('info@thefoodpharmacy.pk','The Food Pharmacy' );

            $message->to($email)->subject('Dear ' . $name . ' Your payment approved');

        });
//  $email= $sessions[0]->email;
// $name= $sessions[0]->name;
//         Mail::send('email_payment_approved', $data, function ($message) use ($name)
//         {

//           $message->from('info@thefoodpharmacy.pk','The Food Pharmacy' );
//             $message->to($email)->subject('Your payment approved');
//         });
    }
    elseif($session=='25000')
    {
$value == "5";
// return "hello3";
DB::update("update client_details set payment_status = '$value' where pk_id= '$dataa' ");
 $email= $sessions[0]->email;
$name= $sessions[0]->name;
  Mail::send('email_payment_approved', $sessions, function ($message) use ($name, $email)
        {

           
          $message->from('info@thefoodpharmacy.pk','The Food Pharmacy' );

            $message->to($email)->subject('Dear ' . $name . ' Your payment approved');

        });
    }
    else
 
$value = "1";
DB::update("update client_details set payment_status = '$value' where pk_id= '$dataa' ");



 $email= $sessions[0]->email;
$name= $sessions[0]->name;
        Mail::send('email_payment_approved', $sessions, function ($message) use ($name, $email)
        {

           
          $message->from('info@thefoodpharmacy.pk','The Food Pharmacy' );

            $message->to($email)->subject('Dear ' . $name . ' Your payment approved');

        });

 
   	return redirect()->back()->with('success','Slip Approved Successfully');
	
	}

  public function rejectPayment($id)
	{
		$slip = BankSlip::find($id);
		$slip->status = 'rejected';
		$data = $slip->update();
		if($data)
		{
		     $sessions = DB::select("select* from bank_slips where id='$id' ");

 $email= $sessions[0]->{'email'};
$name= $sessions[0]->{'name'};
// return $email;


 Mail::send('email_payment_reject', $sessions, function ($message) use ($name, $email)
        {

           
          $message->from('info@thefoodpharmacy.pk','The Food Pharmacy' );

            $message->to($email)->subject('Sorry, ' . $name . ' Your payment Rejected');

        });
		    
		    
		    
		    
		    
		    
			return redirect()->back()->with('success','Slip Rejected Successfully');
		}
	}

  public function rejectedPaymentList()
	{
    $data = DB::select("select* from bank_slips where status='rejected' ");
		// $data = DB::table('bank_slips')
		// ->join('users','users.id','=','bank_slips.user_id')
		// ->where('bank_slips.status','rejected')
		// ->select('bank_slips.*','users.id as userID','users.username','users.email')
		// ->get();
		 return view('admin.paymentRejected')->with('data',$data);
  }
  
  public function approvedPaymentList()
	{
	     $data = DB::select("select* from bank_slips where status='approved' ");
// 		$data = DB::table('bank_slips')
// 		->join('users','users.id','=','bank_slips.user_id')
// 		->where('bank_slips.status','approved')
// 		->select('bank_slips.*','users.id as userID','users.username','users.email')
// 		->get();
		 return view('admin.paymentApproved',compact('data'))->with('data',$data);

  }
  
  //======================= Vendor Mangment  ========================//////////

  public function vendor_payments_list_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

   
    $result = DB::select("select* from vendors,vendor_payments where  vendors.email = vendor_payments.vendor_id and vendor_payments.status = '0' and vendor_payments.payment > '0' ");
// return $result;
    return view('admin.vendor_payment',compact('result')); 
   }

   
   ////////........ Vendor Create Payment  ...............///////////////


   public function create_payment(Request $request) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

 $id = $request->input('email');
    $payment = $request->input('payment');
    $pp = $request->input('partial_payments');
  
$chk = $request->input('checkbox');


 if($request->input('checkbox'))
 {
    foreach($chk as $chks)
    {
        
 
       
    $payment1 = $payment[$chks] - $pp[$chks];
   DB::update("update vendor_payments set payment ='$payment1' where vendor_id='$id[$chks]'");
     //  DB::table('vendor_payments')->where(['vendor_id',$id[$chks]])->update(['payment' => '$payment1']);
         
     }
 }
 else{
     
     return Redirect::back()->withErrors('atleast you neeed to select one check');
 }
    return redirect()->back();
            
         }


// -================= vendor Reporting ===================//

public function vendor_reporting_list_view() {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

 
 $result = DB::select("select* from vendors, vendor_payments where vendors.email = vendor_payments.vendor_id ");

 

  return view('admin.vendor_reporting',compact('result')); 
 }



 public function recommendation_list() {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  $result = DB::select("select* from recommendation");

  return view('admin.recommendation_list',compact('result')); 
 }

 public function  recommendation_detail($pk_id) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  $result = DB::select("select* from recommendation where pk_id = ' $pk_id'");

  return view('admin.recommendation_detail',compact('result')); 
 }

 

 public function  delete_recommendation($pk_id) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  DB::delete("delete from recommendation where pk_id = '$pk_id'");

  return Redirect::back()->withErrors('Successfully Deleted');
 }

 public function  add_recommendation_view() {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  $result = DB::select("select* from recom_category "); 

  return view('admin.add_recommendation',compact('result')); 
 }


 public function add_recommendation(Request $request) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
 {
     return redirect('/admin');
 }
 

 
$category = urldecode($request->input('category'));

// return $category;
 

 $thumbnail = "";
 if ($request->hasFile('thumbnail')) {
     $image = $request->file('thumbnail');
     $uniqueFileName = uniqid() . $image->getClientOriginalName() ;
     $input['thumbnail'] = time().'.'.strtolower($image);
     $image->storeAs('public/images',$uniqueFileName);
     $thumbnail=$uniqueFileName;
 }
 $thumbnail2 = "";
 if ($request->hasFile('thumbnail2')) {
     $image = $request->file('thumbnail2');
     $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
     $input['thumbnail2'] = time().'.'.strtolower($image->getClientOriginalExtension());
     $image->storeAs('public/images',$uniqueFileName);
     $thumbnail2=$uniqueFileName;
 }

 $thumbnail3 = "";
 if ($request->hasFile('thumbnail3')) {
     $image = $request->file('thumbnail3');
     $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
     $input['thumbnail3'] = time().'.'.strtolower($image->getClientOriginalExtension());
    $image->storeAs('public/images',$uniqueFileName);
    
     $thumbnail3=$uniqueFileName;
 }
 

 
 DB::insert("insert into recommendation (recom_name,category,phone,address,rating,thumbnail,thumbnail2,thumbnail3,description,specification) values (?,?,?,?,?,?,?,?,?,?)",
 array($request->input('recom_name'),$category,$request->input('phone'),$request->input('address'),$request->input('rating'),$thumbnail,$thumbnail2,$thumbnail3,$request->input('description'),$request->input('specification')));
 
 return redirect('/admin/home/view/recommendation');

}



public function  edit_diet_plan_view($pk_id) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }


$dietplan = DB::select("select* from dietplan where pk_id='$pk_id'");

  $sundaybreakfast = DB::select("select* from sunday where dietplan_id='$pk_id' and time_id='breakfast' ");
  $sundaylunch = DB::select("select* from sunday where dietplan_id='$pk_id'  and time_id='lunch' ");
  $sundaysnacks = DB::select("select* from sunday where dietplan_id='$pk_id' and time_id='snacks' ");
  $sundaydinner = DB::select("select* from sunday where dietplan_id='$pk_id' and time_id='dinner'  ");

  $mondaybreakfast = DB::select("select* from monday where dietplan_id='$pk_id' and time_id='breakfast' ");
  $mondaylunch = DB::select("select* from monday where dietplan_id='$pk_id' and time_id='lunch' ");
  $mondaysnacks = DB::select("select* from monday where dietplan_id='$pk_id' and time_id='snacks' ");
  $mondaydinner = DB::select("select* from monday where dietplan_id='$pk_id' and time_id='dinner'  ");
  
  $tuesdaybreakfast = DB::select("select* from tuesday where dietplan_id='$pk_id' and time_id='breakfast' ");
  $tuesdaylunch = DB::select("select* from tuesday where dietplan_id='$pk_id' and time_id='lunch' ");
  $tuesdaysnacks = DB::select("select* from tuesday where dietplan_id='$pk_id' and time_id='snacks' ");
  $tuesdaydinner = DB::select("select* from tuesday where dietplan_id='$pk_id' and time_id='dinner'  ");

  $wednesdaybreakfast = DB::select("select* from wednesday where dietplan_id='$pk_id' and time_id='breakfast'  ");
  $wednesdaylunch = DB::select("select* from wednesday where dietplan_id='$pk_id' and time_id='lunch' ");
  $wednesdaysnacks = DB::select("select* from wednesday where dietplan_id='$pk_id' and time_id='snacks' ");
  $wednesdaydinner = DB::select("select* from wednesday where dietplan_id='$pk_id' and time_id='dinner' ");

  $thursdaybreakfast = DB::select("select* from thursday where dietplan_id='$pk_id' and time_id='breakfast' ");
  $thursdaylunch = DB::select("select* from thursday where dietplan_id='$pk_id' and time_id='lunch' ");
  $thursdaysnacks = DB::select("select* from thursday where dietplan_id='$pk_id' and time_id='snacks' ");
  $thursdaydinner = DB::select("select* from thursday where dietplan_id='$pk_id' and time_id='dinner' ");

  $fridaybreakfast = DB::select("select* from friday where dietplan_id='$pk_id' and time_id='breakfast' ");
  $fridaylunch = DB::select("select* from friday where dietplan_id='$pk_id'and time_id='lunch' ");
  $fridaysnacks = DB::select("select* from friday where dietplan_id='$pk_id' and time_id='snacks' ");
  $fridaydinner = DB::select("select* from friday where dietplan_id='$pk_id' and time_id='dinner' ");

  $saturday = DB::select("select* from saturday where dietplan_id='$pk_id' and time_id='breakfast' ");
  $saturdaylunch = DB::select("select* from saturday where dietplan_id='$pk_id' and time_id='lunch' ");
  $saturdaysnacks = DB::select("select* from saturday where dietplan_id='$pk_id' and time_id='snacks' ");
  $saturdaydinner = DB::select("select* from saturday where dietplan_id='$pk_id' and time_id='dinner' ");

 
  return view('admin.edit_diet_plan',compact('dietplan','sundaybreakfast','sundaylunch','sundaysnacks',
  'sundaydinner','mondaybreakfast','mondaylunch','mondaysnacks','mondaydinner','tuesdaybreakfast',
  'tuesdaylunch','tuesdaysnacks','tuesdaydinner','wednesdaybreakfast','wednesdaylunch','wednesdaysnacks',
  'wednesdaydinner','thursdaybreakfast','thursdaylunch','thursdaysnacks','thursdaydinner','fridaybreakfast',
  'fridaylunch','fridaysnacks','fridaydinner',
  'saturday','saturdaylunch','saturdaysnacks','saturdaydinner'));
  



 }




public function  edit_diet_plan(Request $request,$pk_id) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

 $diet_name = $request->input('diet');
 $description = $request->input('description');
 

   
$dietplan = DB::select("select* from dietplan where pk_id='$pk_id'");
$dietPlanId=$dietplan[0]->pk_id;

  $sku = $request->input('breakfast');
 

 if($request->input('mytextt'))
  {
       $q = $request->input('mytextt');
         DB::delete("delete from sunday where dietplan_id = '$pk_id' and time_id='breakfast'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into sunday (time_id,item,recepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));

  }

  
  }


 $sku = $request->input('lunch');
 if($request->input('mytextt1'))
  { $q = $request->input('mytextt1');
         DB::delete("delete from sunday where dietplan_id = '$pk_id' and time_id='lunch'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into sunday (time_id,item,recepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('snacks');
 if($request->input('mytextt2'))
  { $q = $request->input('mytextt2');
         DB::delete("delete from sunday where dietplan_id = '$pk_id' and time_id='snacks'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into sunday (time_id,item,recepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}
 
 
 $sku = $request->input('dinner');
 if($request->input('mytextt3'))
  { $q = $request->input('mytextt3');
         DB::delete("delete from sunday where dietplan_id = '$pk_id' and time_id='dinner'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into sunday (time_id,item,recepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}




 $sku = $request->input('breakfast');
 if($request->input('mytextt4'))
  { $q = $request->input('mytextt4');
         DB::delete("delete from monday where dietplan_id = '$pk_id' and time_id='breakfast'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into monday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}



$sku = $request->input('lunch');
 if($request->input('mytextt5'))
  { $q = $request->input('mytextt5');
         DB::delete("delete from monday where dietplan_id = '$pk_id' and time_id='lunch'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into monday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('snacks');
 if($request->input('mytextt6'))
  { $q = $request->input('mytextt6');
         DB::delete("delete from monday where dietplan_id = '$pk_id' and time_id='snacks'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into monday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('dinner');
 if($request->input('mytextt7'))
  { $q = $request->input('mytextt7');
         DB::delete("delete from monday where dietplan_id = '$pk_id' and time_id='dinner'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into monday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('breakfast');
 if($request->input('mytextt8'))
  { $q = $request->input('mytextt8');
         DB::delete("delete from tuesday where dietplan_id = '$pk_id' and time_id='breakfast'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into tuesday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('lunch');
 if($request->input('mytextt9'))
  { $q = $request->input('mytextt9');
         DB::delete("delete from tuesday where dietplan_id = '$pk_id' and time_id='lunch'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into tuesday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('snacks');
 if($request->input('mytextt10'))
  { $q = $request->input('mytextt10');
         DB::delete("delete from tuesday where dietplan_id = '$pk_id' and time_id='snacks'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into tuesday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('dinner');
 if($request->input('mytextt11'))
  { $q = $request->input('mytextt11');
         DB::delete("delete from tuesday where dietplan_id = '$pk_id' and time_id='dinner'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into tuesday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('breakfast');
 if($request->input('mytextt12'))
  { $q = $request->input('mytextt12');
         DB::delete("delete from wednesday where dietplan_id = '$pk_id' and time_id='breakfast'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into wednesday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('lunch');
 if($request->input('mytextt13'))
  { $q = $request->input('mytextt13');
         DB::delete("delete from wednesday where dietplan_id = '$pk_id' and time_id='lunch'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into wednesday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('snacks');
 if($request->input('mytextt14'))
  { $q = $request->input('mytextt14');
         DB::delete("delete from wednesday where dietplan_id = '$pk_id' and time_id='snacks'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into wednesday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}



$sku = $request->input('dinner');
 if($request->input('mytextt15'))
  { $q = $request->input('mytextt15');
         DB::delete("delete from wednesday where dietplan_id = '$pk_id' and time_id='dinner'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into wednesday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('breakfast');
 if($request->input('thursday'))
  { $q = $request->input('thursday');
         DB::delete("delete from thursday where dietplan_id = '$pk_id' and time_id='breakfast'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into thursday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}



$sku = $request->input('lunch');
 if($request->input('thursday1'))
  { $q = $request->input('thursday1');
         DB::delete("delete from thursday where dietplan_id = '$pk_id' and time_id='lunch'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into thursday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('snacks');
 if($request->input('thursday2'))
  { $q = $request->input('thursday2');
         DB::delete("delete from thursday where dietplan_id = '$pk_id' and time_id='snacks'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into thursday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('dinner');
 if($request->input('thursday3'))
  { $q = $request->input('thursday3');
         DB::delete("delete from thursday where dietplan_id = '$pk_id' and time_id='dinner'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into thursday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('breakfast');
 if($request->input('friday'))
  { $q = $request->input('friday');
         DB::delete("delete from friday where dietplan_id = '$pk_id' and time_id='breakfast'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into friday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('lunch');
 if($request->input('friday1'))
  { $q = $request->input('friday1');
         DB::delete("delete from friday where dietplan_id = '$pk_id' and time_id='lunch'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into friday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('snacks');
 if($request->input('friday2'))
  { $q = $request->input('friday2');
         DB::delete("delete from friday where dietplan_id = '$pk_id' and time_id='snacks'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into friday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}

$sku = $request->input('dinner');
 if($request->input('friday3'))
  { $q = $request->input('friday3');
         DB::delete("delete from friday where dietplan_id = '$pk_id' and time_id='dinner'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into friday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('breakfast');
 if($request->input('saturday'))
  { $q = $request->input('saturday');
         DB::delete("delete from saturday where dietplan_id = '$pk_id' and time_id='breakfast'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into saturday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('lunch');
 if($request->input('saturday1'))
  { $q = $request->input('saturday1');
         DB::delete("delete from saturday where dietplan_id = '$pk_id' and time_id='lunch'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into saturday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('snacks');
 if($request->input('saturday2'))
  { $q = $request->input('saturday2');
         DB::delete("delete from saturday where dietplan_id = '$pk_id' and time_id='snacks'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into saturday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}


$sku = $request->input('dinner');
 if($request->input('saturday3'))
  { $q = $request->input('saturday3');
         DB::delete("delete from saturday where dietplan_id = '$pk_id' and time_id='dinner'");
  
    for($i=0; $i < count($q); $i++ )
  {
         DB::insert("insert into saturday (time_id,item,reciepe,grocery,dietplan_id) values (?,?,?,?,?)",array($sku,$q[$i],$q[++$i],$q[++$i],$dietPlanId));
 }}







  DB::table('dietplan')->where('pk_id', $pk_id)->update(['name' =>$request->input('diet'),'description' =>$request->input('description')]);

  return redirect('diet-plan-list');
  



 }







public function  edit_recommendation_view($pk_id) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
// return "hel";

$result1 = DB::select("select* from recom_category  ");
  $result = DB::select("select* from recommendation where pk_id= '$pk_id' ");

  return view('admin.edit_recommendation_view',compact('result','result1')); 
 }


 public function edit_recommendation($pk_id, Request $request) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
  

  
  $result = DB::select("select * from recommendation where pk_id = '$pk_id'"); 
  
    $category = urldecode($request->input('category'));
   
      
//  return $category ;
  

  //  $product_type = $request->input('ProductType');
  
     

  $thumbnail = $result[0]->thumbnail;
  if ($request->hasFile('file')) {
      $image = $request->file('file');
      $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
      $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
      $destinationPath =public_path('/storage/images');
     $image->storeAs('public/images',$uniqueFileName);
      $thumbnail=$uniqueFileName;
  }
  $thumbnail2 = $result[0]->thumbnail2;
  if ($request->hasFile('images2')) {
      $image = $request->file('images2');
      $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
      $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
      $destinationPath =public_path('/storage/images');
    $image->storeAs('public/images',$uniqueFileName);
      $thumbnail2=$uniqueFileName;
  }

  $thumbnail3 = $result[0]->thumbnail3;
  if ($request->hasFile('images3')) {
      $image = $request->file('images3');
      $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
      $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
      $destinationPath =public_path('/storage/images');
  $image->storeAs('public/images',$uniqueFileName);
      $thumbnail3=$uniqueFileName;
  }


 DB::table('recommendation')->where('pk_id', $pk_id)->update(['recom_name' =>$request->input('recom_name'),'phone' =>$request->input('phone'),'address' =>$request->input('address'),'rating' =>$request->input('rating'),'category' =>$category,'description' =>$request->input('description'),'specification' =>$request->input('specification'),'thumbnail' =>$thumbnail,'thumbnail2' =>$thumbnail2,'thumbnail3' =>$thumbnail3]);

 return redirect('/admin/home/view/recommendation');
}


//=================== RECOM CATEGORIES ======================================//




public function recom_category_list() {
  if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
      
    $result = DB::select("select * from recom_category "); 

    return view('admin.recom_category_list',compact('result')); 
      
   }

public function recom_category_add_view() {
  if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
      
  
    return view('admin.recom_category_add_view'); 
      
   }
//...............................add main category

   public function recom_category_add(Request $request) {
    if(!(session()->has('type') && session()->get('type')=='admin'))
   {
       return redirect('/admin');
   }
   
   
      $cat = $request->input('category');
      $result = DB::select( DB::raw("SELECT * FROM recom_category WHERE category = :value"), array(
  'value' => $cat,
));
       if(count($result)>0)
       {
            return Redirect::back()->withErrors('Category already Exist');
           
       }
       else
       
 {
     
   
  
 
         DB::insert("insert into recom_category (category) values (?)",array($request->input('category')));
         return redirect('/admin/home/add/recommendation/category/view')->withErrors('Category Added');   
        }
  }



// ........................... Edit REcom Categorie ..........................//


public function recom_category_edit_view($pk_id) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $result = DB::select("select* from recom_category where pk_id = '$pk_id'");
 
    return view('admin.recom_category_edit_view',compact('result'));

}

//........................edit main category

public function recom_category_edit(Request $request, $pk_id) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    
          $cat = $request->input('category');
        $result = DB::select("select* from recom_category where category = '$cat' ");
        if(count($result)>0)
        {
             return Redirect::back()->withErrors('Category already Exist');
            
        }
        else
        
  {
    

    $main_category =$request->input('category');
    // return $main_category;

    DB::table('recom_category')->where('pk_id', $pk_id)->update(['category' =>$main_category]);
    return redirect('/admin/home/view/recommendation/category/list');

}
}


public function delete_recom_category($pk_id) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  DB::delete("delete from recom_category where pk_id = '$pk_id'");
  

  return redirect()->back(); 
 }
 
 
 public function view_blog_list() {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
 $result = DB::select("select* from blogs  ");
  return view('admin.blog_list',compact('result'));
 }

public function add_blog_view() {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  return view('admin.add_blog');
 }
 
 
 
 
 
 public function add_blog(Request $request) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
$name = urldecode($request->input('name'));
$description = $request->input('body');
$post_by= "admin";
// return $category;
 

  $thumbnail = "";
 if ($request->hasFile('file1')) {
     $image = $request->file('file1');
     $uniqueFileName = uniqid() . $image->getClientOriginalName() ;
     $input['file1'] = time().'.'.strtolower($image);
     $image->storeAs('public/images',$uniqueFileName);
     $thumbnail=$uniqueFileName;
 }
 $thumbnail2 = "";
 if ($request->hasFile('file2')) {
     $image = $request->file('file2');
     $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
     $input['file2'] = time().'.'.strtolower($image->getClientOriginalExtension());
     $image->storeAs('public/images',$uniqueFileName);
     $thumbnail2=$uniqueFileName;
 }


 

 
 DB::insert("insert into blogs (name,post_by,description,thumbnail,thumbnail2) values (?,?,?,?,?)",
 array($request->input('name'),$post_by,$request->input('body'),$thumbnail,$thumbnail2));
 
 return redirect('/admin/home/view/blogs/list');
 }
 
 
 
 public function edit_blog_view($id) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

      $result = DB::select("select*  from blogs where pk_id = '$id'");
      return view('admin.edit_blog',compact('result'));
 

  
}
 
 public function edit_blog($pk_id, Request $request) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
  $result = DB::select("select * from blogs where pk_id = '$pk_id'"); 

  $name = urldecode($request->input('name'));
$description = $request->input('body');
$post_by= "admin";


  $thumbnail = $result[0]->thumbnail;
  if ($request->hasFile('file')) {
      $image = $request->file('file');
      $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
      $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
      $destinationPath =public_path('/storage/images');
     $image->storeAs('public/images',$uniqueFileName);
      $thumbnail=$uniqueFileName;
  }
  $thumbnail2 = $result[0]->thumbnail2;
  if ($request->hasFile('images2')) {
      $image = $request->file('images2');
      $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
      $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
      $destinationPath =public_path('/storage/images');
    $image->storeAs('public/images',$uniqueFileName);
      $thumbnail2=$uniqueFileName;
  }

   DB::table('blogs')->where('pk_id', $pk_id)->update(['name' =>$request->input('name'),'thumbnail' =>$thumbnail,'thumbnail2' =>$thumbnail2,'description' =>$request->input('body')]);


 return redirect('/admin/home/view/blogs/list');
}
 
 

public function delete_blog($id) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
 DB::delete("delete from blogs where pk_id = '$id'");
    return redirect()->back(); 
 }

}
