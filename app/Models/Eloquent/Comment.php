<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public function user() {
    	return $this->belongsTo('App\Models\Eloquent\User');
    }

    public function post() {
    	return $this->belongsTo('App\Models\Eloquent\Post');
    }
}
