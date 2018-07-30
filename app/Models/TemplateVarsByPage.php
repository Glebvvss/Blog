<?php 

namespace App\Models;

use DB;

/**
 * This class using for get variables per template page from DB
 */
class TemplateVarsByPage {

	private $tableName;

	public function __construct($pageName) {
		$this->tableName = $pageName . '_page';
	}

	public function allTemplateVarsByPage() {
        $rows = DB::table($this->tableName)->get();
        
        $templateVars = [];
        foreach ( $rows as $row ) {
            $templateVars[$row->var_name] = $row->var_value;
        }
        return $templateVars;
	}

	public function templateVar($var_name) {
		$storeVar = DB::table($this->tableName)->where('var_name', '=', $var_name)->first();
        
        if ( !$storeVar ) {
        	return;
        }
        return $storeVar->var_value;
	}

}