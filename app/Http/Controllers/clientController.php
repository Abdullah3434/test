<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\User;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Cart;
use Session;
use Response;
use Socialite;
use App\File;
use App\QuestionAnswer;

use Carbon\Carbon;
class clientController extends Controller
{
    public function home_view()
    {
        

        // if ((session()->has('username') && session()->get('type') == 'admin')) {
        //     return redirect('/admin/home');
        // } elseif ((session()->has('username') && session()->get('type') == 'vendor')) {
        //     return redirect('/vendor/home');
        // }

        $a = "1";
        $b = "2";
        $c = "0";
        $main = "Mobiles";

        date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
        $result = [];
        $result1 = [];
        $result2 = [];
        $result3 = [];
        $d = DB::select("select product.pk_id,product.thumbnail,product.name, product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and product.main_category = 'Mobiles' and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1' and (product.v_product_status = '2' or product.v_product_status = '0')");


        $result = DB::select("select* from product  where  status = '1' and (v_product_status = '2' or v_product_status = '0') LIMIT 10");

        $d1 = DB::select("select product.pk_id,product.thumbnail,product.name,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and product.main_category = 'Clothing'  and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1' and (product.v_product_status = '2' or product.v_product_status = '0')");



        // $result1 = DB::select("select* from product where category = 'MEN'S FASHION' and status = '1' and (v_product_status = '2' or v_product_status = '0')LIMIT 3");

        $result1 = DB::select(DB::raw("SELECT * FROM product WHERE main_category = :value and status = :value3 and (v_product_status = :value4 or v_product_status = :value5 ) LIMIT 3"), array(
            'value' => $main,
            'value3' => $a,
            'value4' => $b,
            'value5' => $c,
        ));

        // $d2 = DB::select("select product.pk_id,product.thumbnail,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and product.category = 'accessories' and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date >= '$date' or discount_table.end_date = '$date')and product.status = '1' and (product.v_product_status = '2' or product.v_product_status = '0')");


        // $result2 = DB::select("select* from product where category = 'accessories' and status = '1' and (v_product_status = '2' or v_product_status = '0')");

        // $d3 = DB::select("select product.pk_id,product.thumbnail,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and product.category = 'home textile' and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1' and (product.v_product_status = '2' or product.v_product_status = '0')");


        // $result3 = DB::select("select* from product where category = 'home textile' and status = '1' and (v_product_status = '2' or v_product_status = '0')");


        // $main_category = DB::select("select * from main_category");

        return view('client.index', compact('d','result','result1','d1'));
    }

    public function product_detail_view($pk_id, $sku)
    {


        date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
        $email="";
        $result = DB::select("select* from product where pk_id = '$pk_id'");

// if (count($result) > 0) {
//         $email = $result[0]->vendor_id;
// }
//         $vendor = DB::select("select* from vendors where email = '$email'");

        $result1 = DB::select("select* from product where sku = '$sku'");
        // $d = DB::select("select * from product,discount_table where product.sku = discount_table.sku and product.pk_id = '$pk_id' and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1'");
 $d = DB::select("select * from product,discount_table where (product.SKU = discount_table.SKU) OR (product.sub_category = discount_table.category) and product.pk_id = '$pk_id' and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1'");

// return $d;

        // $result3 = DB::table('detail_table')
        //     ->where('sku', '=', $sku)
        //     ->sum('quantity');

        $qty = DB::select("select* from size_detail ");


        if (count($d) > 0) {

            
            $discount = ((int)$d[0]->price * (int) $d[0]->percentage) / 100;
           
            $discount_price =  ((int)$d[0]->price - (int)$discount);
        }

        // $array = DB::select("select* from size_detail where product_id = '$pk_id' order by pk_id ASC");

        if (count($result) > 0) {
            return view('client.single-product', compact('result', 'result1',  'qty'  ,'d','discount_price'));
        }
    }

// ===================== Search BY  Category ===============//


public function searchByCategory($main = '', $sub = '')
{
    $a = "1";
    $b = "2";
    $c = "0";
    $f = "0";

    date_default_timezone_set("Asia/Karachi");
    $date = date('Y-m-d');
    $result = [];
    $d = [];

    $result = DB::select(DB::raw("SELECT * FROM product WHERE product.main_category = :value and product.status = :value2  ") , array(
        'value2' => $a,
        
        'value' => $main,
    ));

   
   $d = DB::select(DB::raw("SELECT product.pk_id,product.sku,product.name,product.price,product.thumbnail,product.thumbnail2,discount_table.percentage ,discount_table.start_date,discount_table.end_date FROM product,discount_table WHERE product.main_category = :value and product.SKU=discount_table.sku   and product.status = :value2 and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date')") , array(

        'value' => $main,
        'value2' => $a,
       
    ));
    // $d = DB::select("select product.pk_id,product.thumbnail,product.thumbnail2,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and product.sub_category = 'Polo' and product.discount_status = '1'  and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1' and (product.v_product_status = '2' or product.v_product_status = '0')");

    $main_category = DB::select("select * from main_category");
    return view('client.shop', compact('result', 'd', 'main_category', 'main', 'sub', 'type'));
}




    ///...................wishlist ...........................//

    public function add_wishlist($id)

    {
        if (!(session()->has('type') && session()->get('type') == 'client')) {
            return redirect('/login');
        }
        $username = session()->get('username');

        if (!(session()->has('type') && session()->get('type') == 'client')) {
            return "login to add wishlist";
        } else {
            DB::insert("insert into wishlist (user_id,product_id) values (?,?)", array($username, $id));
        }
        Session::flash('message','Added to Wishlist.');
        return redirect()->back();
       
    }

    public function view_wishlist(Request $request)
    {


        $username = session()->get('username');

        $result = DB::select("select* from wishlist,product where wishlist.user_id = '$username' and wishlist.product_id=product.pk_id and product.status='1'");
// return $result;

        if (count($result) > 0) {
            return view('client.wishlist', compact('result'));
        } else {
            return Redirect::back()->withErrors('No result found');
        }
    }

public function delete_wishlist($pk_id)
{

    DB::delete("delete from wishlist where product_id = '$pk_id'");
  

    return redirect()->back()->withErrors('wishlist deleted'); 

}



    public function shop()
    {
            date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
        $result = [];
        $a = "1";
        // $b="2";
        $c = "0";
        $result = DB::select(DB::raw("SELECT * FROM product WHERE product.status = :value2  ") , array(
            'value2' => $a,
           
        ));
        // return $result;
        $d = DB::select(DB::raw("SELECT product.pk_id,product.SKU,product.name,product.price,product.thumbnail,product.thumbnail2,discount_table.percentage FROM product,discount_table WHERE (product.SKU=discount_table.SKU) or (product.sub_category=discount_table.category) and product.discount_status = :value3 and (product.status = :value2) and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date')") , array(

            'value2' => $a,
            'value3' => $a,
        ));

// return $d;
        return view('client.shop', compact('result','d'));
    }


    public function addToCart(Request $request, $pk_id)
    {
        //return session()->flush();
        date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
        // $size = $request->input('size');
        // $size = DB::select("select* from size_detail where pk_id = '$size'");
        // $size = $size[0]->size;

        $q = $request->input('quantity');


        $result = DB::select("select* from product where pk_id = '$pk_id'");
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $d = DB::select("select * from product,discount_table where product.sku = discount_table.sku and product.pk_id = '$pk_id' and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1'");

        // if (count($d) > 0) {
        //     if (session::has('promoPrice')) {
        //         session()->forget('promoPrice');
        //     }
        //     $cart->discount($d[0], $d[0]->pk_id, $size, $q);
        // } else {
        //     if (session::has('promoPrice')) {
        //         session()->forget('promoPrice');
        //     }
        //     $cart->add($result[0], $result[0]->pk_id, $size, $q);
        // }

        // $cart->discount($result[0],$result[0]->pk_id);
        session()->put('cart', $cart);
        //dd(Session::get('cart'));
        return view('client.cart');





        // $chk = session()->get('cart');



        /*
    $result = DB::select("select* from product where pk_id = '$pk_id'");
    //return dd(session()->get('cart.items'));
  //  $c= session()->get('cart.items');
    //return $c[0]['item'][0]->pk_id;
    $data = array(
        'qty' => 0,
        'item'=>$result,
        'price'=>$result[0]->{'price'},
    );


    
  
    session()->put('cart.qty',0);
    session()->put('cart.subtotal',0);
    $chk = session()->get('cart.items');
    if(is_array($chk))
    {
        if(count($chk)>0)
    {
        echo "check";
        foreach(session()->get('cart.items') as $items )
    {
       if($items['item'][0]->pk_id == $result[0]->{'pk_id'})
       {
           
       }  
    }
}
    }

    $data['qty'] = $data['qty']+1;
    $data['price'] = $data['price'] * $data['qty'];
    session()->push('cart.items',$data);
    session()->put('cart.qty',(session()->get('cart.qty')+1));
    session()->put('cart.subtotal',(session()->get('cart.subtotal')+$data['price']));
   
    $item = session()->get('cart.items');
    return dd($item);
    */


        /*foreach(session()->get('cart') as $pk_id)
    {
     
        return view('client.cart_view',compact('result'));
       
    }*/
    }

