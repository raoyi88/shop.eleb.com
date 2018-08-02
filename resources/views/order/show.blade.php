@extends('header')
@section('content')
<div class="container">
    <table class="table">
        <tr>
            <th>商品名：</th>
            <th>数量：</th>
            <th>价格:</th>
        </tr>
        @foreach($goods as $good)
        <tr>
            <td>{{ $good->goods_name }}</td>
            <td>{{ $good->amount }}</td>
            <td>{{ $good->goods_price }}</td>
        </tr>
            @endforeach
    </table>
</div>
@endsection