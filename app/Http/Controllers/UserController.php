<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class UserController extends Controller
{
    public function view_login()
    {
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('auth.login');
    }

    public function login(Request $request){
        
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required'
        ]);
        
               
            $info=$request->only('name','password');
            if(Auth::attempt($info)){
                return redirect()->route('home');
            }
            else{
                return redirect()->back()->withErrors('Authentification Failed');
            }

    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
