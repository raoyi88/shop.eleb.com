@extends('default')
@section('content')
    <div class="container">
        <form action="{{ route('user.store') }}" method="post" class="form-group">
            {{ csrf_field() }}
           用户名: <input type="text" name="name" class="form-control"> <br>
            密码: <input type="password" name="password" class="form-control"> <br>
            邮箱: <input type="email" name="email" class="form-control">
            <input type="hidden" name="status" value="0">
            <input type="submit" value="注册" class="btn btn-info">

        </form>
    </div>
@endsection