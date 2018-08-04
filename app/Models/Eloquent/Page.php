<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

    protected $table = 'pages';

    public function tplVarsPerPage() {
    	return $this->hasMany('App\Models\Eloquent\TplVarPerPage');
    }
}
