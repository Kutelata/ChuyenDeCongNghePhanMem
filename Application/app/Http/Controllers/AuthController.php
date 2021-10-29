<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
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
    
    public function post_login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|string|email',
            'password'=>'required|string',
        ]);
        if($validator->fails()){
            return redirect()->back()->with('error','Dang nhap that bai vui long thu lai!');
    
        }
        $user = User::where("email",$request->email)->where("password",$request->password)->first();
        $request->session()->put('user',$user);
        if($user != null){
            return redirect()->route('index')->with('success','Dang nhap thanh cong!');
           
       }
      
       return redirect()->back();
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
            return redirect()->route('login')->with('success', 'Đăng ký thành công');
        }
        return redirect()->route('register')->with('error', 'Đăng ký thất bại');
    }
}
?>