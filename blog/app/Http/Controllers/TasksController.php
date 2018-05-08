<!--?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{

    // /tasks
    public function index(){
    	$tasks = Task::all();
    	return view('tasks.index', compact('tasks'));
    }

    // GET /tasks/{id}
    // make sure $task matches your route {task} name in web.php
    public function show(Task $task){ // route model binding
    	$task = Task::find($id);
    	//return $task;
    	return view('tasks.show', compact('task'));
    }

    // /tasks/create
    public function create(){
        ;
    }

    // POST /tasks
    public function store(Request $request){
        ;
    }

    // GET /tasks/id/edit
    public function edit($id){
        ;
    }

    // PATCH /tasks/id
    public function update(Request $request, $id){
        ;
    }

    // DELETE /tasks/id
    public function destroy($id){
        ;
    }
}
-->