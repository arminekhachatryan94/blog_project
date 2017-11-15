<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // query scopes
    public function scopeIncomplete($query){
    	return $query->where('completed', 0);

    }
}
