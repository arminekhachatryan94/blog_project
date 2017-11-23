<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    /*
    public function __construct(){
        $this->middleware('guest');
    }

    public function create(){
    	return view('registration.create');
    } */

    public function register(Request $request ){
        /*
        try {
            $result = Emailreminder::create(User(
                'name' => $request->input('email'),
                'email' => $request->input('email'),
                'email' => $request->input('email'),
                'token' => $token,
            ));

        } catch (Illuminate\Database\QueryException $e) {
            return response()->json(['e'=>$e], 401);
        }
        */
        
        $request->validate([
                'name' => 'required',
                'email' => 'required|email',
            'password' => 'required'
        ]); // error show up in $errors

        if( isset($errors) ){
            $response = [
                'errors' => $errors,
            ];
            return response()->json(['response' => $response], 401);
        }
        else{
            try{
                $name = $request->input('name');
                $email = $request->input('email');
                $password = $request->input('password');
                
                // create & save user
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt($password),
                ]);

                // return response()->json($response, 201);
            }
            catch(Illuminate\Database\QueryException $e){
                $error_code = $e->getCode();
                if($error_code == 23000){
                    self::delete($lid);
                    return response()->json([ 'message' => 'duplicate entry problem'], 401);
                }
            }
        }
        // sign them in
        auth()->login($user);

        $response = [
            'message' => 'Thanks so much for signing up!'
        ];
        return response()->json(['response' => $response], 201);
        
    	
        

        






        // \Mail::to($user)->send(new Welcome($user));

        // $form->persist();

        // session();
        // request()->session();
        // session()->flash('message', 'Thanks so much for signing up');

    	// redirect to home page
    	// return redirect()->home();


    }
}
