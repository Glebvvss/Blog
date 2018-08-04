<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Eloquent\User;
use App\Models\Eloquent\Role;

class UserController extends Controller {
    
	public function getManager() {
		$users = User::all()->load('role');
		$roles = Role::all();
		return view('admin.index-components.users', [
			'users' => $users,
			'roles' => $roles
		]);
	}

}
