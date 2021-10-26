<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function post_register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'name.required' => 'Họ tên không để trống',
            'email.required' => 'Email không để trống',
            'password.required' => 'Mật khẩu không để trống',
        ]);
        $request->merge(['password' => bcrypt($request->password)]);
        dd($request->all());
    }
}
