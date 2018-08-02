<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Shop_Categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function index(Request $request){
//        $shopModel = new Shop();
//        if ($request->has('name')){
//            $shopModel->where('name','like','%'.$request->has('name').'%');
//        }
//        if ($request->has('min') && $request->has('max')){
//            $min = $request->get('min');
//            $max = $request->get('max');
//            $shopModel->whereBetween('price',[$min,$max]);
//        }
//        $shops=Shop::all();
//        $shops->appends(['name'=>$name,'min'=>$min,'max'=>$max])->links();
//        return view('shop.index',compact('shops'));
        $shops=Shop::all();
        return view('shop.index',compact('shops'));
    }
    public function create(){
        $categories=Shop_Categories::all();
        return view('shop.create',compact('categories'));
    }
    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required|max:20',
            'email'=>'required|email|unique:users',
            'password'=>'required|max:30|confirmed',
            'password_confirmation'=>'required|max:30',
            'logo'=>'required',
            'shop_rating'=>'required',
            'shop_name'=>'required|max:20',
            'qisong'=>'required',
            'peisong'=>'required',
            'gonggao'=>'required',
            'youhui'=>'required'
            ],[
            'name.required'=>"用户名不能为空",
            'name.max'=>"用户名过长",
            'email.required'=>"邮箱不能为空",
            'email.email'=>"请输入正确的邮箱格式",
            'email.unique'=>"此邮箱已被注册",
            'password.required'=>"密码不能为空",
            'password.max'=>"密码过长",
            'password_confirmation.required'=>"请输入确认密码",
            'password.confirmed'=>"两次密码不一致",
            'logo.required'=>"请选择店铺图片",
            'shop_rating.required'=>"请输入店铺评分",
            'shop_name.required'=>"请填写店铺名",
            'shop_name.max'=>"店铺名过长",
            'qisong.required'=>"请填写起送金额",
            'peisong.required'=>"请填写配送费用",
            'gonggao.required'=>"请填写店面公告",
            'youhui.required'=>"请填写优惠信息"
        ]);
        $storage = Storage::disk('oss');
        $fileName = $storage->putFile('shop', $request->logo);
        $filename=$request->file('logo')->store('shop_img','uploads');
        $data=([
            'shop_category_id'=>$request->input('shop_category_id'),
            'shop_name'=>$request->input('shop_name'),
            'shop_img'=>$storage->url($fileName),
            'shop_rating'=>$request->input('shop_rating'),
            'brand'=>$request->input('brand'),
            'on_time'=>$request->input('zhun'),
            'fengniao'=>$request->input('fengniao'),
            'bao'=>$request->input('bao'),
            'piao'=>$request->input('piao'),
            'zhun'=>$request->input('zhunzhun'),
            'start_send'=>$request->input('qisong'),
            'send_cost'=>$request->input('peisong'),
            'notice'=>$request->input('gonggao'),
            'discount'=>$request->input('youhui'),
            'status'=>$request->input('status')
        ]);
        try{
            DB::beginTransaction();
            $shop=Shop::create($data);
            User::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=>bcrypt($request->input('password')),
                'shop_id'=>$request->input('shop_category_id'),
                'status'=>$request->input('status'),
                'shop_id'=>$shop->id
            ]);
            DB::commit();
            session()->flash('success','注册完成,请等待审核通过后登陆');
            return redirect()->route('login');
        }catch (\Exception $exception){
            DB::rollBack();
        }
        return redirect(url('shop'));
    }
    public function show(Shop $shop){
        return view('shop.show',compact('shop'));
    }
    public function edit(Shop $shop){
        $categories=Shop_Categories::all();
        return view('shop.edit',compact('categories','shop'));
    }
    public function update(Request $request,Shop $shop){
        $file=$request->input('logo');
        $data=([
            'shop_category_id'=>$request->input('shop_category_id'),
            'shop_name'=>$request->input('shop_name'),
            'shop_img'=>$filename,
            'shop_rating'=>$request->input('score'),
            'brand'=>$request->input('brand'),
            'on_time'=>$request->input('zhun'),
            'fengniao'=>$request->input('fengniao'),
            'bao'=>$request->input('bao'),
            'piao'=>$request->input('piao'),
            'zhun'=>$request->input('zhunzhun'),
            'start_send'=>$request->input('qisong'),
            'send_cost'=>$request->input('peisong'),
            'notice'=>$request->input('gonggao'),
            'discount'=>$request->input('youhui'),
            'status'=>$request->input('status')
        ]);
        if ($file){
            $filename=$file->store('shop_img');
            $data['logo']=$filename;
        }
        $shop->update($data);
        return redirect(url('shop'));
    }
    public function destroy(Shop $shop){
        $shop->delete();
        return redirect(url('shop'));
    }

    public function getShops(){
        $shops = Shop::all();
        return response()->json(['status'=>1,'msg'=>'success','data'=>$shops]);
    }

    public function getShop($id){
        $shop = Shop::where('id',$id)->first();
        if ($shop){
            return response()->json(['status'=>1,'msg'=>'success','data'=>$shop]);
        }
        return response()->json(['status'=>0,'msg'=>'fail','data'=>[]]);

    }

}
