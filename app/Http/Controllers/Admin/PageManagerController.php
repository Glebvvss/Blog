<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TemplateManager;
use App\Models\Eloquent\Page;

class PageManagerController extends Controller {
    
	public function getManager() {
		$pageName = 'index';
		
		$tpl = new TemplateManager($pageName);
		$pageVars = $tpl->getVarsByPageWithTypes();

		$pageList = Page::all();
		return view('admin.index-components.pages', [
			'pageList' => $pageList,
			'pageVars' => $pageVars
		]);
	}

}