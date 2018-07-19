<?php

namespace App\Http\Controllers;

use App\Models\Shop_Categories;
use Illuminate\Http\Request;

class Shop_CategoryController extends Controller
{
        public function create(){
            return view('shop_category.create');
        }
        public function store(Request $request){
            $filename=$request->file('logo')->store('logo');
            Shop_Categories::create([
                'name'=>$request->input('name'),
                'img'=>$filename,
                'status'=>$request->input('status')
            ]);
            return redirect(url('shopcategory'));
        }
        public function index(){
            $shopcategories=Shop_Categories::paginate(4);
            return view('shop_category.index',compact('shopcategories'));
        }
        public function edit(Shop_Categories $shop_Categories){
                return view('shop_category.edit',compact('shop_Categories'));
        }
        public function update(Request $request,Shop_Categories $shop_Categories){
                    return 11;
        }
        public function destroy(Shop_Categories $shopcategory){
            $shopcategory->delete();
            return redirect(url('shopcategory'));
        }
}
