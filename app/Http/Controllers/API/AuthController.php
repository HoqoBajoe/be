<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request  $request){
        $request -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user  = User::where('email',$request -> email)->first();
        if(! $user ){
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ],401);
        }
    }
}
