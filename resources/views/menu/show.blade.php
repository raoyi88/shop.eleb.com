@extends('header')
@section('content')
<div class="container">
    <table class="table">
        <tr>
            <th>菜名:</th>
            <th>所属分类:</th>
            <th>价格:</th>
            <th>描述:</th>
            <th>图片:</th>
        </tr>
        <tr>
            <td>{{ $menu->goods_name }}</td>
            <td>{{ $menu->getname->name }}</td>
            <td>{{ $menu->goods_price }}</td>
            <td>{{ $menu->description }}</td>
            <td><img src="{{ $menu->goods_img }}" alt="" width="50px"></td>
        </tr>
    </table>
</div>
@endsection