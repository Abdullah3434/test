<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\vendor;
use Session;
use Response;
class VendorController extends Controller
{
   public function vendor_signup_view(){
    return view('vendor.signup');
   }

   public function create_vendor(Request $request)
   {
       $v = new vendor;

       $e = $request->input('email');
       $result = DB::select("select * from vendors where email = '$e' ");
if(count($result)>0){

   return Redirect::back()->withErrors('Email already exist');
}
else{
     if($request->input('password')== $request->input('confirm_password'))
{
               $v->fname = $request->input('fname');
               $fname = $request->input('fname');
               $v->lname = $request->input('lname');
               $v->store_name = $request->input('store_name');
               $v->phone = $request->input('phone');
               $phone = $request->input('phone');
               $v->country = $request->input('country');
               $v->state = $request->input('state');
               $v->city = $request->input('city');
               $v->email = $request->input('email');
               $email = $request->input('email');
               $v->password = md5($request->input('password'));
           
               $v->address = $request->input('address');
               $v->cnic = $request->input('cnic');
           
               $v->bank_title = $request->input('bank_title');
               $v->bank_name = $request->input('bank_name');
           
               $v->account_number = $request->input('bank_number');
               $v->bank_code = $request->input('bank_code');
                   $v->zip_code = $request->input('zip_code');
                   $v->NTN = $request->input('ntn');
                   $v->STN = $request->input('stn');
                   $v->dealing_person = $request->input('dealing_person');
                   $v->d_p_phone = $request->input('d_p_phone');
           
               $thumbnail = "";
               if ($request->hasFile('file')) {
                   $image = $request->file('file');
                   $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
                   $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
                   $image->storeAs('public/images',$uniqueFileName);
                   $thumbnail=$uniqueFileName;
               }
            
               $v->cheque_copy = $thumbnail;
                 $v->vendor_status = 2;
               $v->save();
               
               $data = array(
           'customer_name' =>$fname,
           'customer_username'=> $email,
           'customer_atype'=> $phone,
           
           
       );
    //    Mail::send('confirm_user', $data, function ($message) use($email) {
              
    //        $message->from('info@fashionfactory.world','FASHION FACTORY' );
          
    //        $message->to('info@fashionfactory.world')->subject('A new Vendor has been signup');
   
    //    });
               return redirect('/vendor/login')->with('message', 'Email send to admin for verification');
           }
                  
else{

   return Redirect::back()->withErrors('Password Does Not Match');
}
}}

public function vendor_login_view()
{

    if((session()->has('username') && session()->get('type')=='vendor'))
    {
        return redirect('/vendor/home');
    }elseif((session()->has('username') && session()->get('type')=='admin'))
    {
        return redirect('/admin/home');
    }elseif((session()->has('username') && session()->get('type')=='client'))
    {
        return redirect('/');
    }
    else{
      return view('vendor.login');
    }
}

public function vendor_login(Request $request)
{
   
    $this->validate($request,['username' => 'required','password'=> 'required']);
    $password= md5($request->input('password'));
    $username= $request->input('username');

     $result = vendor::where('email',$username)
              ->Where('password',  $password)
              ->get();
             
    if(count($result)>0){
        if($result[0]->vendor_status == 0){
        $request->session()->put('username',$username);
         session()->put('fname',$result[0]->fname);
          session()->put('lname',$result[0]->lname);
          
          session()->put('id',$result[0]->id);
        $request->session()->put('type','vendor');

        
   
        $v_id= session()->get('username');

$result = DB::select("select * from detail_table where vendor_id = '$v_id' and (v_order_status = '0' or v_order_status = '1')");
   $c = count($result);
      $result1 = DB::select("select * from detail_table where vendor_id = '$v_id' and v_order_status = '4'");
   $com = count($result1);
   
       $result4 = DB::select("select* from product where vendor_id = '$v_id'");
     $p = count($result4);
  
          return view('vendor.index',compact('result','c','com','p'));
        }
        elseif($result[0]->vendor_status == 2){
               return Redirect::back()->withErrors('Please wait for Admin approval');
        }
        else{
             return Redirect::back()->withErrors('User has been blocked');
        }
    }
  
    else
    {
        return Redirect::back()->withErrors('Username or Password is incorrect');
    }
}


public function logout()
{
    session()->flush();
    return redirect('/vendor/login');
}

public function home()
{
    
    if((session()->has('username') && session()->get('type')=='vendor'))
    {
        $username = session()->get('username');

        $result4 = DB::select("select* from product where username='$username' ");
        $p = count($result4);


        return view('vendor.index','p');
    }
}

//====================Category Managment==========================//

public function main_category_list_view() {
                                 
    $username = session()->get('username');

     $result = DB::select("select* from main_category where username  = '$username'");
  
     return view('vendor.category_list',compact('result'));

}


public function add_main_category_view() {
    if(!(session()->has('type') && session()->get('type')=='vendor'))
          {
              return redirect('/vendor/login');
          }
          
          
      
    return view('vendor.add_category'); 
      
   }



public function add_main_category(Request $request) {
    if(!(session()->has('type') && session()->get('type')=='vendor'))
          {
              return redirect('/vendor/login');
          }
          $cat = $request->input('mainCategory');
        $result = DB::select("select* from main_category where main_category = '$cat' ");
        if(count($result)>0)
        {
             return Redirect::back()->withErrors('Category already Exist');
            
        }
        else
        
  {
          $username = session()->get('username');
  
          DB::insert("insert into main_category (main_category,username) values (?,?)",array($request->input('mainCategory'),$username));
          return redirect('/vendor/home/view/main/category');   
         }
     }