    public function getCart()
    {

        //return session()->flush();
        if (!Session::has('cart')) {
            return view('client.cart', ['products' => null]);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('client.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function buynow(Request $request, $pk_id)
    {
        //return session()->flush();
        date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
        // $size = $request->input('size');
        // $size = DB::select("select* from size_detail where pk_id = '$size'");
        // $size = $size[0]->size;

        $q = $request->input('quantity');


        $result = DB::select("select* from product where pk_id = '$pk_id'");
         $cat = DB::select("select sub_category from product where pk_id = '$pk_id'");
        $sub_cat= $cat[0]->sub_category;
        // return $sub_cat;
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
       
       $d = DB::select("select * from product,discount_table where (product.SKU = discount_table.SKU) OR (product.sub_category = discount_table.category) and product.pk_id = '$pk_id' and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1'");

          if (count($d) > 0) {
            if (session::has('promoPrice')) {
                session()->forget('promoPrice');
            }
            $cart->discount($d[0], $d[0]->pk_id,  $q,$sub_cat);
        } else {
            if (session::has('promoPrice')) {
                session()->forget('promoPrice');
            }
            $cart->add($result[0], $result[0]->pk_id,  $q,$sub_cat);
        }

        // $cart->discount($result[0],$result[0]->pk_id);
        session()->put('cart', $cart);
        //dd(Session::get('cart'));
        return view('client.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    
    
    
    
    
    
    
    
    
    
    
    
     public function return_active_order(Request $request,$id)
    {
       
        if (!(session()->has('type') && session()
        ->get('type') == 'client'))
    {
        return redirect('/login');
    }

    $status = "4";
     DB::table('order_table')
            ->where('pk_id', $id)
            ->update(['status' => $status ]);
        DB::table('detail_table')
            ->where('order_id', $id)
            ->update(['v_order_status' => $status ]);

    date_default_timezone_set("Asia/Karachi");
    $date = date('Y-m-d');

$reason = $request->input('reason');
// return $id;
    $user_id = DB::select("select user_id from order_table where pk_id = '$id'");
 $user_id= $user_id[0]->user_id;

 $fnamee = DB::select("select* from client_details where pk_id = '$user_id'");
 $fname= $fnamee[0]->fname;
 $lname= $fnamee[0]->lname;
    $price = DB::select("select amount from order_table where pk_id = '$id'");
   $price= $price[0]->amount;

      $pro_id = DB::select("select product_id from detail_table where order_id = '$id'");
            $prod = $pro_id[0]->product_id;
    
    $q = DB::select("select quantity from detail_table where order_id = '$id'");
           $qq = $q[0]->quantity;
        
    
    
            DB::insert("insert into return_reason (user_id,product_id,quantity,price,order_id,reason,date) values('$user_id','$prod','$qq','$price','$id','$reason','$date') ");

    
    
     return redirect('/');
    
    
    
    
    }
    
    
    
    
    
    
    
    

    public function removeCart($id,  $qty)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        // return $qty;
        $cart->remove($id , $qty);
        session()->put('cart', $cart);
        
        return Redirect::to('/cart');
        
    }


    public function create_client_view()
    {

        return view('client.register');
    }

    public function create_client(Request $request)
    {

        if ($request->input('password') == $request->input('confirm')) {
            $username = $request->input('email');

            $result = DB::select("select* from users where username = '$username' ");

            if (count($result) > 0) {
                return Redirect::back()->withErrors('Username already Exist');
            } else {
                $password=$request->input('password');
                $hashed =bcrypt($password);
               
                DB::insert("insert into users (fname,lname, username, password ) values (?,?,?,?)", array($request->input('fname'), $request->input('lname'), $request->input('email'), $hashed));


                $username = $request->input('email');
                $password = $hashed ;
               
                $result = DB::select("select* from users where username = '$username' and password='$password' ");

                if (count($result) > 0) {
                    $request->session()->put('pk_id', $result[0]->{'pk_id'});
                    $request->session()->put('username', $username);
                    $request->session()->put('type', 'client');
                    $request->session()->put('name', $result[0]->{'fname'} . ' ' . $result[0]->{'lname'});
                    $request->session()->put('fname', $result[0]->{'fname'});
                    $request->session()->put('lname', $result[0]->{'lname'});

                    return Redirect::to('/');
                }
            }
        } else {
            return Redirect::back()->withErrors('Password does not match');
        }
    }


    public function client_logout()
    {
        session()->flush();
        return redirect('/');
    }

    public function client_login_view()
    {

        if ((session()->has('username') && session()->get('type') == 'client')) {
            return redirect('/');
        } else {

            return view('client.login-register');
        }
    }
    
    
    
      public function reset_password_view()
    {

        return view('client.reset_password');
    }
    
    
    
    public function reset_password(Request $request)
    {

        $username = $request->input('username');
        $result = DB::select("select* from client_details where username = '$username'");
        if (count($result) > 0)
        {
            $vcode = uniqid();
            DB::insert("insert into password_resets (email,token) values('$username','$vcode') ");
            $customer_name = $result[0]->{'fname'};
            $data = array(
                'customer_name' => $customer_name,
                'customer_username' => $username,
                'customer_verification_code' => $vcode,

            );
           Mail::send('email_reset_password', $data, function ($message) use($username) {
                        
                                $message->from('info@thefoodpharmacy.pk','The Food Pharmacy' );
                               
                                $message->to($username)->subject('Password Reset Confirmation Link');
                        
                          
            });
             Session::flash('message','A Password reset link sent to your email');
            return redirect()->back();
        }
        else
        {
            return Redirect::back()
                ->withErrors('Username not found');
        }
    }
    
    
    
      public function verify_code($username, $code)
    {
        $result = DB::select("select* from password_resets where email= '$username' and token= '$code' and TIMESTAMPDIFF(MINUTE,password_resets.created_at,NOW()) <=30 ");

        if (count($result) > 0)
        {
            return view('client.change_password', compact('username'));
        }
        else return "The Verification code is expired";
    }

    
    public function password_change(Request $request, $username)
    {
        $password = md5($request->input('password'));
        DB::update("update client_details set password ='$password' where username='$username'");
        return redirect('/login')->with('message', 'Your Password has been changed Successfully');
    }
    

    public function client_login(Request $request)
    {

        $this->validate($request, ['username' => 'required', 'password' => 'required']);
        $username = $request->input('username');
        $password = $request->input('password');
        $password =bcrypt($password);
        $result = DB::select("select* from users where username = '$username' and password='$password' ");

        if (count($result) > 0) {
            $request->session()->put('pk_id', $result[0]->{'pk_id'});
            $request->session()->put('username', $username);
            $request->session()->put('type', 'client');
            $request->session()->put('name', $result[0]->{'fname'} . ' ' . $result[0]->{'lname'});
            $request->session()->put('fname', $result[0]->{'fname'});
            $request->session()->put('lname', $result[0]->{'lname'});

            return Redirect::to('/');
        } else {
            return view('client.login-register')->withErrors('username or password incorrect');
        }
    }


    public function add_new_address_view()
    {


        return view('client.add_address');
    }

    public function add_new_address(Request $request)
    {
        if (!(session()->has('type') && session()->get('type') == 'client')) {
            return redirect('/login');
        }


        $user_id = session()->get('pk_id');


        DB::insert("insert into address_table (user_id,fname,lname,address, phone,zip,country,state,city) values (?,?,?,?,?,?,?,?,?)", array($user_id, $request->input('fname'), $request->input('lname'), $request->input('address'), $request->input('phone'), $request->input('zip'), $request->input('country'), $request->input('state'), $request->input('city')));

        // $result = DB::select("select* from client_details where pk_id = '$user_id'");
        $result1 = DB::select("select* from address_table where user_id = '$user_id'");
        return redirect('/cart/checkout')->with('result1');

        //  return view('client.client_address_view',compact('result1'));


    }
    public function checkout_view()
    {
        if (!(session()->has('type') && session()->get('type') == 'client')) {
            return redirect('/login');
        }
        if (session::has('pk_id')) {

            $pk_id = session()->get('pk_id');
            // return $pk_id;
            $result1 = DB::select("select* from address_table where user_id = '$pk_id'");
            if (count($result1) > 0) 
            {
                return view('client.address', compact('result1'));
            } 
            else
             {

                return view('client.add_address');
            }
        } 

    }


    public function order_view($id)

    {
        if (!(session()->has('type') && session()->get('type') == 'client')) {
            return redirect('/login');
        }
        if (!Session::has('cart')) {
            return view('client.order_summery', ['products' => null]);
        }

        $user_id = session()->get('pk_id');
        // $result1 = DB::select("select client_details.username,client_details.fname,client_details.lname,address_table.phone,address_table.pk_id,address_table.city,address_table.address from client_details,address_table where client_details.pk_id = '$id'and address_table.user_id = '$id'");


        $result = DB::select("select* from client_details where pk_id = '$user_id'");
        $result1 = DB::select("select* from address_table where user_id = '$user_id' and pk_id = '$id'");
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('client.order_summery', compact('result', 'result1'), ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }


    public function order_payment_view($id)

    {
        if (!(session()->has('type') && session()->get('type') == 'client')) {
            return redirect('/login');
        }
        session()->put('user_id', $id);
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);


        $result = DB::select("select* from address_table where pk_id = '$id'");




        return view('client.payment', compact('result'), ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }


// ......................... Promo Code ............................//



public function add_promo_code(Request $request,$pk_id,$sub_cat,$price)

    {
// return $price;
        date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        // $cat =  Session::get('sub_category');
        // return  $cat;
        // return   $storedItem  = ['price'=>$item->price];
        // return $cart->items;
$products = $cart->items;
      
//         foreach($products as $product)
// $promoCode_cat = DB::select("select* from promo_code,promo_for where promo_code.promo_code = '$promo' and promo_for.discount_for = '$username' and promo_code.discount_category = '$sub_cat'  and promo_code.status = '0'");

// foreach($products as $product)
// {
//     return $product['sub_cat'];
// }
// return $cart->totalPrice;



//        return   ($product['item']->price);
//  $price = $request->input('price');
//  return $cart->totalPrice;
// return $price;
    //   return  $cat;
        // if (session()->get('city') == 'Lahore')
        // {
        //     $cart->totalPrice = $cart->totalPrice + 200;
        // }
        // else
        // {
        //     $cart->totalPrice = $cart->totalPrice + 250;
        // }

    // return $cart->totalPrice;
        $username = session()->get('username');
        // return $username;

        $promo = $request->input('promo');

        // return  session()->put('promoPrice', $cart->totalPrice);
        // $pr = DB::select("select price from product where SKU='$pk_id'");
        // return $promoCode_cat[0]->price;

        // $promoCode_cat = DB::select("select* from promo_code,product,promo_for where promo_code.promo_code = '$promo' and promo_for.discount_for = '$username' and product.sub_category=promo_code.discount_category  and (promo_code.start_date < '$date' or promo_code.start_date = '$date') and (promo_code.end_date > '$date' or promo_code.end_date = '$date') and promo_code.min_total <= '$cart->totalPrice' and promo_code.max_total >= '$cart->totalPrice' and promo_code.status = '0'");
        // return $promoCodee;
        // $products = $cart->items;
        // foreach ($products as $product){

        //    return $product['item']->price;

        $promoCode_cat = DB::select("select* from promo_code,promo_for where promo_code.promo_code = '$promo' and promo_for.discount_for = '$username' and promo_code.discount_category = '$sub_cat'  and promo_code.status = '0'");
        $promoCodee = DB::select("select* from promo_for,promo_code where promo_code.pk_id=promo_for.promo_id and promo_code.promo_code = '$promo'  and promo_for.discount_for = '$username' and promo_code.discount_category = '0' and promo_code.status = '0'");
       
        //    return $promoCode_cat;   


                    if (count($promoCode_cat) > 0) {
                    if ($promoCode_cat[0]->discount_type == 'fixed' && $promoCode_cat[0]->discount_for == "$username") {
                        $user = DB::select("select* from client_details where username = '$username' and promostatus != '0'");
                      
                        if (count($user) > 0) {
                            
                            $price = $price - $promoCode_cat[0]->discount_amount;
                            // return  $cart->totalPrice;
                            // DB::update("update client_details set promostatus -= 1 where username='$username'");
                          
                            session()->put('promoPrice', $price);
                            $value= $cart->totalPrice - Session::get('promoPrice') ;
                            $ac= $value- $promoCode_cat[0]->discount_amount;
                            $new=  $ac +Session::get('promoPrice');
                            session()->put('pro', $new);
                            $use_time= $user[0]->promostatus;
                            $use_timee = $use_time -1;
                            DB::update("update client_details set promostatus = '$use_timee' where username='$username'");
                            // session()->put('promoPrice', $cart->totalPrice);
                            return redirect()->back();
                        } else {
                            Session::flash('message','u have used  more than required  time');
                            return redirect()->back();
                            
                        }
                    }


                    elseif ($promoCodee[0]->discount_type == 'percentage' && $promoCodee[0]->discount_for == "$username") 
                    {
                        $user = DB::select("select* from client_details where username = '$username' and promostatus != '0'");
                        if (count($user) > 0) {
                            //  $cart->addPromo($cart->totalPrice,$promoCode[0]->discount_amount);
                            
                            $pricee = $price - (($price * $promoCodee[0]->discount_amount) / 100);
                            // DB::update("update client_details set promostatus = '1' where username='$username'");
                        //    return $price;
                            
                            
                            session()->put('promoPrice', $pricee);
                            $value= $cart->totalPrice - Session::get('promoPrice') ;
                            // return ($pricee * $promoCodee[0]->discount_amount) / 100;
                            $ac= $value -  (($price * $promoCodee[0]->discount_amount) / 100);
                            // return $ac;
                            $new=  $ac +Session::get('promoPrice');
                            session()->put('pro', $new);
                            $use_time= $user[0]->promostatus;
                            $use_timee = $use_time -1;
                            DB::update("update client_details set promostatus = '$use_timee' where username='$username'");
                           
                            
                            
                            
                            
                            
                            // session()->put('promoPrice', $cart->totalPrice);
                            return redirect()->back();
                        } 
                        else {
                            return Redirect::back()->withErrors('more than one time');
                        }
                    }


                }
                elseif(count($promoCodee) > 0)
    
{
   
         
                // $promoCodee = DB::select("select* from promo_for,promo_code where promo_code.pk_id=promo_for.promo_id and promo_code.promo_code = '$promo'  and promo_for.discount_for = '$username' and promo_code.status = '0'");
                // return $promoCodee;
                // if (count($promoCodee) > 0) {
                if ($promoCodee[0]->discount_type == 'fixed' && $promoCodee[0]->discount_for == "$username" ) 
                {
                    $user = DB::select("select* from client_details where username = '$username' and promostatus != '0'");
                    if (count($user) > 0) {
                        //  $cart->addPromo($cart->totalPrice,$promoCode[0]->discount_amount);
                        $cart->totalPrice = $cart->totalPrice - $promoCodee[0]->discount_amount;
                       
                        session()->put('promoPrice', $cart->totalPrice);

                        $use_time= $user[0]->promostatus;
                        $use_timee = $use_time -1;
                        DB::update("update client_details set promostatus = '$use_timee' where username='$username'");
                       

                        return redirect()->back();
                    } else {
                        return Redirect::back()->withErrors('In Validd');
                    }
                }
            



elseif($promoCodee[0]->discount_type == 'percentage' && $promoCodee[0]->discount_for == "$username" ) 
{
    $user = DB::select("select* from client_details where username = '$username' and promostatus != '0'");
    if (count($user) > 0) {
        //  $cart->addPromo($cart->totalPrice,$promoCode[0]->discount_amount);
    //   $cart->totalPrice;
    //   return  session()->get('promoPrice');
        $cart->totalPrice = $cart->totalPrice - (($cart->totalPrice * $promoCodee[0]->discount_amount) / 100);
        // return $cart->totalPrice;
        session()->put('promoPrice', $cart->totalPrice);

        $use_time= $user[0]->promostatus;
        $use_timee = $use_time -1;
        DB::update("update client_details set promostatus = '$use_timee' where username='$username'");
       

        return redirect()->back();
    } else {
        return Redirect::back()->withErrors('In Validd');
    }
}




              
        }
            else{
                    return Redirect::back()->withErrors('In Valid ha');
                }











        // $cat = DB::select("select discount_category from promo_code ");
        //   return $cat;      
        
        $promoCode = DB::select("select* from promo_code where promo_code = '$promo' and (start_date < '$date' or start_date = '$date') and (end_date > '$date' or end_date = '$date') and min_total <= '$cart->totalPrice' and max_total >= '$cart->totalPrice' and status = '0'");
        // return $promoCode; 
        if (count($promoCode) > 0)
        {

            if ($promoCode[0]->discount_type == 'fixed' && $promoCode[0]->discount_for == 'all customers')
            {
                $user = DB::select("select* from client_details where username = '$username' and promostatus = '0'");
                if (count($user) > 0)
                {
                    //  $cart->addPromo($cart->totalPrice,$promoCode[0]->discount_amount);
                    $cart->totalPrice = $cart->totalPrice - $promoCode[0]->discount_amount;
                    DB::update("update client_details set promostatus = '1' where username='$username'");
                    session()->put('promoPrice', $cart->totalPrice);
                    return redirect()
                        ->back();
                }
                else
                {
                    return Redirect::back()
                        ->withErrors('promocode cannot be used more than one time');
                }
            }
            
            
            
            
                    
          
        
// ========================= catt 


            











            
            
            
            
            if ($promoCode[0]->discount_type == 'fixed' && $promoCode[0]->discount_for == 'existing customers')
            {
                $user = DB::select("select client_details.username, client_details.pk_id, order_table.user_id from client_details, order_table where client_details.username = '$username' and client_details.promostatus = '0' and client_details.pk_id = order_table.user_id");
                if (count($user) > 0)
                {

                    $cart->totalPrice = $cart->totalPrice - $promoCode[0]->discount_amount;
                    DB::update("update client_details set promostatus = '1' where username='$username'");
                    session()->put('promoPrice', $cart->totalPrice);
                    return redirect()
                        ->back();
                }
                else
                {
                    return Redirect::back()
                        ->withErrors('promocode cannot be used more than one time');
                }
            }
            if ($promoCode[0]->discount_type == 'fixed' && $promoCode[0]->discount_for == 'new customers')
            {
                $user = DB::select("select client_details.username, client_details.pk_id, order_table.user_id from client_details, order_table where client_details.username = '$username' and client_details.promostatus = '0' and client_details.pk_id != order_table.user_id");
                if (count($user) > 0)
                {

                    $cart->totalPrice = $cart->totalPrice - $promoCode[0]->discount_amount;
                    DB::update("update client_details set promostatus = '1' where username='$username'");
                    session()->put('promoPrice', $cart->totalPrice);
                    return redirect()
                        ->back();
                }
                else
                {
                    return Redirect::back()
                        ->withErrors('promocode cannot be used more than one time');
                }
            }
            
            
            
            
            
            
                  
                    
            $promoCodee = DB::select("select* from promo_code where promo_code = '$promo' and discount_for = '$username'  and (start_date < '$date' or start_date = '$date') and (end_date > '$date' or end_date = '$date') and min_total <= '$cart->totalPrice' and max_total >= '$cart->totalPrice' and status = '0'");
       
            if (count($promoCodee) > 0) {
            if ($promoCodee[0]->discount_type == 'percentage' && $promoCodee[0]->discount_for == "$username") {
                $user = DB::select("select* from client_details where username = '$username' and promostatus = '0'");
                if (count($user) > 0) {
                    //  $cart->addPromo($cart->totalPrice,$promoCode[0]->discount_amount);
                   $cart->totalPrice = $cart->totalPrice - (($cart->totalPrice * $promoCode[0]->discount_amount) / 100);
                    DB::update("update client_details set promostatus = '1' where username='$username'");
                    session()->put('promoPrice', $cart->totalPrice);
                    return redirect()->back();
                } else {
                    return Redirect::back()->withErrors('promocode cannot be used more than one time');
                }
            }
        }else{
            return Redirect::back()->withErrors('invalid promocode');
        }
          
            
            
            
            
            
            
            if ($promoCode[0]->discount_type == 'percentage' && $promoCode[0]->discount_for == 'all customers')
            {
                $user = DB::select("select* from client_details where username = '$username' and promostatus = '0'");
                if (count($user) > 0)
                {
                    $cart->totalPrice = $cart->totalPrice - (($cart->totalPrice * $promoCode[0]->discount_amount) / 100);
                    DB::update("update client_details set promostatus = '1' where username='$username'");
                    session()->put('promoPrice', $cart->totalPrice);
                    return redirect()
                        ->back();
                }
                else
                {
                    return Redirect::back()
                        ->withErrors('promocode cannot be used more than one time');
                }
            }
            if ($promoCode[0]->discount_type == 'percentage' && $promoCode[0]->discount_for == 'existing customers')
            {
                $user = DB::select("select client_details.username, client_details.pk_id, order_table.user_id from client_details, order_table where client_details.username = '$username' and client_details.promostatus = '0' and client_details.pk_id = order_table.user_id");

                if (count($user) > 0)
                {

                    //  $cart->addPromo($cart->totalPrice,$promoCode[0]->discount_amount);
                    // return $cart->totalPrice;
                    $cart->totalPrice = $cart->totalPrice - (($cart->totalPrice * $promoCode[0]->discount_amount) / 100);
                    DB::update("update client_details set promostatus = '1' where username='$username'");
                    session()->put('promoPrice', $cart->totalPrice);
                    return redirect()
                        ->back();
                }
                else
                {
                    return Redirect::back()
                        ->withErrors('promocode cannot be used more than one time');
                }
            }
            if ($promoCode[0]->discount_type == 'percentage' && $promoCode[0]->discount_for == 'new customers')
            {
                $user = DB::select("select client_details.username, client_details.pk_id, order_table.user_id from client_details, order_table where client_details.username = '$username' and client_details.promostatus = '0' and client_details.pk_id != order_table.user_id");
                if (count($user) > 0)
                {

                    $cart->totalPrice = $cart->totalPrice - (($cart->totalPrice * $promoCode[0]->discount_amount) / 100);
                    DB::update("update client_details set promostatus = '1' where username='$username'");
                    session()->put('promoPrice', $cart->totalPrice);
                    return redirect()
                        ->back();
                }
                else
                {
                    return Redirect::back()
                        ->withErrors('promocode cannot be used more than one time');
                }
            }
        }
        else
        {

            return Redirect::back()
                ->withErrors('invalid promocode');
        }
    }



    public function confirm_order(Request $request)
    {
        if (!(session()->has('type') && session()->get('type') == 'client')) {
            return redirect('/login');
        }
        date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $username = session()->get('username');




        $pk_id = session()->get('pk_id');
        
        $user_id = session()->get('user_id');
// return $user_id;
        $result = DB::select("select* from client_details where pk_id = '$pk_id' ");
// return $result;
        $result1 = DB::select("select* from address_table where user_id = '$pk_id' and pk_id = '$user_id' ");
        // return $result1;
        $address = $result1[0]->address;
        $city = $result1[0]->city;
        $phone = $result1[0]->phone;
        $zip = $result1[0]->zip;
        $status = 0;
        $v_order_status = 0;
        $s = 0;
        $products = $cart->items;
     
      if (session::has('pro'))
        {
            $promo_price= Session::get('pro');
        }
        elseif(session::has('promoPrice'))
        {
            $promo_price= Session::get('promoPrice');
        }
        else
        {
           $promo_price= $cart->totalPrice;
        }
     
     
     
       
           if (session::has('pro'))
        {
            $promo = session()->get('pro');
            DB::insert("insert into order_table (user_id,promo_amount,amount, shipment_address_id,placed_at,username,fname,lname,status) values (?,?,?,?,?,?,?,?,?)", array(
                $result[0]->pk_id,
                $promo,
                $cart->totalPrice,
                $result1[0]->pk_id,
               Now(),
                
                $username,
                $result1[0]->fname,
                $result1[0]->lname,
                $status
             
            ));
        }
        elseif (session::has('promoPrice'))
        {
            $promo = session()->get('promoPrice');
            DB::insert("insert into order_table (user_id,promo_amount,amount, shipment_address_id,placed_at,username,fname,lname,status) values (?,?,?,?,?,?,?,?,?)", array(
                $result[0]->pk_id,
                $promo,
                $cart->totalPrice,
                $result1[0]->pk_id,
                Now(),
                
                $username,
                $result1[0]->fname,
                $result1[0]->lname,
                $status
               
            ));
        }


else



        {
            DB::insert("insert into order_table (user_id,amount, shipment_address_id,placed_at,username,fname,lname,status ) values (?,?,?,?,?,?,?,?)", array(
                $result[0]->pk_id,
                $cart->totalPrice,
                $result1[0]->pk_id,
                Now(),
                
                $username,
                $result1[0]->fname,
                $result1[0]->lname,
                $status
               
            ));
        }
   

        $result = DB::select("select* from order_table where user_id = '$pk_id' ORDER BY pk_id DESC");

        foreach ($products as $product) {

            if ($product['save'] > 0)
                DB::insert("insert into detail_table (product_id,order_id, SKU, product_name, quantity,discount_price,price,percentage,vendor_id,v_order_status,v_payment_status ) values (?,?,?,?,?,?,?,?,?,?,?)", array($product['item']->pk_id, $result[0]->pk_id, $product['item']->SKU, $product['item']->name, $product['qty'], $product['price'], $product['item']->price, $product['item']->percentage,  $product['item']->vendor_id, $v_order_status, $s));
               
            else
                DB::insert("insert into detail_table (product_id,order_id, SKU, product_name, quantity,price,vendor_id, v_order_status,v_payment_status ) values (?,?,?,?,?,?,?,?,?)", array($product['item']->pk_id, $result[0]->pk_id, $product['item']->SKU, $product['item']->name, $product['qty'], $product['item']->price,  $product['item']->vendor_id, $v_order_status, $s));


            // $id = $product['item']->pk_id;
            // // $size = $product['size'];
            // $resulting = DB::select("select * from size_detail where product_id = '$id' ");
            // $q = $resulting[0]->quantity - $product['qty'];
            // DB::update("update size_detail set quantity = '$q' where product_id='$id' ");
           
        }

        $data = array(
            'customer_fname' => session()->get('fname'),
            'customer_lname' => session()->get('lname'),
            'customer_email' => session()->get('username'),
            'customer_address' => $address,
            'customer_city' => $city,
            'customer_phone' => $phone,
            'customer_region' => $zip,
            'order_id' => $result[0]->{'pk_id'},
            'date' => date('Y-m-d'),

            'total_price' => $cart->totalPrice,


        );
        


        session()->forget('promoPrice');
        session()->forget('cart');
        // session()->flush();
        return view('client.thankyou', compact('result'));
        //  return redirect('/login');

        // return view('client.order_view',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }

    public function order_tracking_view()
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $username = Session::get('username');

        $ordertracking = DB::select("select* from client_details where username = '$username' ");
        $user = $ordertracking[0]->pk_id;

        $orderdetail = DB::select("select* from order_table where user_id = '$user' ");


        return view('client.order_tracking', compact('products', 'orderdetail'));
    }


    public function order_tracking(Request $request)
    {


        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $orderid = $request->input('orderid');
        $username = Session::get('username');
        $user = DB::select("select* from client_details where username = '$username' ");
        $user = $user[0]->pk_id;
$address="";
        $ordertracking = DB::select("select* from order_table where pk_id ='$orderid' and user_id = '$user'");
        if (count($ordertracking) > 0){
        $address = $ordertracking[0]->shipment_address_id;
    }
        $ad = DB::select("select* from address_table where pk_id = '$address' ");
   $time = now()->toDateString();
    //    return $time;
        $button = DB::select("select* from order_table where pk_id = '$orderid' and expire_at > '$time'  ");


        $orderdetail = DB::select("select* from detail_table where  order_id ='$orderid'");

        if (count($ordertracking) > 0)

            return view('client.order_detail', compact('products', 'ordertracking', 'orderdetail', 'ad','button'));
        else
            return Redirect::back()->withErrors('No Order Exist');
    }

    ///====================.........Coaching Module..........============================//

    public function coaching()
    {
if (!(session()->has('type') && session()->get('type') == 'client')) {
            return redirect('/login')->withErrors('Please login or signup to avail our coaching services');
        }
        

      return view('client.coaching');
    }  



    public function guest_coaching()
    {

       

      return view('client.guest_coaching');
    }  


    public function createPayment()
    {
      return view('client.create_payment');
    }

    public function guestcreatePayment()
    {
      return view('client.guest_create-payment');
    }

    public function bankSlip(Request $request)
    {
      $data = $request->all();
       	return view('client.bankSlip')->with('data',$data);
    }

    public function guestbankSlip(Request $request)
    {
      $data = $request->all();
       	return view('client.guest_bankslip')->with('data',$data);
    }


    public function bankSlipSubmit(Request $request)
    {
        // return "hee";

        $user_id = session()->get('user_id');

        $username = Session::get('username');
        $user = DB::select("select* from client_details where username = '$username' ");
        $user = $user[0]->pk_id;
// return $user;

	 
  	
	  $bank_slip = new File;
	  $bank_slip->name = $request->input('name');
	  $bank_slip->email = $request->input('email');
    $bank_slip->amount = $request->input('amount');
    $bank_slip->package = $request->input('package');

	  $bank_slip->status = 'pending';
	 


	  

        $file = $request->file('file');

        // File Details
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();

        // Valid File Extensions
        $valid_extension = array("jpg","jpeg","png");
    
        // 10MB in Bytes
        $maxFileSize = 10097152;

        // Check file extension
        

          // Check file size
         
             // File upload location
             // $location = 'images';
             $filename =$this->random_strings(10).'.'.$extension;
          
             $location = 'assets_user/bank_slip' ;
     		// dd($location);
             // Upload file
             $file->move($location,$filename);
            

             Session::flash('message','You Will get email when approved');
          
         

        

      
      
	  $bank_slip->file =  $filename;
	  $bank_slip->user_id = $user ;
    //   return  $bank_slip->user_id;
    $bank_slip->save();
    // $data =  DB::table('bank_slips')->latest('id')->first();
      $data = DB::select("select* from bank_slips where email = '$username' ");
    // return $data;
    $name= 'Sonia Saleem';
    
    $email= 'thefoodpharmacyapp@gmail.com';
    Mail::send('email_notify_admin', $data, function ($message) use ($name, $email)
        {

           
          $message->from('info@thefoodpharmacy.pk','The Food Pharmacy' );

            $message->to($email)->subject('Dear,'.$name.'New payment Pending for approval');

        });
    
  
    return redirect('/coaching');	
   }
   function random_strings($length_of_string) 
   { 
     
       // String of all alphanumeric character 
       $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
     
       // Shufle the $str_result and returns substring 
       // of specified length 
       return substr(str_shuffle($str_result),  
                          0, $length_of_string); 
   } 




   public function questionform()
   {
       return view('client.questionform');
   }

   public function guestquestionform()
   {
       return view('client.guest_questionform');
   }

   public function questionAnswerFormSubmit(Request $request)
   {

    $username = Session::get('username');
    $user = DB::select("select* from client_details where username = '$username' ");
    $user = $user[0]->pk_id;

       $data = array();

       $data = $request->input();
       // dd($data);
       unset($data['_token']);
       unset($data['relevantInfo']);
       $questionAnswer = new QuestionAnswer;
     
       $data['user_id'] = $user;
       $result = DB::table('question_answer')->insert($data);
       if($result)
       {
           $data = DB::select("select* from question_answer where user_id = '$user' ");
          
          $data= $data[0]->user_id;
         
           
           
           
           
            $result = DB::select("select* from client_details where pk_id = '$data' ");
        $username = $result[0]->{'username'};
        $fname = $result[0]->{'fname'};
        $lname = $result[0]->{'lname'};
       
        $data = array(
            'customer_fname' => $fname,
            'customer_lname' => $lname,
            'customer_email' => $username,
           
           

        );
           
           
           
           
            $name= 'Sonia Saleem';
    
   $email= 'thefoodpharmacyapp@gmail.com';
    Mail::send('email_admin_HH', $data, function ($message) use ($name, $email)
        {

           
          $message->from('info@thefoodpharmacy.pk','The Food Pharmacy' );

            $message->to($email)->subject('Dear,'.$name.'New Healt History form Submitted');

        });
    
           
           
           // Session::flash('message','Diet information submit succesfully');
           return redirect()->back()->with('success','Diet information submit succesfully');;
       }
   }


//.............============..........guest QA form submit..........=======////////////

public function guestquestionAnswerFormSubmit(Request $request)
   {

  

       $data = array();

       $data = $request->input();
       // dd($data);
       unset($data['_token']);
       unset($data['relevantInfo']);
       $questionAnswer = new QuestionAnswer;
     
    
       $result = DB::table('question_answer')->insert($data);
       if($result)
       {
          
           return redirect()->back()->with('success','Diet information submit succesfully');;
       }
   }



   public function calendly()
   {

   $result =  $this->endpointRequestGet();

   return view('client.calendly')->with('calendly', $result );
  
   }

     public function endpointRequestGet()
   {
       try {

           $headers = [
               'X-TOKEN' => 'NPCGMNEAE5NTUM35ZYWDXNNZE2UGIDAK'];
           $url = 'https://calendly.com/api/v1/users/me/event_types';
           // dd($headers);
           $response = $this->client->request('GET',$url,['headers'=>$headers]);
   
       } catch (\GuzzleHttp\Exception\ConnectException $e) {

           $response = json_encode((string)$e->getResponse()->getBody());
           return $response;
       }
       catch(\Exception $e) {
           $response = json_decode((string)$e->getResponse()->getBody());
           return $response;
       }
//dd($response->getBody()->getContents());
       return $response;
   }
   public function calendlySheduling()
   {
  $username = Session::get('username');
    $user = DB::select("select* from client_details where username = '$username' ");
    $id = $user[0]->pk_id;
    $status= $user[0]->payment_status;
    
   

    $data = DB::select("select* from client_details where pk_id='$id' and payment_status='$status' ");
    $new_data=$data[0]->payment_status;
if($new_data>0){
    $new_status= $status - 1;
    
    DB::update("update client_details set payment_status='$new_status' where pk_id = '$id'");


    return view('client.calendly');
}

else{
  Session::flash('message','Please Wait, Create Payment First');
  return redirect::back();
     
   }
}

   public function guestcalendlySheduling()
   {
     return view('client.guest_calendly');
   }

  
   public function  assigned_diet()
   {

    $username = Session::get('username');
    $user = DB::select("select* from client_details where username = '$username' ");
    $id = $user[0]->pk_id;
    // return $id;
    $assigned = DB::select("select* from assigned_diet_plan_to_user where user_id='$id'  ");
    // return  $assigned;
    if(count($assigned)>0){
    $dietplan_id=  $assigned[0]->diet_plan_id;
   
    // return $dietplan_id;
    $dietplan = DB::select("select* from dietplan where pk_id='$dietplan_id'");

    // return $dietplan;

    $sundaybreakfast = DB::select("select* from sunday where dietplan_id='$dietplan_id' and time_id='breakfast' ");
    $sundaylunch = DB::select("select* from sunday where dietplan_id='$dietplan_id'  and time_id='lunch' ");
    $sundaysnacks = DB::select("select* from sunday where dietplan_id='$dietplan_id' and time_id='snacks' ");
    $sundaydinner = DB::select("select* from sunday where dietplan_id='$dietplan_id' and time_id='dinner'  ");
  
    $mondaybreakfast = DB::select("select* from monday where dietplan_id='$dietplan_id' and time_id='breakfast' ");
    $mondaylunch = DB::select("select* from monday where dietplan_id='$dietplan_id' and time_id='lunch' ");
    $mondaysnacks = DB::select("select* from monday where dietplan_id='$dietplan_id' and time_id='snacks' ");
    $mondaydinner = DB::select("select* from monday where dietplan_id='$dietplan_id' and time_id='dinner'  ");
    
    $tuesdaybreakfast = DB::select("select* from tuesday where dietplan_id='$dietplan_id' and time_id='breakfast' ");
    $tuesdaylunch = DB::select("select* from tuesday where dietplan_id='$dietplan_id' and time_id='lunch' ");
    $tuesdaysnacks = DB::select("select* from tuesday where dietplan_id='$dietplan_id' and time_id='snacks' ");
    $tuesdaydinner = DB::select("select* from tuesday where dietplan_id='$dietplan_id' and time_id='dinner'  ");
  
    $wednesdaybreakfast = DB::select("select* from wednesday where dietplan_id='$dietplan_id' and time_id='breakfast'  ");
    $wednesdaylunch = DB::select("select* from wednesday where dietplan_id='$dietplan_id' and time_id='lunch' ");
    $wednesdaysnacks = DB::select("select* from wednesday where dietplan_id='$dietplan_id' and time_id='snacks' ");
    $wednesdaydinner = DB::select("select* from wednesday where dietplan_id='$dietplan_id' and time_id='dinner' ");
  
    $thursdaybreakfast = DB::select("select* from thursday where dietplan_id='$dietplan_id' and time_id='breakfast' ");
    $thursdaylunch = DB::select("select* from thursday where dietplan_id='$dietplan_id' and time_id='lunch' ");
    $thursdaysnacks = DB::select("select* from thursday where dietplan_id='$dietplan_id' and time_id='snacks' ");
    $thursdaydinner = DB::select("select* from thursday where dietplan_id='$dietplan_id' and time_id='dinner' ");
  
    $fridaybreakfast = DB::select("select* from friday where dietplan_id='$dietplan_id' and time_id='breakfast' ");
    $fridaylunch = DB::select("select* from friday where dietplan_id='$dietplan_id'and time_id='lunch' ");
    $fridaysnacks = DB::select("select* from friday where dietplan_id='$dietplan_id' and time_id='snacks' ");
    $fridaydinner = DB::select("select* from friday where dietplan_id='$dietplan_id' and time_id='dinner' ");
  
    $saturday = DB::select("select* from saturday where dietplan_id='$dietplan_id' and time_id='breakfast' ");
    $saturdaylunch = DB::select("select* from saturday where dietplan_id='$dietplan_id' and time_id='lunch' ");
    $saturdaysnacks = DB::select("select* from saturday where dietplan_id='$dietplan_id' and time_id='snacks' ");
    $saturdaydinner = DB::select("select* from saturday where dietplan_id='$dietplan_id' and time_id='dinner' ");
  
    }else{
        Session::flash('message','No Diet Plan Assigned Till Now, Please Wait');
        return redirect::back();
       
    }
   
    return view('client.user_diet_plan',compact('dietplan','sundaybreakfast','sundaylunch','sundaysnacks',
    'sundaydinner','mondaybreakfast','mondaylunch','mondaysnacks','mondaydinner','tuesdaybreakfast',
    'tuesdaylunch','tuesdaysnacks','tuesdaydinner','wednesdaybreakfast','wednesdaylunch','wednesdaysnacks',
    'wednesdaydinner','thursdaybreakfast','thursdaylunch','thursdaysnacks','thursdaydinner','fridaybreakfast',
    'fridaylunch','fridaysnacks','fridaydinner',
    'saturday','saturdaylunch','saturdaysnacks','saturdaydinner'));
   }

//////////=============.................guest bank slip submit...........=============/////////////


   // =============== Guest Ecom ========================================
   
   public function guest_checkout_view()
{

if ((session()->has('username') && session()->get('type') == 'client')) {
        return redirect('/');
    }else{

    return view('client.guest_add_address');
    }
}


public function guest_checkout(Request $request)
    {


        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $city = $request->input('city');
        $zip = $request->input('zip');
        $address = $request->input('address');
        $country = $request->input('country');
        $state = $request->input('state');
        $note = $request->input('note');

        if ($request->input('check')) {
            if (!empty($request->input('password'))) {


                if ($request->input('password') == $request->input('confirm')) {

                    $result = DB::select("select* from client_details where username = '$email'");

                    if (count($result) > 0) {
                        return Redirect::back()->withErrors('This email is already registered');
                    } else {
                        if (!empty($request->input('email'))) {
                            $password = $request->input('password');
                            $confirm = $request->input('confirm');
                            session()->put('password', $password);
                            session()->put('confirm', $confirm);
                        } else {
                            return Redirect::back()->withErrors('Email is required to create account');
                        }
                    }
                } else {
                    return Redirect::back()->withErrors('Password does not match');
                }
            } else {
                return Redirect::back()->withErrors('Please enter Password');
            }
        }

        session()->put('fname', $fname);
        session()->put('lname', $lname);
        session()->put('email', $email);
        session()->put('phone', $phone);
        session()->put('city', $city);
        session()->put('zip', $zip);
        session()->put('address', $address);

        session()->put('country', $country);
        session()->put('state', $state);
        session()->put('note', $note);

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('client.guest_order_summary', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

   
   
   
   
   
   
   public function guest_payment_view()
    {
        if (!(session()
            ->has('cart')))
        {
            return redirect('/');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        // if (session()->get('city') == 'Lahore')
        // {
        //     $cart->totalPrice = $cart->totalPrice + 200;
        // }
        // else
        // {
        //     $cart->totalPrice = $cart->totalPrice + 250;
        // }
        return view('client.guest_payment', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }



    public function guest_confirm_order(Request $request)
    {
        if (!(session()->has('cart')))
        {
            return redirect('/');
        }

        date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
        $oldCart = Session::get('cart');

        // if (session()->get('city') == 'Lahore')
        // {
        //     $oldCart->totalPrice = $oldCart->totalPrice + 200;
        // }
        // else
        // {
        //     $oldCart->totalPrice = $oldCart->totalPrice + 250;
        // }

        $cart = new Cart($oldCart);

        $fname = session()->get('fname');
        $lname = session()->get('lname');
        $email = session()->get('email');
        $phone = session()->get('phone');
        $city = session()->get('city');
        $zip = session()->get('zip');
        $address = session()->get('address');

        $country = session()->get('country');
        $state = session()->get('state');
        $note = session()->get('note');
        $status = 0;
        $v_order_status = 0;
        $s = 0;
        $products = $cart->items;
        if (session::has('password'))
        {
            $promostatus = 0;
            $password = session()->get('password');
            DB::insert("insert into client_details (fname,lname,username, password, promostatus) values (?,?,?,?,?)", array(
                $fname,
                $lname,
                $email,
                md5($password) ,
                $promostatus
            ));

            $result1 = DB::select("select* from client_details where username = '$email' ");

            DB::insert("insert into address_table (user_id,fname,lname, address, city, phone, zip,country,state) values (?,?,?,?,?,?,?,?,?)", array(
                $result1[0]->pk_id,
                $fname,
                $lname,
                $address,
                $city,
                $phone,
                $zip,
                $country,
                $state
            ));

            $id = $result1[0]->pk_id;

            $result2 = DB::select("select* from address_table where user_id = '$id' ");

            DB::insert("insert into order_table (user_id,shipment_address_id,placed_at,username,fname,lname,amount, status,note ) values (?,?,?,?,?,?,?,?,?)", array(
                $result1[0]->pk_id,
                $result2[0]->pk_id,
                Now(),
                $email,
                $fname,
                $lname,
                $cart->totalPrice,
                $status,
                $note
            ));
            $result = DB::select("select* from order_table where user_id = '$id' ORDER BY pk_id DESC");

            foreach ($products as $product)
            {
                if ($product['save'] > 0) DB::insert("insert into detail_table (product_id,order_id, sku, product_name, quantity,discount_price,price,percentage,size,vendor_id,v_order_status,v_payment_status ) values (?,?,?,?,?,?,?,?,?,?,?,?)", array(
                    $product['item']->pk_id,
                    $result[0]->pk_id,
                    $product['item']->SKU,
                    $product['item']->category,
                    $product['qty'],
                    $product['price'],
                    $product['item']->price,
                    $product['item']->percentage,
                    
                    $product['item']->vendor_id,
                    $v_order_status,
                    $s
                ));

                else DB::insert("insert into detail_table (product_id,order_id, sku, product_name, quantity,price,vendor_id, v_order_status,v_payment_status ) values (?,?,?,?,?,?,?,?,?)", array(
                    $product['item']->pk_id,
                    $result[0]->pk_id,
                    $product['item']->SKU,
                    $product['item']->category,
                    $product['qty'],
                    $product['item']->price,
                    
                    $product['item']->vendor_id,
                    $v_order_status,
                    $s
                ));

                // $id = $product['item']->sku;
                // $pro_id = DB::select("select pk_id from product where sku = '$id'");
                // $prod = $pro_id[0]->pk_id;
                
                // $resulting = DB::select("select * from size_detail where product_id = '$prod' ");
                // $q = $resulting[0]->quantity - $product['qty'];
                // DB::update("update size_detail set quantity = '$q' where product_id='$prod' ");
            }

            $password = md5($password);
            $login = DB::select("select* from client_details where username = '$email' and password='$password' ");

            if (count($login) > 0)
            {
                $request->session()
                    ->put('pk_id', $login[0]->{'pk_id'});
                $request->session()
                    ->put('username', $email);
                $request->session()
                    ->put('type', 'client');
                $request->session()
                    ->put('name', $login[0]->{'fname'} . ' ' . $login[0]->{'lname'});
                $request->session()
                    ->put('fname', $login[0]->{'fname'});
                $request->session()
                    ->put('lname', $login[0]->{'lname'});
            }
        }
        else
        {
            DB::insert("insert into order_table (placed_at,username,fname,lname, address, city, phone, zipcode,country,state ,amount, status,note) values (?,?,?,?,?,?,?,?,?,?,?,?,?)", array(
                Now(),
                $email,
                $fname,
                $lname,
                $address,
                $city,
                $phone,
                $zip,
                $country,
                $state,
                $cart->totalPrice,
                $status,
                $note
            ));

            $result = DB::select("select* from order_table where username = '$email' ORDER BY pk_id DESC");

            foreach ($products as $product)
            {
                if ($product['save'] > 0) DB::insert("insert into detail_table (product_id,order_id, sku, product_name, quantity,discount_price,price,percentage,size,vendor_id,v_order_status,v_payment_status ) values (?,?,?,?,?,?,?,?,?,?,?,?)", array(
                    $product['item']->pk_id,
                    $result[0]->pk_id,
                    $product['item']->SKU,
                    $product['item']->name,
                    $product['qty'],
                    $product['price'],
                    $product['item']->price,
                    $product['item']->percentage,
                    // $product['size'],
                    $product['item']->vendor_id,
                    $v_order_status,
                    $s
                ));

                else DB::insert("insert into detail_table (product_id,order_id, sku, product_name, quantity,price,vendor_id, v_order_status,v_payment_status  ) values (?,?,?,?,?,?,?,?,?)", array(
                    $product['item']->pk_id,
                    $result[0]->pk_id,
                    $product['item']->SKU,
                    $product['item']->name,
                    $product['qty'],
                    $product['item']->price,
                    // $product['size'],
                    $product['item']->vendor_id,
                    $v_order_status,
                    $s
                ));

                // $id = $product['item']->sku;
                // $pro_id = DB::select("select pk_id from product where sku = '$id'");
                // $prod = $pro_id[0]->pk_id;
                // $size = $product['size'];
                // $resulting = DB::select("select * from size_detail where product_id = '$prod' and size = '$size'");
                
                // $q = $resulting[0]->quantity - $product['qty'];
                // //  DB::table('size_detail')->where('pk_id', $id and )->update(['quantity_on_hand' =>$q]);
                // DB::update("update size_detail set quantity = '$q' where product_id='$prod' and size='$size'");
           
            }
        }

        $data = array(
            'customer_fname' => session()->get('fname') ,
            'customer_lname' => session()
                ->get('lname') ,
            'customer_email' => session()
                ->get('email') ,
            'customer_address' => session()
                ->get('address') ,
            'customer_city' => session()
                ->get('city') ,
            'customer_phone' => session()
                ->get('phone') ,
            'customer_region' => session()
                ->get('zip') ,
            'customer_country' => session()
                ->get('country') ,
            'customer_state' => session()
                ->get('state') ,
            'order_id' => $result[0]->{'pk_id'},
            'date' => date('Y-m-d') ,
            'total_price' => $cart->totalPrice,
        );

        // $o_id = $result[0]->{'pk_id'};
        // Mail::send('email_order_confirm', $data, function ($message) use ($o_id)
        // {

        //     $message->from('info@yoc.com.pk', 'YOC');
        //     $id = session()->get('email');
        //     $message->to($id)->subject('Order ID# ' . $o_id . ' Received');
        // });

        // $apikey = "72097a90d0ac36af8a9ce42bc4c4c51a"; ///Your apikey
        // $mobile = $phone; ///Recepient Mobile Number
        // $sender = "King Fabric"; // your masking or sender
        // $message = "Your order has been confirmed by YOC .Your tracking Id is " . $o_id . ". Thankyou for shopping."; // sms text
        // $url = 'http://csms.dotklick.com/api_sms/api.php?key=' . $apikey . '&receiver=' . urlencode($mobile) . '&sender=' . urlencode($sender) . '&msgdata=' . urlencode($message);

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $output = curl_exec($ch);
        
        
        
//         $fname = session()->get('fname');
        
//         // $lname = session()->get('lname');
//         $email = session()->get('email');
//        $o_id = $result[0]->{'pk_id'};
//         $phone = session()->get('phone');
       
//         $city = session()->get('city');
//         $zip = session()->get('zip');
//         $address = session()->get('address'); 
//         //   return $address;
//           $amount = $result[0]->{'amount'};
//         // return $amount;
//          foreach ($products as $product)
//          {
//          $qty =  $product['qty'];
//         // return $qty;
//          }
         
//         $apiKey='Qifq0chQyMpoaM4wfb4kferNd';
// $name= session()->get('fname');
// $address=urlEncode($address);
// $email=urlEncode($email);
// $cell=urlEncode($phone);
// $reference=$o_id;
// $parcel='hello';
// $cod=$amount;
// $peice=$qty;
// $weight='0.5';
// $cityCode='LHE';
// $comments=urlEncode("Call before delivery");
// $curl = curl_init();
// curl_setopt_array($curl, [
// CURLOPT_RETURNTRANSFER => 1,
// CURLOPT_URL => "http://rapidcourier.com.pk/api/BookShipment?ApiKey=".$apiKey."&Name=".$name."&Address=".$address.
// "&Email=".$email."&Cell=".$cell."&Reference=".$reference."&ParcelDetail=".$parcel."&CollectRs=".$cod."&Peices=".$peice."&Weight=".$weight."&CityCode=".$cityCode."&Comments=".$comments,
// CURLOPT_USERAGENT => 'Codular Sample cURL Request'
// ]);
// $response = curl_exec($curl);
// curl_close($curl);
// echo $response;
        
//              $o_id = $result[0]->{'pk_id'};
//          DB::update("update order_table set shippment_id = '$response' where pk_id='$o_id' ");
        
        
        
        

        session()->forget('promoPrice');
        session()
            ->forget('cart');
        return view('client.thankyou', compact('result'));
    }
    
   
   
   
   public function guest_order_tracking_view()
{
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;

    return view('client.guest_order_tracking', compact('products'));
}



public function guest_order_tracking(Request $request)
{

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
    $email = $request->input('email');
    $orderid = $request->input('orderid');
    $ordertracking = DB::select("select* from order_table where username = '$email' and pk_id ='$orderid'");

    $orderdetail = DB::select("select* from detail_table where  order_id ='$orderid'");
    $test= $orderdetail[0]->product_id;
    

                     $thumbnail = DB::select("select* from product where  pk_id ='$test'");
    if (count($ordertracking) > 0)

    return view('client.guest_order_detail', compact('products', 'ordertracking', 'orderdetail'));
    else 
    return Redirect::back()->withErrors('No Order Exist');
}

   
   
   //=========== End Guest Ecom ============================================
   

 public function about_us(){
          return view('client.about_us');
   }

public function contact_us(){
          return view('client.contact-us');
   }

public function FAQ(){
          return view('client.faq');
   }
   public function termsandcondition(){
          return view('client.termsandcondition');
   }
   public function privacypolicy(){
          return view('client.privacypolicy');
   }

   
   
   public function recommendations()
   {
       
      
    $result = DB::select("select* from recommendation ");

    $result1 = DB::select("select* from recom_category ");
    
    // $result = DB::select(DB::raw("SELECT * FROM recommendation ")
    // );


// return $result;
       return view('client.recommendation', compact('result','result1'));
   }

   



   public function recommendation_detail($pk_id)
   {
       
      
    $result = DB::select("select* from recommendation where pk_id = '$pk_id'  ");
    
    
       return view('client.recommendation_detail', compact('result'));
   }



public function blog()
   {
       
       $result = DB::table('blogs')->simplePaginate(5);
    
    
       return view('client.blog',compact('result'));
   }

public function single_blog($pk_id)
   {
       
      $result = DB::select("select * from blogs where pk_id='$pk_id' ");
      
       $result1 = DB::select("select * from blogs  ");
       
         $result2 = DB::select("select * from blog_comments where blog_id ='$pk_id'  ");
    
       return view('client.single-blog',compact('result','result1','result2'));
   }
   
   
   
   
public function comments(Request $request,$pk_id)
   {
      
         $message = $request->input('message');
         $name = $request->input('name');
         $email = $request->input('email');
         $url = $request->input('url');
       
        DB::insert("insert into blog_comments (blog_id,message,name,email,url) values (?,?,?,?,?)", array($pk_id, $message,$name,$email,$url));
       
       Session::flash('message','Your Comment Posted');
        return redirect::back();
   }


   public function searchByCategory_recom($main = '')
   {
    //    $a = "1";
    //    $b = "2";
    //    $c = "0";
    //    $f = "0";
   
       date_default_timezone_set("Asia/Karachi");
       $date = date('Y-m-d');
       $result = [];
       $d = [];
   
       $result = DB::select(DB::raw("SELECT * FROM recommendation WHERE recommendation.category = :value   ") , array(
           
           
           'value' => $main,
       ));
   
      
    //   $d = DB::select(DB::raw("SELECT recommendation.pk_id,recommendation.recom_name,recommendation.address,product.thumbnail,product.thumbnail2,discount_table.percentage ,discount_table.start_date,discount_table.end_date FROM product,discount_table WHERE product.main_category = :value and product.SKU=discount_table.sku   and product.status = :value2 and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date')") , array(
   
    //        'value' => $main,
    //        'value2' => $a,
          
    //    ));
       // $d = DB::select("select product.pk_id,product.thumbnail,product.thumbnail2,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and product.sub_category = 'Polo' and product.discount_status = '1'  and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1' and (product.v_product_status = '2' or product.v_product_status = '0')");
   
       $result1 = DB::select("select * from recom_category");
       return view('client.recommendation', compact('result',  'result1', 'main'));
   }
   
    public function contact(Request $request)
    {
        $note = $request->input('note');
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');

        $data = array(
            'customer_name' => $name,
            'email' => $email,
            'note' => $note,
            'subject' => $subject,

        );
        Mail::send('contact_us', $data, function ($message) use ($email)
        {

            $message->from('info@thefoodpharmacy.pk', 'The Food Pharmacy');

            $message->to('thefoodpharmacyapp@gmail.com')
                ->subject('Contact Us mail');

        });
        return redirect('/contactus')
            ->with('message', 'Your message has been delivered successfully');
    }



}
