<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'email'=>['required','email'],
            'password'=>'required'
        ]);
        $info=$request->only('email','password');

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
