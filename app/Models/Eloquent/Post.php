<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
 
 	protected $table = 'posts';

 	public function user() {
 		return $this->belongsTo('App\Models\Eloquent\User');
 	}

 	public function comments() {
 		return $this->hasMany('App\Models\Eloquent\Comment');
 	}

}
