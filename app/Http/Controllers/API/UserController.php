<?php

namespace App\Http\Controllers\API;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;
 
class UserController extends Controller 
{

    public $successStatus = 200;

 
    public function login(){ 

        if(Auth::attempt(['binCode' => request('binCode'), 'firstName' => request('firstName')])){ 
            $user = Auth::user(); 

            $success['token'] =  $user->createToken('AppName')->accessToken; 
            return response()->json(['result' => true, 'token' => $success['token']], $this->successStatus); 
        } else{ 
           return response()->json(['result'=> false, 'status' => 401]); 
        } 
    }


    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }


  
    //  public function register(Request $request) {    
    //  $validator = Validator::make($request->all(), 
    //               [ 
    //               'name' => 'required',
    //               'email' => 'required|email',
    //               'password' => 'required',  
    //              ]);   
    //     if ($validator->fails()) {          
    //        return response()->json(['error'=>$validator->errors()], 401);
    //     }    
    //      $input = $request->all();  
    //      $input['password'] = bcrypt($input['password']);
    //      $user = User::create($input); 
    //      $success['token'] =  $user->createToken('AppName')->accessToken;
    //      return response()->json(['success'=>$success], $this->successStatus); 
    // }
     
    public function getUser() {
         $user = Auth::user();
         return response()->json(['success' => $user], $this->successStatus); 
     }

    // public $successStatus = 200;

    // public function login(Request $request) {
    //     $user = User::where('email', $request->email)->first();
        
    //     if ($user) {
    //         if (Hash::check($request->password, $user->password)) {
    //             return response()->json(['success'] , $this->successStatus);
    //         } else{

    //             return response()->json(['error'] , 404);
    //         }
    //     }    

    // }


}
