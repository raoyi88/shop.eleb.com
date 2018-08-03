<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function index(){
        if (Auth::check()){
            return redirect('shop');
        }
            return view('sessions.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'email'=>'required|email|max:255',
            'password'=>'required',
            'captcha'=>'required|captcha'
        ],[
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式错误',
            'email.max'=>'超出邮箱格式',
            'password.required'=>'密码不能为空',
            'captcha.required'=>"验证码不能为空",
            'captcha.captcha'=>"验证码错误"
        ]);
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            if (Auth::user()->status){
                session()->flash('success',"欢迎回来!");
                return redirect(route('user.index'));
            }else{
                session()->flash('danger',"你的账号还未通过审核");
                return redirect('session');
            }

        }else{
            session()->flash('danger',"请确认用户名及密码重新登录");
           return redirect()->back();
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('session.index')->with('success',"注销成功");
    }
}
