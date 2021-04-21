<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
  
    public function login(Request $request ){
       
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
    
      if( !Auth::attempt( $validated ) ){
            
           return response(['message'=>'Invalid login credentials']);
        }
        
       $accessToken = Auth::user()->createToken('remember_token')->accessToken;
       return response(['user'=> Auth::user(), 'remember_token'=> $accessToken]);

    }
    public function logout(){
        Auth::logout();
    }

 


}