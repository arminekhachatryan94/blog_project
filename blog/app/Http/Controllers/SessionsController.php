<!--?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
	public function __construct(){
		// $this->middleware('guest')->except('destroy');
		$this->middleware('guest', ['except' => 'destroy']);
        // return redirect('/');
	}

    public function create(){
    	return view('sessions.create');
    }

    public function store(){
    	// attempt to authenticate the user
    	if( ! auth()->attempt(request(['email', 'password'])) ){
    		return back()->withErrors([
    			'message' => 'Please check your credentials and try again.'
    		]);
    	}

    	// if not, redirect back

    	// if so, sign them in
    	return redirect()->home();
    	// redirect to home page
    }

    public function destroy(){
    	auth()->logout();

    	return redirect()->home();
    }
}
-->