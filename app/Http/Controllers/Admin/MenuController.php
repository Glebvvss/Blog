<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class MenuController extends Controller {

	public function getManager() {
		$menu = DB::table('menu')->orderBy('position', 'asc')->get();
		return view('admin.index-components.menu', [
			'menu' => $menu
		]);
	}

}