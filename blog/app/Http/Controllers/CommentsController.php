<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store( Post $post ){

    	$this->validate(request(), ['body' => 'required|min:2']);

    	// $post->addComment(request('body'));

        $body = request('body');
        $post_id = $post->id;
    	$user_id = $post->user_id;
        $commenter_id = auth()->id();

    	Comment::create([
    		'body' => $body,
    		'post_id' => $post_id,
            'user_id' => $user_id,
            'commenter_id' => $commenter_id
    	]);
    	
    	return back();
    }
}
