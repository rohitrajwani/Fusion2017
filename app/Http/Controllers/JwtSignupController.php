<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class JwtSignupController extends Controller
{
    public function signup(Request $request) {
        $username = $request->username;
	$user_type = $request->type;
	$password = $request->password;
	$cnf_password = $request->confirm_pwd;

	$username_exists = \App\User::where('username', $username)->get()->first();

	if (! is_null($username_exists)) {
		return response()->json(['error' => 'username exists'], 500);
	}

	if ($password != $cnf_password) {
		return response()->json(['error' => 'passwords do not match'], 500);
	}

	$user = new \App\User;
	$user->username = $username;
	$user->password = \Hash::make($password);
	$user->user_type = $user_type;

	$user->save();
	
	return response()->json(['success' => 'True'], 200);
    }
}
