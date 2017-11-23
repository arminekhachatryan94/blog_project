<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    // https://blog.dev/...

    public function getAllPosts() { // works

        $posts = Post::all();
        $response = [
            'posts' => $posts
        ];
        return response()->json($response, 200);
    }

    public function getOnePost($id) { // works
        
        $post = Post::find($id);
        
        if( !$post ){
            return response()->json(['message' =>'Post not found.'], 404);
        }
        
        $response = [
            'post' => $post
        ];

        return response()->json($response, 200);
    }

    public function createPost(Request $request){ // works
    	
        $post = new Post();
        $post->user_id = $request->input('user_id');
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return response()->json(['post' => $post], 201);
    }

    public function editPost(Request $request, $id){ // works
        
        $post = Post::find($id);
        
        if ( !$post ){
            return response()->json(['message' => 'Post not found.'], 404);
        }
        
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $post->save();

        return response()->json(['post' => $post], 200);
    }

    public function deletePost($id){ // works
        $post = Post::find($id);
        if ( !$post ){
            return response()->json(['message' => 'Post not found.'], 404);
        }

        $post->delete();
        return response()->json(['message' => 'Post successfully deleted.']);
    }
}














