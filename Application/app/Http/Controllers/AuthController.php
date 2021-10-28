<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Validate\Validate;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function post_register(LoginRequest $request)
    {
        $validate = $request->validated();

        $result = User::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'gender' => $request['gender'],
            'email' => $request['email'],
            'password' => $request['password'],
            'birthday' => $request['birthday'],
        ]);

        if ($result) {
            return redirect()->route('register')->with('success', 'Đăng ký thất bại');
        }
        return redirect()->route('login')->with('success', 'Đăng ký thành công');
        // dd($validate);
    }
}
