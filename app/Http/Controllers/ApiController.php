<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\User;
use Session;
use Response;
use Socialite;
use App\File;
use App\QuestionAnswer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;




class ApiController extends Controller
{
    public function  assigned_diet()
   {
 
    $username = Session::get('username');
    // return $username;
   
    // $data =DB::table('client_details')
    // ->where('username', $username)
    // ->first()
    // ->pk_id;
$data = DB::select("select* from client_details where username = '$username' ");

    // return $data;
    if (count($data)>0) {
      
// $data= $data[0]->pk_id;
    
    $user = DB::select("select* from client_details where username = '$username' ");
  
    $id = $user[0]->pk_id;
}else{
    return response()->json("login first please!...");
}

    $assigned = DB::select("select* from assigned_diet_plan_to_user where user_id='$id'  ");
 
    if(count($assigned)>0){

    $dietplan_id=  $assigned[0]->diet_plan_id;
   
    $dietplan = DB::select("select* from dietplan where pk_id='$dietplan_id'");

    $sunday = DB::select("select* from sunday where dietplan_id='$dietplan_id'  ");
  
    $monday = DB::select("select* from monday where dietplan_id='$dietplan_id'  ");
    
    $tuesday = DB::select("select* from tuesday where dietplan_id='$dietplan_id'  ");
  
    $wednesday = DB::select("select* from wednesday where dietplan_id='$dietplan_id'  ");

    $thursday = DB::select("select* from thursday where dietplan_id='$dietplan_id'  ");

    $friday = DB::select("select* from friday where dietplan_id='$dietplan_id' ");
  
    $saturday = DB::select("select* from saturday where dietplan_id='$dietplan_id' ");
  }
    else
    {
        return response()->json("No diet assigned!...");
    }
   
    return Response::json([
    'Monday'=>$monday,
    'Tuesday'=>$tuesday,
    'Wednesday'=>$wednesday,
    'Thursday'=>$thursday,
    'Friday'=>$friday,
    'Saturday'=>$saturday,
    'Sunday'=>$sunday]);
   }
   
   
   
    public function  all_diet()
   {
 
    $assigned = DB::select("select* from assigned_diet_plan_to_user  ");
 
    if(count($assigned)>0){
 
   
    $dietplan = DB::select("select* from dietplan ");

    $sunday = DB::select("select* from sunday  ");
  
    $monday = DB::select("select* from monday  ");
    
    $tuesday = DB::select("select* from tuesday  ");
  
    $wednesday = DB::select("select* from wednesday  ");

    $thursday = DB::select("select* from thursday  ");

    $friday = DB::select("select* from friday ");
  
    $saturday = DB::select("select* from saturday  ");
  }
    else
    {
        return response()->json("No diet assigned!...");
    }
   
    return Response::json([
        'assigned'=>$assigned,  
    'Monday'=>$monday,
    'Tuesday'=>$tuesday,
    'Wednesday'=>$wednesday,
    'Thursday'=>$thursday,
    'Friday'=>$friday,
    'Saturday'=>$saturday,
    'Sunday'=>$sunday]);
   }

  


   public function product_list_api() {
  
      $result = DB::select("select* from product where (v_product_status='2' or v_product_status='0') and status = '1' ");
       
    return Response::json([
        'Products'=>$result 
   
    ]);
    
     }


     public function category() {
  
        $result = DB::select("select* from main_category ");
         
      return Response::json([
          'category'=>$result 
     
      ]);
      
       }


       public function sub_category() {
  
        $result = DB::select("select* from sub_category ");
         
      return Response::json([
          'sub_category'=>$result 
     
      ]);
      
       }

       public function users() {
  
        $result = DB::select("select* from client_details ");
         
      return Response::json([
          'users'=>$result 
     
      ]);
       }
   
   
}
