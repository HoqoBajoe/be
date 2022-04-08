<?php

namespace App\Http\Controllers\API;
use App\Models\User;
use Hash;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request  $request){
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json([
                    'message' => 'Unauthorized'
                ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();


        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'success' => true,
            'message' => 'success',
            'access_token' => $token, 
            'token_type' => 'Bearer'
        ],200);
    }
}
