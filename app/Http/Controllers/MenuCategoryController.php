<?php

namespace App\Http\Controllers;
use App\Models\MenuCategory;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
class MenuCategoryController extends Controller
{
    public function index(){
        $menucategories=MenuCategory::all();
        return view('menucategory.index',compact('menucategories'));
    }
    public function create(){
        return view('menucategory.create');
    }
    public function store(Request $request){
        $id=Auth::user()->shop_id;
        $string=str_random(5);
        MenuCategory::create([
            'name'=>$request->input('name'),
            'shop_id'=>$id,
            'description'=>$request->input('description'),
            'is_selected'=>$request->input('is_selected'),
            'type_accumulation'=>$string
        ]);
        session()->flash('success',"添加菜品分类成功");
        return redirect(route('menucategory.index'));
    }
    public function show($id){
        $menus= DB::select('select goods_name from menus where category_id=?',[$id]);
        return view('menucategory.show',compact('id'),compact('menus'));
    }
    public function edit(MenuCategory $menucategory){
        return view('menucategory.edit',compact('menucategory'));
    }
    public function update(Request $request,$id){
        $is_selected=MenuCategory::where('is_selected',1)->first();
        if ($is_selected && $request->input('is_selected')){
            session()->flash('danger',"商铺中已经设置过默认分类,请确认");
            return redirect()->back();
        }
        $this->validate($request,[
           'name'=>'required|max:20',
            'description'=>'required',
        ],[
            'name.required'=>"分类名不能为空",
            'name.max'=>"分类名过长",
            'description.required'=>"描述不能为空"
        ]);
        $input=$request->except(['_token','_method']);
        $rst = MenuCategory::where('id',$id)->update($input);
        session()->flash('success',"修改成功!");
        return redirect(route('menucategory.index'));
    }
    public function destroy($id){
        $menu=Menu::where('category_id',$id)->first();
        if ($menu){
            session()->flash('danger',"该分类下存在菜品,不能删除!");
            return redirect()->back();
        }
        MenuCategory::where('id',$id)->delete();
        session()->flash('success',"删除成功");
        return redirect(route('menucategory.index'));
    }
}
