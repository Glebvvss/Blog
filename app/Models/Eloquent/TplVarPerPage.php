<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class TplVarPerPage extends Model {

    protected $table = 'tpl_vars_per_page';

    public function page() {
    	return $this->belongsTo('App\Models\Eloquent\Page');
    }

}
