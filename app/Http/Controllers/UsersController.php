<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Hash;

class UsersController extends Controller
{
    public function login()
    {
    	return view('auth.login');
    }
    public function register()
    {
    	return view('auth.register');
    }
    public function save(Request $req)
    {
    	$input = $req->all();
    	// $message = [
    	// 	'name.required' => 'Name必填',
	    //     'email.required' => 'Email必填',
	    //     'password.required' => '密碼必填',
	    //     'password_confirmation.required' => '確認密碼必填',
	    //     'password.same' => '密碼不一致',
	    // ];
    	$rules = [
    		'name' => 'required',
    		'email' => 'required|email|unique:users',
    		'password' => 'required|min:4|same:confirm_pwd',
    		'confirm_pwd' => 'required|min:4'
    	];
    	$validator = Validator::make($input, $rules);
    	if ($validator->fails()) {
    		return back()->withErrors($validator)
    			->withInput();
    	}
    	$user = new User;
    	$cols = ['name', 'email'];
    	foreach ($cols as $key => $value) {
    		$user[$value] = $req[$value];
    	}
    	// $user->name = $req->name;
    	// $user->email = $req->email;
    	$user->password = Hash::make($req->password);
    	$save = $user->save();
    	if ($save) {
    		return back()->with('success', '註冊成功');
    	} else {
    		return back()->with('fail', '已註冊的');
    	}
    }
}
