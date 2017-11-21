<?php

namespace App;

use App\User;

class Comment extends Model
{
	public function post(){
		return $this->belongsTo(Post::class);
	}

	public function user(){
		return $this->belongsTo(User::class);
	}

	public function commenter(){
		$id = $this->commenter_id;
		$name = User::find(['id'=>$id]);
		return $name[0]->name;
	}
}
