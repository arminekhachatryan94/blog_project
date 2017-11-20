<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\User;
use App\Mail\Welcome;

class RegistrationController extends Controller
{
    public function create(){
    	return view('registration.create');
    }

    public function store(){
    	// validate the form
    	$this->validate(request(), [
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|confirmed'
    	]);

    	// create & save user
    	$user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

    	// sign them in
    	auth()->login($user);

        \Mail::to($user)->send(new Welcome($user));

    	// redirect to home page
    	return redirect()->home();
    }
}
