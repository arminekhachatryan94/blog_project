<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
class SettingsController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
    
    public function index(){
    	$user = auth()->user();
    	return view('settings.index', compact('user'));
    }
    public function name(){
    	$this->validate(request(), [
    		'name' => 'required',
    		'password' => 'required'
    	]);
    	
    	$user = User::find(auth()->user()->id);
    	/*
    	if( bcrypt($user->password) == request('password') ){
    		// $user->name = request('name');
    		// $user->save();
    		session()->flash('message', 'Name successfully changed');
    	}*/
    	//
    	
    	if( ! auth()->attempt(request(['password'])) ){
    		return back()->withErrors([
    			'message' => 'Incorrect password.'
    		]);
    	}
    	if( auth()->attempt(request(['name', 'password'])) ){
    		return back()->withErrors([
    			'message' => "Couldn't change name. You entered the same name."
    		]);
    	}
    	$user = User::find(auth()->user()->id);
    	$user->name = request('name');
    	$user->save();
    	session()->flash('message', 'Name successfully changed');
    	// return request('name');
    	
    	return redirect('settings');
    }
    public function email(){
    	$this->validate(request(), [
    		'email' => 'required|email',
    		'password' => 'required'
    	]);
    	if( ! auth()->attempt(request(['password'])) ){
    		return back()->withErrors([
    			'message' => 'Incorrect password.'
    		]);
    	}
    	if( auth()->attempt(request(['email', 'password'])) ){
    		return back()->withErrors([
    			'message' => "Couldn't change email. You entered the same email."
    		]);
    	}
    	$user = User::find(auth()->user()->id);
    	$user->email = request('email');
    	$user->save();
    	session()->flash('message', 'Email successfully changed');
    	// return request('email');
    	
    	return redirect('settings');
    }
    public function password(){
        $oldpassword = request('oldpassword');
        $password = request('password');
    	$this->validate(request(), [
    		'oldpassword' => 'required',
    		'password' => 'required|confirmed'
    	]);
        if( ! auth()->attempt(['password' => request('oldpassword')]) ){
                return back()->withErrors([
                'message' => 'Incorrect password.'
            ]);
        }
        if( $oldpassword == $password ){
            return back()->withErrors([
                'message' => "Couldn't change password. You entered the same password as your old one."
            ]);
        }
        
        $user = User::find(auth()->user()->id);
        $user->password = bcrypt(request('password'));
        $user->save();
        session()->flash('message', 'Password successfully changed.' );
        return redirect('settings');
        
    }
}