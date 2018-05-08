<?php

namespace App;

use App\Tag;
use App\Comment;
// use Carbon\Carbon;
// use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    protected $fillable = [
        'title', 'body'
    ];
    
	public function comments() {
    	return $this->hasMany(Comment::class)->latest();
    }

    public function user() { // $post->user
        return $this->belongsTo(User::class);
    }
    
    /*
    public function addComment($body){    	
    	$this->comments()->create(compact('body'));
    	
    	//Comment::create([
    	//	'body' => $body,
    	//	'post_id' => $this->id
    	//]);
    	
    }

    // query scope
    public function scopeFilter($query, $filters){
        if( isset($filters['month'])){
            if ($month = $filters['month']){
                $query->whereMonth('created_at', Carbon::parse($month)->month);
            }
        }

        if( isset($filters['year'])){
            if ($year = $filters['year']){
                $query->whereYear('created_at', $year);
            }
        }
    }

    public static function archives(){
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')->groupBy('year', 'month')->orderByRaw('min(created_at) desc')->get()->toArray();
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    */
}