     public function edit_main_category_view($sku) {
        if(!(session()->has('type') && session()->get('type')=='vendor'))
               {
                   return redirect('/vendor/login');
               }
     
         $result = DB::select("select* from main_category where SKU = '$sku'");
      
         return view('vendor.edit_main_category',compact('result'));
     
     }
     

     public function edit_main_category(Request $request, $sku) {
        if(!(session()->has('type') && session()->get('type')=='vendor'))
              {
                  return redirect('/vendor/login');
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
        return redirect('/vendor/home/view/main/category');
    
    }
    }
    

     public function delete_main_category($id) {

        if(!(session()->has('type') && session()->get('type')=='vendor'))
               {
                   return redirect('/vendor/login');
               }
     
         DB::delete("delete from main_category where SKU = '$id'");
         
       
         return redirect()->back(); 
        }
        
        //////////=========Sub Category==================////////

        public function sub_category_list_view() {
            if(!(session()->has('type') && session()->get('type')=='vendor'))
                 {
                     return redirect('/vendor/login');
                 }
        $username = session()->get('username');
               $result = DB::select("select* from sub_category where username  = '$username'");
            
               return view('vendor.sub_category_list',compact('result'));
       
       }

       public function add_sub_category_view() {
        if(!(session()->has('type') && session()->get('type')=='vendor'))
             {
                 return redirect('/vendor/login');
             }
             $username = session()->get('username');
               $result = DB::select("select* from main_category  where username  = '$username'");
               return view('vendor.add_sub_category',compact('result'));        
              }
              


              public function add_sub_category(Request $request) {
                if(!(session()->has('type') && session()->get('type')=='vendor'))
                  {
                      return redirect('/vendor/login');
                  }
                  $category = $request->input('mainCategory');
                   
                       $cat = $request->input('subCategory');
                    $result = DB::select( DB::raw("SELECT * FROM sub_category WHERE sub_category = :value and main_category= :value2"), array(
           'value' => $cat,
           'value2' => $category,
         ));
                if(count($result)>0)
                {
                     return Redirect::back()->withErrors('Subcategory already Exist');
                    
                }
                else
                
          {
         $username = session()->get('username');
                   $category = $request->input('mainCategory');
                  
                          DB::insert("insert into sub_category (main_category,sub_category,username) values (?,?,?)",array($category,$request->input('subCategory'),$username));
                          return redirect('/vendor/home/view/sub/category'); 
                         }
                       }
                       
               //=================edit sub catgoey==============//
               
               public function edit_sub_category_view($sku) {
                if(!(session()->has('type') && session()->get('type')=='vendor'))
                       {
                           return redirect('/vendor/login');
                       }
             
                 $result = DB::select("select* from main_category");
             
                 $result1 = DB::select("select* from sub_category where SKU = '$sku'");
              
                 return view('vendor.edit_sub_category',compact('result','result1'));
             
             }
             
