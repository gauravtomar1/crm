<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class LoginController extends Controller
{
    function login(Request $req)
	{
		
		$user= User::where("email",$req->input('email'))->where("active",1)->get();
		if(count($user) > 0){
		if(Crypt::decrypt($user[0]->password)==$req->input('password') && $user[0]->email)
		{ 
			$req->session()->put('user',$user[0]->name);
			$req->session()->put('user_id',$user[0]->id);
		
			return redirect('dashboard');
		}
		else
		{
			return back()->with('error','something wrong!');
		}
		}
		else{
			return back()->with('error','something wrong!');
		}
	}
	
	 function logout(Request $req)
	{
		
		if($req->session()->get('user'))
		{
			$req->session()->forget('user');
			return redirect('/');
		}
	}
}
