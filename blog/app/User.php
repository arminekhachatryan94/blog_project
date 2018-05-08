<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function publish(Post $post){
        //$this->posts()->save($post);
        
        $post_id = Post::where('user_id', auth()->id())->count();
        $post_id++;

        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id(),
            'post_id' => $post_id
        ]);
    }
}
