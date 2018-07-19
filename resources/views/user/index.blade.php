@extends('header')
@section('content')
<div class="container">
    <a href="{{ route('user.create') }}" class="btn btn-success">添加</a>
    <table class="table-bordered">
        <tr>
            <th>ID</th>
            <th>用户名</th>
            <th>邮箱</th>
            <th>是否为管理员</th>
            <th>操作</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td> {{ $user->status?"是":"否" }}</td>
                <td>
                    <a href="{{ route('user.edit',[$user]) }}" class="btn btn-info">修改</a>
                    <a href="" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection