<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Validate\Validate;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function post_register(LoginRequest $request)
    {
        // var_dump($request);die;
        $validate = $request->validated();
        dd($request->all());
    }
}