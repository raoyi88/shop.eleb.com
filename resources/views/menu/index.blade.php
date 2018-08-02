@extends('header')
@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <th>名称:</th>
                <th>所属分类:</th>
                <th>价格:</th>
                <th>状态</th>
                <th>操作:</th>
            </tr>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->goods_name }}</td>
                    <td>{{ $menu->getname->name }}</td>
                    <td>{{ $menu->goods_price }}</td>
                    <td>{{ $menu->status??1?"上架":"下架" }}</td>
                    <td>
                        <a href="{{ route('menu.show',[$menu]) }}" class="btn btn-primary">查看</a>
                        <a href="{{ route('menu.edit',[$menu]) }}" class="btn btn-default">修改</a>
                        <form action="{{ route('menu.destroy',[$menu]) }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger">删除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </table>
        <a href="{{ route('menu.create') }}" class="btn btn-primary">添加菜品</a>
    </div>
@endsection