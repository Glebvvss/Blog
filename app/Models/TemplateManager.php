<?php 

namespace App\Models;

use DB;
use App\Models\Eloquent\TplVarPerPage;


class TemplateManager {

    private $pageName;

    public function __construct($pageName = NULL) {
        $this->pageName = $pageName;
    }

    public function getVar($var_name) {
        $templateVar = $this->getVarByNameFromDb($var_name);
        if ( $templateVar ) {
            return $templateVar->var_value;
        }
    }

    private function getVarByNameFromDb($var_name) {
        return DB::table('tpl_vars_per_page')->join('pages', 'tpl_vars_per_page.page_id', '=', 'pages.id')
                                             ->where('var_name', '=', $var_name)
                                             ->where('page_name', '=', $this->pageName)
                                             ->first();
    }

    public function getVarsByPage() {
        $rows = $this->getVarsFromDb();
        return $this->varsToArrayAssocFormat($rows);
    }

    public function getVarsByPageWithTypes() {
        $rows = $this->getVarsFromDb();
        return $this->varsToArrayAssocFormatWithTypes($rows);
    }

    private function getVarsFromDb() {
        return DB::table('tpl_vars_per_page')->join('pages', 'tpl_vars_per_page.page_id', '=', 'pages.id')
                                             ->where('page_name', '=', $this->pageName)
                                             ->get();   
    }

    private function varsToArrayAssocFormat($rows) {
        $templateVars = [];
        foreach ( $rows as $row ) {
            $templateVars[$row->var_name] = $row->var_value;
        }
        return $templateVars;
    }

    private function varsToArrayAssocFormatWithTypes($rows) {
        $templateVars = [];
        foreach ( $rows as $row ) {
            $templateVars[$row->var_name] = [
                'value' => $row->var_value, 
                'type' => $row->var_type
            ];
        }
        return $templateVars;
    }

}