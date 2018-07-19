@extends('header')
@section('content')
<div class="container">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>分类名</th>
            <th>分类图片</th>
            <th>分类状态</th>
            <th>操作</th>
        </tr>
        @foreach($shopcategories as $shopcategory)
            <tr>
                <td>{{ $shopcategory->id }}</td>
                <td> {{ $shopcategory->name }}</td>
                <td>
                    <img src="{{ $shopcategory->logo() }}" width="100px">
                </td>
                <td>{{ $shopcategory->status?"显示":"隐藏" }}</td>
                <td>
                    <a href="{{ route('shopcategory.edit',[$shopcategory]) }}" class="btn btn-primary">编辑</a>
                    <form method="post" action="{{ route('shopcategory.destroy',[$shopcategory]) }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tr>
            <a href="{{ route('shopcategory.create') }}" class="btn btn-info">添加分类</a>
        </tr>
    </table>
    <div class="pull-right">
        {{ $shopcategories->links() }}
    </div>
</div>
@endsection