             public function edit_sub_category(Request $request, $sku) {
                if(!(session()->has('type') && session()->get('type')=='vendor'))
                       {
                           return redirect('/vendor/login');
                       }
                       
                                      $cat = $request->input('subCategory');
                     $result = DB::select("select* from sub_category where sub_category = '$cat' ");
                     if(count($result)>0)
                     {
                          return Redirect::back()->withErrors('Subcategory already Exist');
                         
                     }
                     else
                     
               {
             
                 $main_category =$request->input('mainCategory');
                 $sub_category =$request->input('subCategory');
             
                 DB::table('sub_category')->where('SKU', $sku)->update(['main_category' =>$main_category,'sub_category' =>$sub_category]);
                 return redirect('/vendor/home/view/sub/category');
             
             }
             
             }

             public function delete_sub_category($id) {

                if(!(session()->has('type') && session()->get('type')=='vendor'))
                        {
                            return redirect('/vendor/login');
                        }
              
                  DB::delete("delete from sub_category where SKU = '$id'");
                  
                
                  return redirect()->back(); 
                 }

                 //=====================brand managment===============//


                 public function brand_list_view() {
                    if(!(session()->has('type') && session()->get('type')=='vendor'))
               {
                return redirect('/vendor/login');
               }
               $username = session()->get('username');
           
                           $result = DB::select("select* from brand where username= '$username' ");
                        
                           return view('vendor.brand_list',compact('result'));
                 
           }


                 public function add_brand_view() {
                    if(!(session()->has('type') && session()->get('type')=='vendor'))
                  {
                    return redirect('/vendor/login');
                  }
                    
                      return view('vendor.add_brand_view'); 
                        
                     }  


                     public function add_brand(Request $request) {
                        if(!(session()->has('type') && session()->get('type')=='vendor'))
                   {
                    return redirect('/vendor/login');
                   }
                          $cat = $request->input('brandname');
                       $result = DB::select("select* from brand where brand_name = '$cat' ");
                       if(count($result)>0)
                       {
                            return Redirect::back()->withErrors('Brand already Exist');
                           
                       }
                       else
                       
                 {
                
                  
                       $username = session()->get('username');
                       DB::insert("insert into brand (brand_name,username) values (?,?)",array($request->input('brandname'),$username));
                       return redirect('/vendor/home/view/brand');     
                      }
                      }
               
               //;;;;;;;;;edir brand.................//

               public function edit_brand_view($sku) {
                if(!(session()->has('type') && session()->get('type')=='vendor'))
                  {
                    return redirect('/vendor/login');
                  }
              
                  $result = DB::select("select* from brand where SKU = '$sku'");
               
                  return view('vendor.edit_brand',compact('result'));
              
              }
              
              public function edit_brand(Request $request, $sku) {
            
                if(!(session()->has('type') && session()->get('type')=='vendor'))
                {
                  return redirect('/vendor/login');
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
                  return redirect('/vendor/home/view/brand');
              
              }
              }

              public function delete_brand($id) {

             
                if(!(session()->has('type') && session()->get('type')=='vendor'))
                {
                  return redirect('/vendor/login');
                }
            
                DB::delete("delete from brand where SKU = '$id'");
                
              
                return redirect()->back(); 
               }


//====================Product Managgment======================//

public function product_list_view() {
    if(!(session()->has('type') && session()->get('type')=='vendor'))
      {
          return redirect('/vendor/login');
         
      }
      $v_id = session()->get('username');
      $result = DB::select("select* from product where vendor_id= '$v_id' and (v_product_status = '1' or v_product_status = '2')");
    
      return view('vendor.product_list',compact('result')); 
     }

//.............add product.................///

public function add_product_view() {
    if(!(session()->has('type') && session()->get('type')=='vendor'))
      {
          return redirect('/vendor/login');
      }
      $vendor = session()->get('username');
    //   return $vendor;
  
    //   $result = DB::select("select* from product_type where product_type IS NOT NULL and username = 'admin'");
      $result2 = DB::select("select* from main_category where username = '$vendor'");
     
      $result1 = DB::select("select* from brand where username = '$vendor'");
  
      $result3 = DB::select("select* from sub_category where sub_category IS NOT NULL and username = '$vendor'");
    //   return $result3;
      return view('vendor.add_product',compact('result2','result3','result1')); 
     }


