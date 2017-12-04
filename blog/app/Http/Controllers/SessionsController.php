<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Auth;

class SessionsController extends Controller
{
    public function loginUser(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        try {
            if( !$token = JWTAuth::attempt($credentials)){
                return response()->json([
                    'error' => 'Invalid Credentials!'
                ], 401);
            }
        } catch(JWTException $e){
            return response()->json([
                'error' => 'Could not create token!'
            ], 500);
        }

        return response()->json([
            'token' => $token,
            'user_id' => Auth::user()->id,
            'firstName' => Auth::user()->firstName,
            'lastName' => Auth::user()->lastName            
        ], 201);
    }
}
