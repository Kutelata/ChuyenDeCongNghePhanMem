<?php

namespace App\Models\Validate;

use Illuminate\Http\Request;

class Validate
{
    public function validateRequire(Request $request) 
    {
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
        return $request;
    }
}
