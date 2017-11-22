<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    public function create(){
    	return view('registration.create');
    }

    public function store(RegistrationForm $form ){
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

        // \Mail::to($user)->send(new Welcome($user));

        // $form->persist();

        // session();
        // request()->session();
        session()->flash('message', 'Thanks so much for signing up');

    	// redirect to home page
    	return redirect()->home();
    }
}
