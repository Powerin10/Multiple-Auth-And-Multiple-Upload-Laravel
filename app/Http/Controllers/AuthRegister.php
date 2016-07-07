<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class AuthRegister extends Controller
{
	public function ShowForm()
	{
		return view('login.register');
	}

	public function register(Request $request)
	{
		$this->validate($request, [
			'name'	=> 'required',
			'email'	=> 'required|email',
			'password'	=> 'required',
		]);
	
		$register = User::create($request->all());

		return redirect('login')->with('status', 'Data Sucecessfully');		
	}
}
