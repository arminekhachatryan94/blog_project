<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function index() {
        $posts = Post::latest()->get();
    	return view('posts.index', compact('posts'));
    }

    public function show(Post $post) {
        // $post = Post::find($id);
    	return view('posts.show', compact('post'));
    }

    public function create() {
    	return view('posts.create');
    }

    public function store(){
    	/*
    	// Create a new post using the request data
    	$post = new Post;
    	$post->title = request('title');
    	$post->body = request('body');

    	// Save it to the database
    	$post->save();
    	*/
    	
    	// won't work if we don't add protected fillable in Post Model
    	// laravel is protecting us from users making changes? all();
    	/* // automatically saves it
    	Post::create([
    		'title' => request('title'),
    		'body' => request('body')
    	]); */

        $this->validate(request(), [
            // can add a pipe and then min, max:10, too
            'title' => 'required',
            'body' => 'required'
        ]);
    	Post::create(request(['title', 'body']));

    	// And then redirect to the home page
    	return redirect('/');
    }
}














