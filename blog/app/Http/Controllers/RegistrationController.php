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



        /*
        try {
            $request->validate([
                    'name' => 'required',
                    'email' => 'required|email',
                'password' => 'required'
            ]); // error show up in $errors
        } catch( Exception $e ){
            return response()->json(['errors' => $e], 401 );
        }
            try{
                $name = $request->input('name');
                $email = $request->input('email');
                $password = $request->input('password');
                
                // create & save user
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'api_token' => str_random(60),
                    'password' => bcrypt($password),
                ]);
                // return response()->json($response, 201);
            }
            catch(Illuminate\Database\QueryException $e){
                $error_code = $e->getInfo[1];
                if($error_code == '1062'){
                    self::delete($user);
                    return response()->json([ 'message' => 'duplicate entry problem'], 401);
                }
            }
        // sign them in
        auth()->login($user);

        $response = [
            'message' => 'Thanks so much for signing up!'
        ];
        return response()->json(['response' => $response], 201);
        */

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        $user->save();

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }
}
