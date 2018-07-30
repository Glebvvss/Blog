<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\Eloquent\User;
use Validator;
use Hash;
use Auth;
use Mail;

class AuthController extends Controller {

	public function login(Request $request) {
		$validator = Validator::make($request->all(), [
			'email' => 'required|email',
			'password' => 'required'
		]);        

		$request->flashOnly('email');

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		}        

		$validator->after(function($validator) use ($request) {
			if ( !Auth::attempt(['email' => $request->email, 'password' => $request->password]) ) {
				$validator->errors()->add('password', 'Incorrect email or password!');
			}
		});

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		}

		return redirect('/');
	}

	public function logout() {
		if ( Auth::check() ) {
			Auth::logout();
		}
		return redirect('/');
	}

	public function registration(Request $request) {        
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'email' => 'required|email',
			'password' => 'required',
			'confirm_password' => 'required',
		]);

		$request->flashOnly(['name', 'email']);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		}        

		$validator->after(function($validator) use ($request) {
			if ( $request->password !== $request->confirm_password ) { 
				$validator->errors()->add('password', 'Passwords does not match!');
			}
		});

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		}

		$user = new User();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->role_id = 2;
		$user->password = Hash::make($request->password);
		$user->save();

		return redirect('/login');
	}

	public function forgetPassword(ForgetPasswordRequest $request) {
		$newPassword = str_random(12);
		$newPasswordHash = Hash::make($newPassword);
		$user = User::where('email', '=', $request->email)->update(['password' => $newPasswordHash]);

		Mail::send('emails.new_password', array('password' => $newPassword), function($message) {
			$message->to($request->email)->subject('Your new password.');
		});
	}

	public function changePassword(ChangePasswordRequest $request) {    
		$newPasswordHash = Hash::make($request->newPassword);
		User::where('email', '=', $request->email)->update(['password' => $newPasswordHash]);
	}
}
