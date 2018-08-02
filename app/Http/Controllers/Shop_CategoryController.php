<?php

namespace App\Http\Controllers;

use App\Models\Shop_Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Shop_CategoryController extends Controller
{
    public function create()
    {
//            auth()->user()->is_super_admin;
        return view('shop_category.create');
        //admin  超级管理员,   ,用户  user

        // admin    username  password  email is_super_admin=1

        //shop admin_id
    }

    public function store(Request $request)
    {
//            $filename=$request->file('logo')->store('cate','uploads');
//            Shop_Categories::create([
//                'name'=>$request->input('name'),
//                 'img'=>'/uploads/'.$filename,
//                'status'=>$request->input('status',0)
//            ]);
        $storage = Storage::disk('oss');
        $fileName = $storage->putFile('shop_category', $request->logo);
        Shop_Categories::create([
            'name' => $request->input('name'),
            'img' => $storage->url($fileName),
            'status' => $request->input('status', 0)
        ]);
        return redirect(url('shopcategory'));
    }

    public function index()
    {
        $shopcategories = Shop_Categories::paginate(4);
        return view('shop_category.index', compact('shopcategories'));
    }

    public function edit(Shop_Categories $shopcategory)
    {
        return view('shop_category.edit', compact('shopcategory'));
    }

    public function update(Request $request, Shop_Categories $shopcategory)
    {
        $input = $request->except('img');
        if ($request->hasFile('img')) {
            $filename = $request->file('img')->store('cate', 'uploads');
            $input['img'] = '/uploads/' . $filename;
        }
        $shopcategory->update($input);
        return redirect(url('shopcategory'));
    }

    public function destroy(Shop_Categories $shopcategory)
    {
        $shopcategory->delete();
        return redirect(url('shopcategory'));
    }
}
