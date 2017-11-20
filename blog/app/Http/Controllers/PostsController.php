<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    // dependency injection = passing arguments to a function
    public function index( Posts $posts ) {
        // return session('message');

        // dd($posts);
        $posts = $posts->all();

        // $posts = Post::latest()->filter(request(['month', 'year']))->get();

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

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        session()->flash('message', 'Your post has now been published');

    	// And then redirect to the home page
    	return redirect('/');
    }
}














