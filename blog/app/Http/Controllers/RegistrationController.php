<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    public function register(Request $request ){
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',            
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = new User([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),            
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        $user->save();

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }
}
