<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index(){
    	$tasks = Task::all();
    	return view('tasks.index', compact('tasks'));
    }

    // make sure $task matches your route {task} name in web.php
    public function show(Task $task){ // route model binding
    	//$task = Task::find($id);
    	//return $task;
    	return view('tasks.show', compact('task'));
    }

}
