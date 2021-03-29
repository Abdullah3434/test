<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\File;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('jwt.verify', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
      
       

        $email = $request->input('username');
       
    	$validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([ 
                'status' => 'fail',
            'response' => 'email required'], 422);
        }
$result1 = DB::select("select* from users where username  = '$email' ");
// return $result1;
if(count($result1)>0)
{
      $data = array(
             'id' => $result1[0]->id ,
            'name' => $result1[0]->fname ,
             'email' => $result1[0]->username ,
              'phone' => $result1[0]->phone ,
               'city' => $result1[0]->city ,
                'created_at' => $result1[0]->created_at ,
                 'updated_at' => $result1[0]->updated_at ,
                 

        );
        $error= 'password incorrect';
}else
{
    $error= 'email incorrect';
}
      
        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json([
                'status' => 'fail',
                'response' =>$error], 401);
        }
        return response()->json([
            'status' => 'okay',
            
            'response' =>['jwt' =>$token],
            
            'user' =>	$data,
        ], 200);

    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|between:2,100',
            'username' => 'required|string|email|max:100|unique:users',
            'password' => 'required',
            'phone' => 'required|unique:users',
            'city' => 'required|min:3',
        ]);
        
        
        
         $email = $request->input('username');
         $phone = $request->input('phone');
$result = DB::select("select* from users where username = '$email' and phone = '$phone' ");
$result0 = DB::select("select* from users where username = '$email'  ");
$result1 = DB::select("select* from users where phone = '$phone' ");
// return $result1;
if(count($result0)>0)
{
    $error= 'duplicate entry of '.$phone. ' number and '  .$email.   ' email';
}
   
elseif(count($result)>0)
{
    $error= 'duplicate entry of '.$email. ' email';
}

elseif(count($result1)>0)
{
    $error= 'duplicate entry of '.$phone. ' phone';

}else
{
  $error= 'okay';
}
  

        if($validator->fails()){
          $userr = $validator->errors()->toJson();
            return response()->json([
                'status' => 'fail',
                'response' =>   $error,
                
            ], 400);

            // return response()->json($validator->errors()->toJson(), 400);
        }


        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

return response()->json([
'status' => 'okay',
'response' => $user
],201);

 

        return response()->json([
            'status' => 'okay',
            'response' => $user
        ],201);




      
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();

    return response()->json([
        'status' => 'okay',
        'response' => 'User successfully signed out'
        ]);

      
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        
        return response()->json( auth()->user()
            
       
         
           
        
        );
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }


    public function bankSlipSubmit(Request $request)
    {
        // return "dsasd";        
	  $bank_slip = new File;
	  $bank_slip->name = $request->input('name');
	  $bank_slip->email = $request->input('email');
    //   return  $bank_slip->email ;
    $bank_slip->amount = $request->input('amount');
    $bank_slip->package = $request->input('package');
    $bank_slip->user_id = $request->input('user_id');
	  $bank_slip->status = 'pending';
    //   $file = $request->file('file');
    //   $extension = $file->getClientOriginalExtension();
    //   $file = base64_decode( $request->file('file'));
    //   $folderName = '/assets_user/bank_slip/';
     
    //   $safeName = str_random(10).'.'."$extension";
    //   $destinationPath = public_path() . $folderName;
    //   $success = file_put_contents(public_path().'/assets_user/bank_slip/'.$safeName, $file);
      

    // $file = $request->file('file');
    // return $file;
    // if( $request->input('file')){
    //     return  $request->input('file');
    //     $name = time().'.' . explode('/', explode(':', substr($request->file('file'), 0, strpos($request->file('file'), ';')))[1])[1];

    //     \Image::make($request->file('file'))->save(public_path('assets_user/bank_slip/').$name);
    //     $request->merge(['photo' => $name]);

    //     $userPhoto = public_path('assets_user/bank_slip/').$currentPhoto;
    //     if(file_exists($userPhoto)){
    //         @unlink($userPhoto);
    //     }

    // }
    // $file_data = $request->input('file');
    // $file_name = 'image_' . time() . '.png'; //generating unique file name;
 
    // if ($file_data != "") { // storing image in storage/app/public Folder
    //     Storage::disk('/assets_user/bank_slip/')->put($file_name, base64_decode($file_data));
    // }

    $image = $request->input('file'); // image base64 encoded
   



    // $image_extension =$this->random_strings(10).'.'.$extension;
    // $image_extension = $image->getClientOriginalExtension();
    // preg_match("/data:image\/(.*?);/",$image,$image_extension); // extract the image extension
    // $image = preg_replace('/data:image\/(.*?);base64,/','',$image); // remove the type part
    // // return $image;
    // $image = str_replace(' ', '+', $image);
    // $imageName = 'image_' . time() ; //generating unique file name;
    // Storage::disk('/assets_user/bank_slip/')->put($imageName,base64_decode($image));



   $file =  $request->file('payment_slip'); //your base64 encoded data
//    return "sd";
   $file = base64_decode($file);
//    return $file;

          $filename = $this->random_strings(10).'.'.'png';
        
          $location =   public_path() . "/assets_user/bank_slip/" . $filename;
//           // dd($location);
//           // Upload file
        
   
          file_put_contents($location, $filename);
    


// $file = $request->file('file');

// // return $file;

// // File Details
// $filename = $file->getClientOriginalName();
// $extension = $file->getClientOriginalExtension();
// $tempPath = $file->getRealPath();
// $fileSize = $file->getSize();
// $mimeType = $file->getMimeType();


    //  $filename =$this->random_strings(10).'.'.$extension;
  
    //  $location = 'assets_user/bank_slip' ;

    //  $file->move($location,$filename);
        

        
   $bank_slip->file =  $filename;  
  

      $result = DB::select("select* from bank_slips where email = '$bank_slip->email' ");
// return $result;
      if(count($result)>0)
      {
       return response()->json([
           'status' => 'error',
           'response' => 'already  submitted'
           ]);
      }

else{
    $bank_slip->save();

    return response()->json([
        'status' => 'okay',
        'response' => 'bank Slip successfully submitted'
        ]);
}
   

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



   
   public function questionAnswerFormSubmit(Request $request)
   {

    $user = $request->input('user_id');
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
        return response()->json([
            'status' => 'okay',
            'response' => 'Form successfully submitted'
            ]);
       }
       else{
        return response()->json([
            'status' => 'error',
            'response' => 'Form nott successfully submitted'
            ]);
       }
   }

   public function  assigned_diet($id)
   {

    // $username = Session::get('username');
    // $user = DB::select("select* from client_details where username = '$username' ");
    // $id = $user[0]->pk_id;
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

}