     public function add_product(Request $request) {
        if(!(session()->has('type') && session()->get('type')=='vendor'))
       {
           return redirect('/vendor/login');
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


$a =  $request->input('subCategory');
$sub_category = DB::select("select* from sub_category where SKU = '$a' ");
if(count($sub_category)>0)
{
$sub_category = $sub_category[0]->sub_category;
}
else
{
$sub_category = "";
}

// $product_type = $request->input('productType');

       $final_size="";
     
   
       $thumbnail = "";
       if ($request->hasFile('file')) {
           $image = $request->file('file');
           $uniqueFileName = uniqid() . $image->getClientOriginalName() ;
           $input['file'] = time().'.'.strtolower($image);
           $image->storeAs('public/images',$uniqueFileName);
           $thumbnail=$uniqueFileName;
       }


    //    $thumbnail = "";
    //    if ($request->hasFile('file')) {
    //        $image = $request->file('file');
    //        $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
    //        $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
    //        $image->storeAs('public/images',$uniqueFileName);
    //        $thumbnail=$uniqueFileName;
    //    }
       $thumbnail2 = "";
       if ($request->hasFile('images2')) {
           $image = $request->file('images2');
           $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
           $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
           $image->storeAs('public/images',$uniqueFileName);
           $thumbnail2=$uniqueFileName;
       }
   
       $thumbnail3 = "";
       if ($request->hasFile('images3')) {
           $image = $request->file('images3');
           $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
           $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
          $image->storeAs('public/images',$uniqueFileName);
          
           $thumbnail3=$uniqueFileName;
       }
       $thumbnail4 = "";
if ($request->hasFile('images4')) {
$image = $request->file('images4');
$uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
$input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
$image->storeAs('public/images',$uniqueFileName);

$thumbnail4=$uniqueFileName;
}
       $status = 0;
       if($request->input('status'))
       {
           $status = 1;
       }
       
    //    $color = $request->input('_color');
       
       $v_product_status = 1;
       $vendor_id = session()->get('username');
       $unit = $request->input('unit');

       $sku= $request->input('sku');
    //    return $sku;

$pname = $request->input('name');

       DB::insert("insert into product (SKU,name,price,main_category,sub_category,brand_name,thumbnail,thumbnail2,thumbnail3,thumbnail4,description,status,size,unit,quantity_on_hand,v_product_status,vendor_id) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($request->input('sku'),$request->input('name'),$request->input('price'),$main_category,$sub_category,$request->input('brandName'),$thumbnail,$thumbnail2,$thumbnail3,$thumbnail4,$request->input('description'),$status,$final_size,$unit,$request->input('quantity_on_hand'),$v_product_status,$vendor_id));
        $sku = $request->input('sku');
$sku = DB::select("select* from product where SKU = '$sku'");
if(count($sku)>0)
{
$sku = $sku[0]->pk_id;
for($i=0; $i < count($q); $i++ )
{

DB::insert("insert into size_detail (product_id,quantity,size) values (?,?,?)",array($sku,$q[$i],$q[++$i]));

}

}
        $result = DB::select("select* from vendors where email = '$vendor_id'");
        // return $result;
       $fname= $result[0]->fname;
       $username= $result[0]->email;
       $phone= $result[0]->phone;
       
$data = array(
    'customer_name' =>$fname,
    'customer_username'=> $username,
    'customer_atype'=> $phone,
    
    'product_name'=> $pname,
    'sku'=> $sku,
    
    
);

       return redirect('/vendor/home/view/product')->with('message', 'Product is added and Email send to admin for verification');
      
}

//...................ajax calling for sub category............//


public function sub(Request $request)
{
    $value = $request->Input('cat_id');
    

$subcategories = DB::select( DB::raw("SELECT * FROM sub_category WHERE main_category = :value"), array(
'value' => $value,
));

    
    return Response::json($subcategories);
        
        

}


//.........................edit product.................//

public function edit_product_view($pk_id) {
    if(!(session()->has('type') && session()->get('type')=='vendor'))
   {
       return redirect('/admin');
   }
   $username = session()->get('username');

   $result = DB::select("select* from product where pk_id = '$pk_id'");
 
   $result1 = DB::select("select* from main_category where username = '$username'");
   
       $main = $result[0]->main_category;
$sub = $result[0]->sub_category;


          $result2 = DB::select( DB::raw("SELECT * FROM sub_category WHERE main_category = :value and username= :value2"), array(
'value' => $main,
'value2' => $username,
));

  

// $result2 = DB::select("select* from sub_category where main_category = '$main' and  username = 'admin'");

// $result3 = DB::select("select* from product_type  where main_category = '$main' and sub_category = '$sub' and  username = 'admin'");


      $result4 = DB::select("select* from brand where username = '$username'");

   return view('vendor.edit_product',compact('result','result1','result2','result4'));

}



public function edit_product($pk_id, Request $request) {

    if(!(session()->has('type') && session()->get('type')=='vendor'))
    {
        return redirect('/vendor/login');
    }
    
           if($request->input('mytextt'))
{
     $q = $request->input('mytextt');
   
       DB::delete("delete from size_detail where product_id = '$pk_id'");

  for($i=0; $i < count($q); $i++ )
{
        DB::insert("insert into size_detail (product_id,quantity,size) values (?,?,?)",array($pk_id,$q[$i],$q[++$i]));

}


}
    
        $main_category = urldecode($request->input('mainCategory'));
    
  
$a =  $request->input('subCategory');

       $sub_category = DB::select( DB::raw("SELECT * FROM sub_category WHERE sub_category = :value"), array(
'value' => $a,
));


if(count($sub_category)>0)
{
     $sub_category = $sub_category[0]->sub_category;
    
}
else
{

  $sub_category = DB::select( DB::raw("SELECT * FROM sub_category WHERE SKU = :value"), array(
'value' => $a,
));

if(count($sub_category)>0)
{

$sub_category = $sub_category[0]->sub_category;
}
else
{
    $sub_category = "";
}
}


//  $product_type = $request->input('productType');
    
      $result = DB::select("select * from product where pk_id = '$pk_id'"); 
      $status = 0;
    if($request->input('status'))
    {
        $status = 1;
    }
    
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

    $v_product_status = 1;

   DB::table('product')->where('pk_id', $pk_id)->update(['sku' =>$request->input('sku'),'name' =>$request->input('name'),'price' =>$request->input('price'),'main_category' =>$main_category,'sub_category' =>$sub_category,'brand_name' =>$request->input('brandName'),'thumbnail' =>$thumbnail,'thumbnail2' =>$thumbnail2,'thumbnail3' =>$thumbnail3,'thumbnail4' =>$thumbnail4,'status' =>$status,'size' =>$final_size,'unit' =>$unit,'quantity_on_hand'=>$request->input('quantity_on_hand'),'v_product_status' =>$v_product_status,'description' =>$request->input('description')]);
    return redirect('/vendor/home/view/product');

}




public function delete_product($id) {

    if(!(session()->has('type') && session()->get('type')=='vendor'))
    {
        return redirect('/vendor/login');
    }

    DB::delete("delete from product where pk_id = '$id'");
    
  
    return redirect()->back(); 
   }

   public function product_detail_view($pk_id) {
    if(!(session()->has('type') && session()->get('type')=='vendor'))
    {
        return redirect('/vendor/login');
    }
    $result = DB::select("select* from product where pk_id='$pk_id'");
 
    return view('vendor.view_product',compact('result'));

}


////================ Reporting ========================//

public function reporting_by_product_list_view() {
    if(!(session()->has('type') && session()->get('type')=='vendor'))
    {
        return redirect('/vendor/login');
    }

      
  $v_id= session()->get('username');
 

    $result = DB::select("select* from product where vendor_id = '$v_id' and v_product_status = '2'");


    return view('vendor.by_product_list',compact('result'));
   
}


public function reporting_by_product($sku) {

    if(!(session()->has('type') && session()->get('type')=='vendor'))
    {
        return redirect('/vendor/login');
    }
    $total = 0 ;
    $result = DB::select("select* from detail_table where product_id = '$sku' and v_order_status = '4'");
 foreach($result as $results)
 {
     if($results->discount_price == 0)
     $total = $total + $results->price; 
     else
    $total = $results->discount_price;
 }
   
    return view('vendor.by_product_detail',compact('result','total'));
}



//.............   Reporting by Sale  ...................///

public function reporting_by_sale_list_view() {

    if(!(session()->has('type') && session()->get('type')=='vendor'))
    {
        return redirect('/vendor/login');
    }
$total = 0;
         
  $v_id= session()->get('username');
 
    $result = DB::select("select* from detail_table where vendor_id ='$v_id' and v_order_status = '4'");


    foreach( $result as  $results)
    {
        if($results->discount_price == "")
        $total = $total + $results->price;
        else
          $total = $total + $results->discount_price;
    }
    return view('vendor.by_sale_list',compact('result','total')); 
   }

   //.................... Reporting by Customer ............//

   public function customer_reporting_list_view() {

    if(!(session()->has('type') && session()->get('type')=='vendor'))
    {
        return redirect('/vendor/login');
    }
    $result = DB::select("select* from client_details");
 

    return view('vendor.by_customer',compact('result'));
   
}


public function customer_reporting($id) {

    if(!(session()->has('type') && session()->get('type')=='vendor'))
    {
        return redirect('/vendor/login');
    }
    $vendorid = session()->get('username');
   $sum = 0;
    $result = DB::select("select * from order_table,client_details where order_table.user_id = '$id' and order_table.user_id = client_details.pk_id and order_table.vendor_id='$vendorid'");
// return $result;
    if(count($result)>0)
    foreach($result as $results)
    {
        if($results->promo_amount == "")
$sum = $sum + $results->amount;
else
$sum = $sum + $results->promo_amount;
    }
    return view('vendor.by_customer_report_detail',compact('result','sum'));

}


/////==================================  ORDER MANAGMENT  =================//


public function active_order_view() {
    if(!(session()->has('type') && session()->get('type')=='vendor'))
      {
          return redirect('/vendor/login');
      }
  
  
   //$result = DB::select("select order_table.pk_id,order_table.fname,order_table.lname,address_table.fname,address_table.lname,order_table.amount,order_table.placed_at from order_table,address_table where order_table.shipment_address_id=address_table.pk_id or order_table.status = '0'");
  
  $v_id= session()->get('username');

   $result = DB::select("select * from detail_table where vendor_id = '$v_id' and v_order_status = '1' "); 
  
  
   return view('vendor.active_order',compact('result'));
  
  }

  public function active_order_detail_view($id,$o_id) {
    if(!(session()->has('type') && session()->get('type')=='vendor'))
      {
          return redirect('/vendor/login');
      }
  
  
      $result = DB::select("select * from product where pk_id = '$id'"); 
    
    //   $result1 = DB::select("select * from detail_table where order_id = '$o_id' and  product_id = '$id'");  
      
       $result1 = DB::select("select * from product,detail_table where  detail_table.order_id = '$o_id' and product_id = '$id' and detail_table.sku = product.sku "); 
       $result2 = DB::select("select * from order_table where pk_id = '$o_id'"); 
        //  return $result2;
      return view('vendor.view_active_order_detail',compact('result','result1','result2'));
 
     }


     public function cancel_order_list_view() {
        if(!(session()->has('type') && session()->get('type')=='vendor'))
          {
              return redirect('/vendor/login');
          }
      
      
       //$result = DB::select("select order_table.pk_id,order_table.fname,order_table.lname,address_table.fname,address_table.lname,order_table.amount,order_table.placed_at from order_table,address_table where order_table.shipment_address_id=address_table.pk_id or order_table.status = '0'");
      
      $v_id= session()->get('username');
     
       $result = DB::select("select * from detail_table where vendor_id = '$v_id' and v_order_status = '3'"); 
      
      
       return view('vendor.cancel_order',compact('result'));
      
      }


      public function ship_order_list_view() {
        if(!(session()->has('type') && session()->get('type')=='vendor'))
          {
              return redirect('/vendor/login');
          }
      
      
       //$result = DB::select("select order_table.pk_id,order_table.fname,order_table.lname,address_table.fname,address_table.lname,order_table.amount,order_table.placed_at from order_table,address_table where order_table.shipment_address_id=address_table.pk_id or order_table.status = '0'");
      
      $v_id= session()->get('username');
     
       $result = DB::select("select * from detail_table where vendor_id = '$v_id' and v_order_status = '2'"); 
      
      
       return view('vendor.ship_order',compact('result'));
      
      }



     
    
      public function return_order_list_view() {
        if(!(session()->has('type') && session()->get('type')=='vendor'))
          {
              return redirect('/vendor/login');
          }
      
      
       //$result = DB::select("select order_table.pk_id,order_table.fname,order_table.lname,address_table.fname,address_table.lname,order_table.amount,order_table.placed_at from order_table,address_table where order_table.shipment_address_id=address_table.pk_id or order_table.status = '0'");
      
      $v_id= session()->get('username');
     
       $result = DB::select("select * from detail_table where vendor_id = '$v_id' and v_order_status = '5'"); 
      
      
       return view('vendor.refunded_order',compact('result'));
      
      }
    
      public function complete_order_list_view() {
        if(!(session()->has('type') && session()->get('type')=='vendor'))
          {
              return redirect('/vendor/login');
          }
      
      
       //$result = DB::select("select order_table.pk_id,order_table.fname,order_table.lname,address_table.fname,address_table.lname,order_table.amount,order_table.placed_at from order_table,address_table where order_table.shipment_address_id=address_table.pk_id or order_table.status = '0'");
      
      $v_id= session()->get('username');
     
       $result = DB::select("select * from detail_table where vendor_id = '$v_id' and v_order_status = '4' "); 
      
      
       return view('vendor.completed_order',compact('result'));
      
      }


//................ update order status ....................//

     public function update_order_status(Request $request)
  {
    if(!(session()->has('type') && session()->get('type')=='vendor'))
   {
       return redirect('/vendor/login');
   }
   $id = $request->input('id');
   
   
     DB::table('detail_table')->where('pk_id', $request->input('id'))->update(['v_order_status' =>$request->input('status')]);
     
     
        $v_id= session()->get('username');
     $sum = 0;
     $status = 0;
     $s = 0;
     
       $total = 0;
      
      
      
       $order_result = DB::select("select* from detail_table where vendor_id ='$v_id' and v_order_status = '1' and pk_id = '$id' and v_payment_status = '0'");
 
       
       if(count($order_result)>0)
      {
          foreach($order_result as $results)
          {
          $pay_result = DB::select("select* from vendor_payments where vendor_id ='$v_id'");
         
         
            if(count($pay_result)>0)
      {
          
          $sum = $pay_result[0]->payment;
        
            if($results->discount_price == "")
                $sum =  $sum + ($results->quantity * $results->price);
            else
               $sum =  $sum + ($results->quantity * $results->discount_price);
           
                    $result_total = DB::select("select* from detail_table where vendor_id ='$v_id' and (v_order_status = '4' or v_order_status = '1')");  
                
                    
                                  if(count($result_total)>0)
                                     {
                                       foreach($result_total as $results)
                                            {
                                                  if($results->discount_price == "")
                                                       $total = $total + ($results->quantity * $results->price);
                                                  else
                                                        $total =  $total + ($results->quantity * $results->discount_price);
                                            }
                                     }
                                     
                                     
                                   
                                     
                           DB::table('vendor_payments')->where('vendor_id', $v_id)->update(['payment' =>$sum ,'status' =>$s,'total_earned' =>$total]);
              
          
      }
      
      else
      {
          
          
            if($results->discount_price == "")
                $sum =  $sum + ($results->quantity * $results->price);
            else
               $sum =  $sum + ($results->quantity * $results->discount_price);
             
                    $result_total = DB::select("select* from detail_table where vendor_id ='$v_id' and (v_order_status = '4' or v_order_status = '1')");  
                
                    
                                  if(count($result_total)>0)
                                     {
                                       foreach($result_total as $results)
                                            {
                                                  if($results->discount_price == "")
                                                       $total = $total + ($results->quantity * $results->price);
                                                  else
                                                        $total =  $total + ($results->quantity * $results->discount_price);
                                            }
                                     }
                                     
                                     
                                    
                                     
                                     
      
              DB::insert("insert into vendor_payments (vendor_id,payment,total_earned,status) values (?,?,?,?)",array($v_id,$sum,$total,$status));
              
          
      }
    
          }
          
         
      }
      
          DB::update("update detail_table set v_payment_status ='1' where vendor_id ='$v_id' and pk_id ='$id' and v_order_status = '1' ");
      
          
           
       return URL('/')."/vendor/home/view/active/orders";
  }
  



  public function ship_order_detail_view($id,$o_id) {
    if(!(session()->has('type') && session()->get('type')=='vendor'))
      {
          return redirect('/vendor/login');
      }
  
  
      $result = DB::select("select * from product where pk_id = '$id'"); 
    
      $result1 = DB::select("select * from detail_table where order_id = '$o_id' and  product_id = '$id'");  
         
      return view('vendor.complete_order_detail_view',compact('result','result1'));
 
     }


     public function complete_order_detail_view($id,$o_id) {
        if(!(session()->has('type') && session()->get('type')=='vendor'))
          {
              return redirect('/vendor/login');
          }
      
      
          $result = DB::select("select * from product where pk_id = '$id'"); 
        
          $result1 = DB::select("select * from detail_table,order_table where detail_table.order_id = '$o_id' and detail_table.order_id= order_table.pk_id and  product_id = '$id'");  
             
          return view('vendor.view_complete_order_detail',compact('result','result1'));
     
         }





// ========================= Discount  =============================////



public function view_discount() {

    if(!(session()->has('type') && session()->get('type')=='vendor'))
    {
        return redirect('/vendor/login');
    }
    $username = session()->get('username');
    $result = DB::select("select* from discount_table where username = '$username'");
  
    return view('vendor.discount_list',compact('result'));
  
  }


public function add_discount_view() {

    if(!(session()->has('type') && session()->get('type')=='vendor'))
          {
              return redirect('/vendor/login');
          }
          $username = session()->get('username');
    $result = DB::select("select* from product where vendor_id = '$username'");
    return view('vendor.add_discount',compact('result'));
  
  }

  public function add_discount(Request $request) {

    if(!(session()->has('type') && session()->get('type')=='vendor'))
    {
        return redirect('/vendor/login');
    }
    $username = session()->get('username');
    // return $username;
  
          DB::insert("insert into discount_table (sku,start_date,end_date,percentage,username) values (?,?,?,?,?)",array($request->input('sku'),$request->input('start_date'),$request->input('end_date'),$request->input('percentage'), $username));
          return redirect('/vendor/home/view/discount');     
         }


         public function earning_view() {
            if(!(session()->has('type') && session()->get('type')=='vendor'))
            {
                return redirect('/vendor/login');
            }
        
              
          $v_id= session()->get('username');
         
        
            $result = DB::select("select* from vendor_payments where vendor_id = '$v_id' and status = '0'");
        
        
            return view('vendor.earning',compact('result'));
           
        }






           public function reset_password_view() {
            
                 return view('vendor.reset_login');
             
             }


  public function vendor_reset_password(Request $request) {


                $username = $request->input('username');
                $result = DB::select("select* from vendors where email = '$username'");
                if(count($result)>0)
                {
                    $vcode = uniqid();
                    DB::insert("insert into vendor_reset_password (username,verification_code) values('$username','$vcode') ");
                    $customer_name= $result[0]->{'fname'};
                    $data = array(
                        'customer_name' =>$customer_name,
                        'customer_username'=> $username,
                        'customer_verification_code'=> $vcode,
                        
                        
                    );
                    Mail::send('vendor_email_reset_password', $data, function ($message) use($username) {
                        
                                $message->from('info@thefoodpharmacy.pk','The Food Pharmacy' );
                               
                                $message->to($username)->subject('Password Reset Confirmation Link');
                        
                            });
                    return redirect()->back()->with('message', 'A Password reset link sent to your email');
                } 
                else
                {
                    return Redirect::back()->withErrors('Username not found');
                }

                

                    
                 
                 }


public function verify_code($username,$code)
        {
            $result = DB::select("select* from vendor_reset_password where username= '$username' and verification_code= '$code' and TIMESTAMPDIFF(MINUTE,vendor_reset_password.created_at,NOW()) <=30 ");
            
            
            if(count($result)>0)
            {
                return view('vendor.change_password',compact('username'));
            }
            else
            return "The Verification code is expired";
        }

 public function password_change(Request $request,$username)
        {
            $password = md5($request->input('password'));
            DB::update("update vendors set password ='$password' where email='$username'");
            return redirect('vendor/login')->with('message', 'Your Password has been changed Successfully');
        }



}
