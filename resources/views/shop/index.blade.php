@extends('header')
@section('content')
<div class="container">
    {{--名称:<input type="text" name="name" id="name">--}}
    {{--最低:<input type="text" name="min" id="min">--}}
    {{--最高:<input type="text" name="max" id="max">--}}
    {{--<button type="button" onclick="search()">搜索</button>--}}
    <table class="table">
        <tr>
            <a href="{{ route('shop.create') }}">添加店铺</a>
        </tr>
        <tr>
            <th>所属分类</th>
            <th>店铺名称</th>
            <th>店铺图片</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($shops as $shop)
            <tr>
                <td></td>
                <td>{{ $shop->shop_name }}</td>
                <td>
                    <img src="{{ $shop->shop_img }}" alt="" width="100px">
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
<script src="/js/jquery-3.2.1.min.js"></script>
<script>
    // $.get('/get_shops',{},function (result) {
    //     console.log(result.data)
    // });

    // function search() {
    //     var name = $("#name").val();
    //     var min = $("#min").val();
    //     var max = $("#max").val();
    //     location.href="/shop?name="+name+"&min="+min+"&max="+max
    // }
</script>
@endsection

