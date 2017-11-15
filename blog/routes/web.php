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
    $tasks = DB::table('tasks')->latest()->get();

    // dd($task); // die and dump; equivalent to var_dump() in vanilla php
    return view('tasks.index', compact('tasks'));
});

// separate route to view a specific task
Route::get('/tasks/{task}', function ($id) {
    $task = DB::table('tasks')->find($id);

    return view('tasks.show', compact('task'));
});




