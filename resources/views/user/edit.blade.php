@extends('default')
@section('content')
    <div class="container">
        <form action="{{ route('user.update',[$user]) }}" class="form-group">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
           用户名:  <input type="text" name="name" class="form-control" value="{{ $user->name }}"> <br>
          密码:  <input type="password" name="password" class="form-control"> <br>
            邮箱: <input type="email" name="email" value="{{ $user->email }}" class="form-control"> <br>
            商铺: <select name="shop_id">
                @foreach($shop as $s)
                    <option value="{{ $s->id }}">{{ $s->id }}</option>
                @endforeach
            </select>
        </form>
    </div>
@endsection