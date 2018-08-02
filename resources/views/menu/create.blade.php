@extends('default')
@section('content')
    <div class="container">
        <form action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>菜品名:</label>
                <input type="text" class="form-control" name="name">
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
                <input type="number" class="form-control" name="goods_price">
            </div>
            <div class="form-group">
                <label for="">描述</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">商品图片:</label>
                <input type="file" name="logo" class="form-control">
            </div>
            <input type="hidden" name="status" value="1">
            <input type="submit" value="确认添加" class="btn btn-primary">
        </form>
    </div>
@endsection