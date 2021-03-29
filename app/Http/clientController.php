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
        $d = DB::select("select * from product,discount_table where product.sku = discount_table.sku and product.pk_id = '$pk_id' and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1'");



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
            return view('client.single-product', compact('result', 'result1',  'qty'  ,'d'));
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
        $a ="1";
        $b="1";
        $c="3";
       
            $result = DB::select(DB::raw("SELECT * FROM product WHERE product.status = :value2 
            and  product.v_product_status != :value3 and product.v_product_status!= :value4"), array(
                'value2' => $a,
                'value3' => $b,
                'value4' => $c,
            ));



        return view('client.shop', compact('result'));
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
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $d = DB::select("select * from product,discount_table where product.sku = discount_table.sku and product.pk_id = '$pk_id' and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1'");
        if (count($d) > 0) {
            if (session::has('promoPrice')) {
                session()->forget('promoPrice');
            }
            $cart->discount($d[0], $d[0]->pk_id,  $q);
        } else {
            if (session::has('promoPrice')) {
                session()->forget('promoPrice');
            }
            $cart->add($result[0], $result[0]->pk_id,  $q);
        }

        // $cart->discount($result[0],$result[0]->pk_id);
        session()->put('cart', $cart);
        //dd(Session::get('cart'));
        return view('client.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
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

            $result = DB::select("select* from client_details where username = '$username' ");

            if (count($result) > 0) {
                return Redirect::back()->withErrors('Username already Exist');
            } else {

                DB::insert("insert into client_details (fname,lname, username, password ) values (?,?,?,?)", array($request->input('fname'), $request->input('lname'), $request->input('email'), md5($request->input('password'))));


                $username = $request->input('email');
                $password = md5($request->input('password'));
                $result = DB::select("select* from client_details where username = '$username' and password='$password' ");

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

    public function client_login(Request $request)
    {

        $this->validate($request, ['username' => 'required', 'password' => 'required']);
        $username = $request->input('username');
        $password = md5($request->input('password'));
        $result = DB::select("select* from client_details where username = '$username' and password='$password' ");

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



public function add_promo_code(Request $request)

    {

        date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $username = session()->get('username');

        $promo = $request->input('promo');
        $promoCode = DB::select("select* from promo_code where promo_code = '$promo'  and (start_date < '$date' or start_date = '$date') and (end_date > '$date' or end_date = '$date') and min_total <= '$cart->totalPrice' and max_total >= '$cart->totalPrice' and status = '0'");
        if (count($promoCode) > 0) {


            if ($promoCode[0]->discount_type == 'fixed' && $promoCode[0]->discount_for == 'all customers') {
                $user = DB::select("select* from client_details where username = '$username' and promostatus = '0'");
                if (count($user) > 0) {
                    //  $cart->addPromo($cart->totalPrice,$promoCode[0]->discount_amount);
                    $cart->totalPrice = $cart->totalPrice - $promoCode[0]->discount_amount;
                    DB::update("update client_details set promostatus = '1' where username='$username'");
                    session()->put('promoPrice', $cart->totalPrice);
                    return redirect()->back();
                } else {
                    return Redirect::back()->withErrors('promocode cannot be used more than one time');
                }
            }

          
            $promoCodee = DB::select("select* from promo_code where promo_code = '$promo' and discount_for = '$username'  and (start_date < '$date' or start_date = '$date') and (end_date > '$date' or end_date = '$date') and min_total <= '$cart->totalPrice' and max_total >= '$cart->totalPrice' and status = '0'");
       
            if (count($promoCodee) > 0) {
            if ($promoCodee[0]->discount_type == 'fixed' && $promoCodee[0]->discount_for == "$username") {
                $user = DB::select("select* from client_details where username = '$username' and promostatus = '0'");
                if (count($user) > 0) {
                    //  $cart->addPromo($cart->totalPrice,$promoCode[0]->discount_amount);
                    $cart->totalPrice = $cart->totalPrice - $promoCodee[0]->discount_amount;
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





            if ($promoCode[0]->discount_type == 'fixed' && $promoCode[0]->discount_for == 'existing customers') {
                $user = DB::select("select client_details.username, client_details.pk_id, order_table.user_id from client_details, order_table where client_details.username = '$username' and client_details.promostatus = '0' and client_details.pk_id = order_table.user_id");
                if (count($user) > 0) {


                    $cart->totalPrice = $cart->totalPrice - $promoCode[0]->discount_amount;
                    DB::update("update client_details set promostatus = '1' where username='$username'");
                    session()->put('promoPrice', $cart->totalPrice);
                    return redirect()->back();
                } else {
                    return Redirect::back()->withErrors('promocode cannot be used more than one time');
                }
            }
            if ($promoCode[0]->discount_type == 'fixed' && $promoCode[0]->discount_for == 'new customers') {
                $user = DB::select("select client_details.username, client_details.pk_id, order_table.user_id from client_details, order_table where client_details.username = '$username' and client_details.promostatus = '0' and client_details.pk_id != order_table.user_id");
                if (count($user) > 0) {


                    $cart->totalPrice = $cart->totalPrice - $promoCode[0]->discount_amount;
                    DB::update("update client_details set promostatus = '1' where username='$username'");
                    session()->put('promoPrice', $cart->totalPrice);
                    return redirect()->back();
                } else {
                    return Redirect::back()->withErrors('promocode cannot be used more than one time');
                }
            }
            if ($promoCode[0]->discount_type == 'percentage' && $promoCode[0]->discount_for == 'all customers') {
                $user = DB::select("select* from client_details where username = '$username' and promostatus = '0'");
                if (count($user) > 0) {
                    $cart->totalPrice = $cart->totalPrice - (($cart->totalPrice * $promoCode[0]->discount_amount) / 100);
                    DB::update("update client_details set promostatus = '1' where username='$username'");
                    session()->put('promoPrice', $cart->totalPrice);
                    return redirect()->back();
                } else {
                    return Redirect::back()->withErrors('promocode cannot be used more than one time');
                }
            }
            if ($promoCode[0]->discount_type == 'percentage' && $promoCode[0]->discount_for == 'existing customers') {
                $user = DB::select("select client_details.username, client_details.pk_id, order_table.user_id from client_details, order_table where client_details.username = '$username' and client_details.promostatus = '0' and client_details.pk_id = order_table.user_id");

                if (count($user) > 0) {

                    //  $cart->addPromo($cart->totalPrice,$promoCode[0]->discount_amount);
                    // return $cart->totalPrice;
                    $cart->totalPrice = $cart->totalPrice - (($cart->totalPrice * $promoCode[0]->discount_amount) / 100);
                    DB::update("update client_details set promostatus = '1' where username='$username'");
                    session()->put('promoPrice', $cart->totalPrice);
                    return redirect()->back();
                } else {
                    return Redirect::back()->withErrors('promocode cannot be used more than one time');
                }
            }
            if ($promoCode[0]->discount_type == 'percentage' && $promoCode[0]->discount_for == 'new customers') {
                $user = DB::select("select client_details.username, client_details.pk_id, order_table.user_id from client_details, order_table where client_details.username = '$username' and client_details.promostatus = '0' and client_details.pk_id != order_table.user_id");
                if (count($user) > 0) {

                    $cart->totalPrice = $cart->totalPrice - (($cart->totalPrice * $promoCode[0]->discount_amount) / 100);
                    DB::update("update client_details set promostatus = '1' where username='$username'");
                    session()->put('promoPrice', $cart->totalPrice);
                    return redirect()->back();
                } else {
                    return Redirect::back()->withErrors('promocode cannot be used more than one time');
                }
            }
        } else {

            return Redirect::back()->withErrors('invalid promocode');
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
     
        foreach ($products as $product) {
        if (session::has('promoPrice')) {
            $promo = session()->get('promoPrice');
            DB::insert("insert into order_table (user_id,promo_amount,amount, shipment_address_id,username,fname,lname,status) values (?,?,?,?,?,?,?,?)", array($result[0]->pk_id, $promo, $cart->totalPrice, $result1[0]->pk_id, $username,$result1[0]->fname, $result1[0]->lname, $status));
        } else {
            DB::insert("insert into order_table (user_id,amount, shipment_address_id,username,fname,lname,status, vendor_id ) values (?,?,?,?,?,?,?,?)", array($result[0]->pk_id, $cart->totalPrice, $result1[0]->pk_id, $username,$result1[0]->fname, $result1[0]->lname, $status,  $product['item']->vendor_id));
        }
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



        $orderdetail = DB::select("select* from detail_table where  order_id ='$orderid'");

        if (count($ordertracking) > 0)

            return view('client.order_detail', compact('products', 'ordertracking', 'orderdetail', 'ad'));
        else
            return Redirect::back()->withErrors('No Order Exist');
    }

    ///====================.........Coaching Module..........============================//

    public function coaching()
    {

        

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

        $user_id = session()->get('user_id');

        $username = Session::get('username');
        $user = DB::select("select* from client_details where username = '$username' ");
        $user = $user[0]->pk_id;
// return $user;

	  $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required',
    	]);
  	
	  $bank_slip = new File;
	  $bank_slip->name = $request->input('name');
	  $bank_slip->email = $request->input('email');
    $bank_slip->amount = $request->input('amount');
    $bank_slip->package = $request->input('package');

	  $bank_slip->status = 'pending';
	 


	   if ($request->input() != null ){

        $file = $request->file('file');

        // File Details
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();

        // Valid File Extensions
        $valid_extension = array("jpg","jpeg","png");
    
        // 2MB in Bytes
        $maxFileSize = 2097152;

        // Check file extension
        if(in_array(strtolower($extension),$valid_extension)){

          // Check file size
          if($fileSize <= $maxFileSize){
             // File upload location
             // $location = 'images';
             $filename =$this->random_strings(10).'.'.$extension;
          
             $location = 'assets_user/bank_slip' ;
     		// dd($location);
             // Upload file
             $file->move($location,$filename);
            

             Session::flash('message','You Will get email when approved');
          }else{
             Session::flash('message','File too large. File must be less than 2MB.');
          }

        }else{
           Session::flash('message','Invalid File Extension.');
        }

      }
      
	  $bank_slip->file =  $filename;
	  $bank_slip->user_id = $user ;
      // $bank_slip->save();s
    $bank_slip->save();
    $data =  DB::table('bank_slips')->latest('id')->first();
  
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
    $status="0";
    $username = Session::get('username');
    $user = DB::select("select* from client_details where username = '$username' ");
    $id = $user[0]->pk_id;

    $data = DB::select("select* from client_details where pk_id='$id' and payment_status='1' ");
    // return $data;
if(count($data)>0){

    DB::update("update client_details set payment_status='$status' where pk_id = '$id'");

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

public function guestbankSlipSubmit(Request $request)
    {

        
	  $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required',
    	]);
  	
	  $bank_slip = new File;
	  $bank_slip->name = $request->input('name');
	  $bank_slip->email = $request->input('email');
    $bank_slip->amount = $request->input('amount');
    $bank_slip->package = $request->input('package');

	  $bank_slip->status = 'pending';
	 


	   if ($request->input() != null ){

        $file = $request->file('file');

        // File Details
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();

        // Valid File Extensions
        $valid_extension = array("jpg","jpeg","png");
    
        // 2MB in Bytes
        $maxFileSize = 2097152;

        // Check file extension
        if(in_array(strtolower($extension),$valid_extension)){

          // Check file size
          if($fileSize <= $maxFileSize){
             // File upload location
             // $location = 'images';
             $filename =$this->random_strings(10).'.'.$extension;
          
             $location = 'assets_user/bank_slip' ;
     		// dd($location);
             // Upload file
             $file->move($location,$filename);

             Session::flash('message','You Will get an email when approved');
          }else{
             Session::flash('message','File too large. File must be less than 2MB.');
          }

        }else{
           Session::flash('message','Invalid File Extension.');
        }

      }
      
	  $bank_slip->file =  $filename;
	
    $bank_slip->save();
    $data =  DB::table('bank_slips')->latest('id')->first();
  
    return redirect('/guest_coaching');	
   }
   

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
   






}
