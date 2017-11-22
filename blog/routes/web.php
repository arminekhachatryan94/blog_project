<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Task; // import task class

//Route::get('/tasks', 'TasksController@index'); // index is method responsible
//Route::get('/tasks/{task}', 'TasksController@show');




// instead of bind, if you use singleton, no matter how many times you resolve this out of the container, you'll get the same instance
/*App::bind('App\Billing\Stripe', function() {
    return new \App\Billing\Stripe(config('services.stripe.secret'));
});

$stripe = App::make('App\Billing\Stripe');*/
// instead of App::make, resolve or just app also work

// App::instance('App\Billing\Stripe', $stripe);

// dd($stripe);

// dd(resolve('App\Billing\Stripe'));





// no need to type out welcome.blade.php
Route::get('/tasks', function () {
	/*
	$name = 'Jeffrey';
	$age = 31;
    return view('welcome', compact('name', 'age'));
    */
    /*
    return view('welcome')->with('name', 'World');
    */

    /*
    $tasks = [
    	'Go to the store',
    	'Finish my screencast',
    	'Clean the house'
    ];*/

    // laravel's query builder
    //$tasks = DB::table('tasks')->latest()->get();
    $tasks = Task::all();
    // dd($task); // die and dump; equivalent to var_dump() in vanilla php
    return view('tasks.index', compact('tasks'));

});

// separate route to view a specific task
Route::get('/tasks/{task}', function ($id) {
    //$task = DB::table('tasks')->find($id);
    $task = Task::find($id);
    return view('tasks.show', compact('task'));
});




// posts
Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

// tags
Route::get('/posts/tags/{tag}', 'TagsController@index');

// comments
Route::post('/posts/{post}/comments', 'CommentsController@store');

// register
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

// login
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');


// settings
Route::get('/settings', 'SettingsController@index');
Route::post('/settings/name', 'SettingsController@name');
Route::post('/settings/email', 'SettingsController@email');
Route::post('/settings/password', 'SettingsController@password');



// controller => PostsController
// eloquent model => Post
// migration => create_posts_table
// get --> displays
// post --> submits request
// patch --> edit?
// delete --> delete