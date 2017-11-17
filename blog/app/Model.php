<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
	// give name of fields we allow to mass assign
	// protected $fillable = ['title', 'body'];

	// opposite of fillable
	// fields you don't allow
	// if we keep this but delete fillable, it'll still work
	protected $guarded = [];
}
