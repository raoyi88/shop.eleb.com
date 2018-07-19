<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Shop_Categories;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $shops=Shop::all();
        return view('shop.index',compact('shops'));
    }
    public function create(){
        $categories=Shop_Categories::all();
        return view('shop.create',compact('categories'));
    }
    public function store(Request $request){
        $filename=$request->file('logo')->store('shop_img');
        Shop::create([
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
        return redirect(url('shop'));
    }
    public function show(Shop $shop){
        return view('shop.show',compact('shop'));
    }
    public function edit(Shop_Categories $Categories,Shop $shop){
        return view('shop.edit',compact('Categories','shop'));
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
}
