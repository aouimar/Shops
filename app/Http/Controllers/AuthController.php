<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
    	return view('auth.login');
    }

   public function logout() {
 		Auth::logout();
	}
}
