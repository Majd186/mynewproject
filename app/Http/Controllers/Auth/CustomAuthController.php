<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CustomAuthController extends Controller
{
	public function site(){
		return view('site');
	}

	public function adminlogin(){
		return view('auth.admin_login');
	}

	public function checkadminlogin(Request $request){

		// Validate the form data
    	$request->validate([
    		'email' 	=> 'required|email',
    		'password' 	=>	'required|min:6'
    	]);

    	// Attempt to log the user in
    	if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

    		// If successful the redirect their to intended location
    		return redirect()->intended(route('admin.index'));
    	}
    	// If unsuccessful then redirect back to the login with form data
    	return back()->withInput($request->only('email','remember'));
	}
}
