@extends('default')
@section('content')
    <div class="container">
        <form action="{{ route('menu.update',[$menu]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label>菜品名:</label>
                <input type="text" class="form-control" name="goods_name" value="{{ $menu->goods_name }}">
            </div>
            <div class="form-group">
                <label>所属分类:</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>菜品价格:</label>
                <input type="number" class="form-control" name="goods_price" value="{{ $menu->goods_price }}">
            </div>
            <div class="form-group">
                <label for="">描述</label>
                <textarea name="description" id="" cols="30" rows="10"
                          class="form-control">{{ $menu->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="">商品原图片:</label>
                <img src="{{ $menu->goods_img }}" alt="" width="70px">
            </div>
            <div class="form-group">
                <label for="">更新商品图片:</label>
                <input type="file" name="goods_img" class="form-control">
            </div>
            <div class="form-group">

                @if($menu->status)
                    <label for="">下架:</label>
                    <input type="checkbox" name="status" value="0">
                @else
                    <label for="">上架:</label>
                    <input type="checkbox" name="status" value="1">
                    @endif
            </div>
            <input type="submit" value="确认修改" class="btn btn-primary">
        </form>
    </div>
@endsection