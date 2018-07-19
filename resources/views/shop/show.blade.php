@extends('default')
@section('content')
<div class="container">
    <table class="table">
        <tr>
            <td>分类ID:</td>
            <td>{{ $shop->shop_category_id }}</td>
        </tr>
        <tr>
            <td>商铺名:</td>
            <td>{{ $shop->shop_name }}</td>
        </tr>
        <tr>
            <td>商铺图片:</td>
            <td><img src="{{ $shop->logo() }}" alt="" width="100px"></td>
        </tr>
        <tr>
            <td>商铺名:</td>
            <td>{{ $shop->shop_rating }}</td>
        </tr>
        <tr>
            <td>是否名牌:</td>
            <td>{{ $shop->brand?"是":"否" }}</td>
        </tr>
        <tr>
            <td>是否准时送达:</td>
            <td>{{ $shop->on_time?"是":"否" }}</td>
        </tr>
        <tr>
            <td>是否蜂鸟配送:</td>
            <td>{{ $shop->fengniao?"是":"否" }}</td>
        </tr>
        <tr>
            <td>是否保:</td>
            <td>{{ $shop->bao?"是":"否" }}</td>
        </tr>
        <tr>
            <td>是否提供发票:</td>
            <td>{{ $shop->piao?"是":"否" }}</td>
        </tr>
        <tr>
            <td>是否准:</td>
            <td>{{ $shop->zhun?"是":"否" }}</td>
        </tr>
        <tr>
            <td>起送金额:</td>
            <td>{{ $shop->start_send }}</td>
        </tr>
        <tr>
            <td>配送金额:</td>
            <td>{{ $shop->send_cost }}</td>
        </tr>
        <tr>
            <td>店铺公告:</td>
            <td>{{ $shop->notice }}</td>
        </tr>
        <tr>
            <td>优惠活动:</td>
            <td>{{ $shop->discount }}</td>
        </tr>
        <tr>
            <td>是否上线</td>
            <td>{{ $shop->status?"上线":"下线" }}</td>
        </tr>
    </table>
</div>
@endsection