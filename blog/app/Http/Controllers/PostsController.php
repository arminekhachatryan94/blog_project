<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\User;
use JWTAuth;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    // https://blog.dev/...
    public function getAllPosts() { // works
        $posts = Post::latest()->get();
        // $post_com = array(count($posts));
        foreach ( $posts as $post){
            $post->comments;
            foreach ( $post->comments as $comment ){
                $id = $comment->commenter_id;                
                $comment->user = User::find($id);
            }
            /*
            $posts_com[$i] = [
                'post' => $posts[$i] //,
                //'num_comments' => count(($posts[$i])->comments)
            ];*/
        }
        $response = [
            'posts' => $posts
        ];
        return response()->json($response, 200);
    }

    public function getOnePost($id) { // works
        
        $post = Post::find($id);
        
        if( !$post ){
            return response()->json(['message' =>'not found'], 404);
        }
        
        $post->comments;
        foreach ( $post->comments as $comment ){
            $id = $comment->commenter_id;                
            $comment->user = User::find($id);
        }
        $response = [
            'post' => $post
        ];

        return response()->json($response, 200);
    }

    public function createPost(Request $request){ // works
        $user = JWTAuth::parseToken()->toUser();
        $post = new Post();
        $post->user_id = $request->input('user_id');
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return response()->json(['post' => $post, 'user' => $user], 201);
    }

    public function editPost(Request $request, $id){ // works
        
        $post = Post::find($id);
        
        if ( !$post ){
            return response()->json(['message' => 'not found'], 404);
        }
        
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $post->save();

        return response()->json(['post' => $post], 200);
    }

    public function deletePost($id){ // works
        $post = Post::find($id);
        if ( !$post ){
            return response()->json(['message' => 'not found'], 404);
        }

        $post->delete();
        return response()->json(['message' => 'success']);
    }
}

