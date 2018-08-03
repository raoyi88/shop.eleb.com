<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class MenuController extends Controller
{
        public function index(){
            $menus=Menu::all();
            return view('menu.index',compact('menus'));
        }
        public function show(Menu $menu){
            return view('menu.show',compact('menu'));
        }
        public function create(){
           $categories=DB::table('menu_categories')->get();
            return view('menu.create',compact('categories'));
        }
        public function store(Request $request){
            $id=Auth::user()->id;
            $storage = Storage::disk('oss');
            $fileName = $storage->putFile('menu', $request->logo);
           Menu::create([
                'goods_name' => $request->input('name'),
                'category_id'=>$request->input('category_id'),
                'goods_price'=>$request->input('goods_price'),
                'shop_id'=>$id,
                'description'=>$request->input('description'),
                'goods_img' => $storage->url($fileName),
                'status' => $request->input('status')
            ]);
           session()->flash('success',"添加成功");
            return redirect(url('menu'));
        }
        public function edit(Menu $menu){
            $categories=MenuCategory::all();
            return view('menu.edit',compact('menu','categories'));
        }
        public function update(Request $request,Menu $menu){
            if ($request->hasFile('goods_img')){
                $storage = Storage::disk('oss');
                $fileName = $storage->putFile('menu', $request->goods_img);
            $menu->update([
                'goods_name' => $request->input('goods_name'),
                'category_id'=>$request->input('category_id'),
                'goods_price'=>$request->input('goods_price'),
                'description'=>$request->input('description'),
                'goods_img' => $storage->url($fileName),
                'status' => $request->input('status')
            ]);
            }else{
                $menu->update([
                    'goods_name' => $request->input('goods_name'),
                    'category_id'=>$request->input('category_id'),
                    'goods_price'=>$request->input('goods_price'),
                    'description'=>$request->input('description'),
                    'status' => $request->input('status')
                ]);
            }

            session()->flash('success',"修改成功");
            return redirect(url('menu'));
        }
        public function destroy(Menu $menu){
            $menu->delete();
            session()->flash('success',"删除成功");
            return redirect(url('menu'));
        }
}
