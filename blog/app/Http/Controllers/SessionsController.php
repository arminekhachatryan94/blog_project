<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Auth;

class SessionsController extends Controller
{
    /*
	public function __construct(){
		// $this->middleware('guest')->except('destroy');
		$this->middleware('guest', ['except' => 'destroy']);
        // return redirect('/');
	}

    public function create(){
    	return view('sessions.create');
    }
    */

    /*
    public function loginUser(Request $request){
    	// attempt to authenticate the user

    	if( ! auth()->attempt(request(['email', 'password'])) ){
    		return response()->json([
    			'message' => 'User not found.'
    		], 404);
    	}
        $user = User::find($request->input('email'));

        auth()->login($user);
        return response()->json(['user' => $user], 201);
    }

    public function destroy(){
        try{
    	auth()->logout();

    	return response()->json(['message' => 'Logged out'], 201);
        }
        catch( Exception $e ){
            return response()->json(['message' => $e], 401);
        }
    }
    */

    public function loginUser(Request $request){
        $this->validate($request, [
            // 'name' => 'required',
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
            'name' => Auth::user()->name
        ], 200);
    }
}
