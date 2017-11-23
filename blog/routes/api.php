<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('/', ['uses'=>'PostsController@getAllPosts']);
Route::get('/posts', ['uses'=>'PostsController@getAllPosts']);
Route::post('/post', ['uses'=>'PostsController@createPost']);
Route::get('/posts/{post}', ['uses'=>'PostsController@getOnePost']);
Route::put('/posts/{post}', ['uses'=>'PostsController@editPost']);
Route::delete('/posts/{post}', ['uses'=>'PostsController@deletePost']);

/*
// tags
Route::get('/posts/tags/{tag}', 'TagsController@index');

// comments
Route::post('/posts/{post}/comments', 'CommentsController@store');
*/


// register
// Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@register');


// login
// Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@loginUser');
Route::post('/logout', 'SessionsController@destroy');


/*
// settings
Route::get('/settings', 'SettingsController@getInfo');
Route::post('/settings/name', 'SettingsController@name');
Route::post('/settings/email', 'SettingsController@email');
Route::post('/settings/password', 'SettingsController@password');
*/


/*
post -- create new
get -- retrieve info from db
put -- edit / replace old resource with new content
delete -- delete
patch -- update only a part of old resource
*/
