@extends('header')
@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <th>活动标题：</th>
                <td>{{ $event->title }}</td>
            </tr>
            <tr>
                <th>活动详情：</th>
                <td>{{ $event->content }}</td>
            </tr>
            <tr>
                <th>活动商品：</th>
                <td>{{ $prize->name }}</td>
            </tr>
            <tr>
                <th>商品数量：</th>
                <td>{{ $prize->num }}</td>
            </tr>
            <tr>
                <th>报名人数：</th>
                <td>{{ $event->signup_num }}</td>
            </tr>
            <tr>
                <th>报名截至时间：</th>
                <td>{{ date('Y-m-d',$event->signup_up) }}</td>
            </tr>
            <tr>
                <td>
                @if(!$member)
                    <td><a href="{{ route('baoming',[$event])}}" class="btn btn-success">我要报名</a></td>
                @else
                    <td><button disabled class="btn btn-success">已报名</button></td>
                    @endif
            </tr>
        </table>
    </div>
@endsection