@extends('default')
@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>登录</h5>
            </div>
                @include('_errors')
            <div class="panel-body">
                <form method="POST" action="{{ route('session.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">邮箱：</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <label>验证码:</label>
                        <input id="captcha" class="form-control" name="captcha" >
                        <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">

                    </div>
                    <button type="submit" class="btn btn-primary">登录</button>
                </form>
                <hr>
                <p>
                    <a href="{{ route('shop.create') }}">我要开店</a>
                </p>
            </div>
        </div>
    </div>

@endsection