@extends('default')
@section('content')
<div class="container">
    <table class="table">
        <tr>
            <a href="{{ route('shop.create') }}">添加店铺</a>
        </tr>
        <tr>
            <th>所属分类</th>
            <th>店铺名称</th>
            <th>店铺图片</th>
            {{--<th>评分</th>--}}
            {{--<th>是否品牌</th>--}}
            {{--<th>是否准时送达</th>--}}
            {{--<th>是否蜂鸟配送</th>--}}
            {{--<th>是否保标记</th>--}}
            {{--<th>是否提供发票</th>--}}
            {{--<th>是否准标记</th>--}}
            {{--<th>起送金额</th>--}}
            {{--<th>配送费</th>--}}
            {{--<th>店面公告</th>--}}
            {{--<th>优惠信息</th>--}}
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($shops as $shop)
            <tr>
                <td>{{ $shop->shop_category_id }}</td>
                <td>{{ $shop->shop_name }}</td>
                <td>
                    <img src="{{ $shop->logo() }}" alt="" width="100px">
                </td>
                <td>{{ $shop->status?"上线":"下线" }}</td>
                <td>
                    <a href="{{ url("shop",[$shop->id]) }}" class="btn btn-primary">查看</a>
                    <a href="{{ route('shop.edit',[$shop]) }}" class="btn btn-info">修改</a>
                    <form method="post" action="{{ route('shop.destroy',[$shop]) }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection