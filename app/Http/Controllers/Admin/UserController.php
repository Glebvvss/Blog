<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Eloquent\User;
use App\Models\Eloquent\Role;
use App\Http\Requests\ChangeRoleRequest;

class UserController extends Controller {
    
	public function getManager(Request $request) {		
		if ( trim($request->searchWord) ) {
			$users = User::where('email', 'LIKE', '%'.$request->searchWord.'%')->get();
			$searchWord = $request->searchWord;
		} else {
			$users = User::all()->load('role');
			$searchWord = '';
		}

		$roles = Role::all();
		return view('admin.index-components.users', [
			'searchWord' => $searchWord,
			'users' => $users,
			'roles' => $roles
		]);
	}

	public function changeRole(ChangeRoleRequest $request) {
		$user = User::find($request->idUser);
		$role = Role::where('role', '=', $request->roleName)->first();
		$user->role()->associate($role);
		$user->save();
	}

}
