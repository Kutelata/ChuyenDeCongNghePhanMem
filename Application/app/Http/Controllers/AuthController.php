<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Driver\Session;
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
        $validator=Validator::make($request->all(),[
            'email'=>'required|string|email',
            'password'=>'required|string',
        ]);
        if($validator->fails()){
            return redirect()->back()->with('error','Login fail please try again!');
        }
        $user = User::where("email",$request->email)->where("password",$request->password)->first();
        $request->session()->put('user',$user);
        if($user!=null){
            if (Session('Cart') != null){
                return redirect()->route('ViewListCart');
            }
            return redirect()->route('index')->with('success','Login success!');
        }
       return redirect()->back()->with('error','Email or password is incorect!');
    }

    public function register()
    {
        return view('register');
    }

    public function post_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:user',
            'password' => 'required|string|size:8',
            'confirm_password' => 'required|same:password|string',
            'phone'=>'numeric'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Register failed,please check again!');
        }
        $result = [

            'name' => $request['name'],
            'phone' => $request['phone'],
            'gender' => $request['gender'],
            'email' => $request['email'],
            'password' => $request['password'],
            'birthday' => $request['birthday'],
        ];
        $user=User::create($result);
        return redirect()->route('login')->with('success', 'Register success!');
    }

    public function signout(){
        session()->flush();
        return redirect()->route('index');
    }

    public function selectID(){
        return view('information');
    }

    public function changepassword(Request $request){
        $validator = Validator::make($request->all(), [
            'old_password'=>'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $check=User::where("userId",$request->idUpdate)->where("password",$request->old_password)->first();
        $check2=User::where("userId",$request->idUpdate)->where("password",$request->password)->first();

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Register failed,please check again!');
        }
        if($check==null){
            return redirect()->back()->with('error', 'Register failed,please check again!');
        }if($check2!=null){
            return redirect()->back()->with('error', 'You have already use this password!');
        }
        $userUpdate=[
            'userId'=>$request->idUpdate,
            'password'=>$request->password
        ];
        User::where("userId",$request->idUpdate)->update($userUpdate);
        return redirect()->back()->with('userUpdate','.')->with('success',"Update success!");
    }
}
