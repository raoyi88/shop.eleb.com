<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return view('user.index',compact('users'));
    }
    public function create(){
        $shops=Shop::all();
        return view('user.create',compact('shops'));
    }
    public function store(Request $request){
        $data=([
            'name'=>$request->input('name'),
            'password'=>$request->input('password'),
            'email'=>$request->input('email'),
            'status'=>$request->input('status'),
            'shop_id'=>$request->input('shop_id'),
        ]);
        User::create($data);
        return redirect(url('user'));
    }
    public function edit(User $user,Shop $shop){
        return view('user.edit',compact('user','shop'));
    }
}
