<?php

namespace App\Http\Controllers\API;
use App\User;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{


    public $successStatus = 200;

    public function login(Request $request) {
        try{
            $user = Employee::where(['firstName' => request()->firstName,'binCode'=>request()->binCode])->first();
            if (!$user) {
                return response()->json(['error' => 'Unauthorized User Not Existed'], 401);
            }
            // get new token
            $success['token'] =  $user->createToken('AppName')->accessToken;
            // return $user = Auth::user();
            // return token in json response
            return response()->json(['success' => true, 'user'=>$user , 'token' => $success['token']] , 200);
        }catch(\Exception $ex){
            return response()->json(['error' => 'Unauthorized User Not Existed And Error occur'.$ex->getMessage()], 404);
        }

    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function getUser() {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }


}
