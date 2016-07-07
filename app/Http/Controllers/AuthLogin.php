<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Admin;
class AuthLogin extends Controller
{
   	public function ShowForm()
   	{
   		return view('login.login');
   	}

   	public function login(Request $request)
   	{
   		$this->validate($request, [
   			'email'	=> 'required',
   			'password'	=> 'required',
   		]);

   		$cred = [
	   		'email' => $request->get('email'), 
	   		'password' => $request->get('password')
   		];

   		if(Auth::attempt($cred)){
   			return redirect('articale');
   		}elseif(Auth()->guard('admins')->attempt($cred)){
   			return Auth()->guard('admins')->user();
   		}else{
   			return redirect('login');
   		}
   	}

   	public function logout()
   	{
   		
   		if (Auth()->guard('admins')->check()) {
   			Auth()->guard('admins')->logout();
	   		return redirect('login')->with('status', 'Logout Admins Succesfull');
   		}elseif(Auth::check()){
   			Auth::logout();
	   		return redirect('login')->with('status', 'Logout User Succesfull');
   		}else{
	   		return redirect('login')->with('status', 'Logout');
   		}
   	}


   	public function hello()
   	{

   		if (Auth()->guard('admins')->check()) {
   			return 'admins';
   		}elseif(Auth::check()){
   			return 'user';
   		}else{
   			return 'nothing';
   		}
   	}
}
