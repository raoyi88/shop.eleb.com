@extends('header')
@section('content')
        <table class="table">
            <tr>
                <th>用户名：</th>
                <th>价格：</th>
                <th>下单时间：</th>
                <th>收货人电话：</th>
                <th>收货人姓名：</th>
                <th>收货地址</th>
                <th>状态：</th>
                <th>操作：</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->getname->username}}</td>
                    <td>{{ $order->getgoods->goods_price }}</td>
                    <td>{{$order->getgoods->created_at}}</td>
                    <td>{{ $order->tel }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $address }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a href="{{ route('order.show',$order) }}" class="btn btn-success">查看</a>
                        @if($order->status==="待发货")
                            <a href="{{ route('order.edit',$order) }}" class="btn btn-primary">发货</a>
                            {{ method_field('PATCH') }}
                            @elseif($order->status==="待确认")
                            <form action="{{ route('order.destroy',[$order]) }}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-info">完成</button>
                            </form>
                        @endif
                        <form action="{{ route('order.destroy',[$order]) }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger">取消</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </table>
        <a href="{{route('CountOrder')}}" class="btn btn-success">本店订单统计</a>
@endsection