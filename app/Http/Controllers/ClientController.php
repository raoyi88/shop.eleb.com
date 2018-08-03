<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function create(){
        return view('client.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required | max:20',
            'password'=>'required',
            'captcha'=>'required|captcha'
        ],[
            'name.required'=>"用户名不能为空",
            'name.max'=>"用户名过长",
            'password.required'=>"密码不能为空",
            'captcha.required'=>"验证码不能为空",
            'captcha.captcha'=>"验证码错误"
        ]);
        Client::create([
            'client_name'=>$request->input('name'),
            'password'=>$request->input('password')
            ]);
        session()->flash('success',"注册成功");
        return redirect(url('shopcategory'));
    }
}
