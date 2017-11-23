<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
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
        
        // return response()->json(['message'=>'hello'], 200);
    }

    public function createPost(Request $request){
    	
        $post = new Post();
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return response()->json(['post' => $post], 201);
    }

    public function editPost(Request $request, $id){
        $post = Post::find($id);
        if ( !$post ){
            return response()->json(['message' => 'Post not found.'], 404);
        }
        
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $post->save();
        return response()->json(['post' => $post], 200);
    }

    public function deletePost($id){
        $post = Post::find($id);
        if ( !$post ){
            return response()->json(['message' => 'Post not found.'], 404);
        }

        $quote->delete();
        return response()->json(['message' => 'Post successfully deleted.']);
    }
}














