@extends('header')
@section('content')
        <div class="container">
            <form method="post" action="{{ route('shopcategory.store') }}" enctype="multipart/form-data" class="form-group">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">商品分类名</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="请输入分类名称">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">分类图片</label>
                    <input type="file" class="form-control" name="logo" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    是否显示(选中表示显示)
                        <input type="checkbox" name="status" value="1">
                </div>
                <button type="submit" class="btn btn-info">创建</button>
            </form>
        </div>
@endsection