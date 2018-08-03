@extends('header')
@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <th>活动名：</th>
                <th>报名开始时间：</th>
                <th>报名结束时间</th>
                <th>开奖时间</th>
                <th>活动状态:</th>
            </tr>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ date('Y-m-d',$event->signup_start ) }}</td>
                <td>{{ date('Y-m-d',$event->signup_up) }}</td>
                <td>{{ $event->prize_date }}</td>
                <td>{{ $event->is_prize==0?"未开奖":"已开奖" }}</td>
                <td><a href="{{ route('event.show',[$event]) }}" class="btn btn-success">查看</a></td>
            </tr>
             @endforeach
        </table>
    </div>
@endsection