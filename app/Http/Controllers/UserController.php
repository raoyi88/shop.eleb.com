<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return view('user.index',compact('users'));
    }
    public function create(){
        $shops=Shop::all();
        return view('user.create',compact('shops','roles'));
    }
    public function store(Request $request){
        $data=([
            'name'=>$request->input('name'),
            'password'=>bcrypt($request->input('password')),
            'email'=>$request->input('email'),
            'status'=>$request->input('status'),
            'shop_id'=>$request->input('shop_id'),
        ]);
        User::create($data);
        return redirect(url('user'));
    }
    public function edit(User $user){
        $shop=DB::table('shops')->pluck('id');
        return view('user.edit',compact('user','shop'));
    }
    public function destroy (User $user){
        $user->delete();
        return redirect(url('user'));
    }
    public function newpassword(){
        return view('user.newpass');
    }
    public function savenewpass(Request $request){
        $this->validate($request,[
            'oldpassword'=>'required|max:20',
            'newpassword'=>'required|max:20',
            'repassword'=>'required|max:20'
        ],[
            'oldpassword.required'=>"原密码不能为空",
            'oldpassword.max'=>"原密码长度过长",
            'newpassword.required'=>"新密码不能为空",
            'newpassword.max'=>"新密码长度过长",
            'repassword.required'=>"确认密码不能为空",
            'repassword.max'=>"确认密码长度过长"
        ]);
        if ($request->input('newpassword')!=$request->input('repassword')){
            session()->flash('danger',"两次密码不一致");
            return redirect()->back();
        }
        if (!Hash::check($request->input('oldpassword'),Auth::user()->password)){
            session()->flash('danger',"原密码不正确");
            return redirect()->back();
        }
        $user=Auth::user();
        $user->password=bcrypt(request()->input('newpassword'));
        $user->save();
        session()->flash('success',"修改成功");
        return redirect('shop');
    }
}
