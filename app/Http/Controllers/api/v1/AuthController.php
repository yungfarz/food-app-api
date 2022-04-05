<?php

namespace App\Http\Controllers\api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /** 
     * Register Method
    */

    public function register (Request $request) {

          // Validate Data From input
          $field = $request->validate([

                 'name'     => 'required|min:4',
                 'email'    => 'required:email',
                 'password' => 'required:min:8',
           ]);
          
           // Create User
           $user = User::create([
                 'name'     => $field['name'],
                 'email'    => $field['email'],
                 'password' => bcrypt($field['password']),  
           ]);

           $token = $user->createToken('foodAppToken')->accessToken;

           return response()->json(['token' => $token], 200);


    }

    public function login(Request $request) {
          // Validate Data inpur
          $field = $request->validate([
                'email'     => 'required|string',
                'password'  => 'required|string',
          ]);

          // Check If is Email is used
          $user = User::where('email', $field['email'])->first();

          // Check Password
          if($user || auth()->attempt($field['password'])){
               
            $token = $user->createToken('foodAppToken')->accessToken;
            return response([
                  
                  'token'   => $token,
                  
            ], 200);


          }
          else {
           
            return response([ 'message' => 'bad creds' ], 401);
          }


    }
    
}
