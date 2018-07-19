@extends('default')
@section('content')
    <div class="container">
        <form action="{{ route('user.store') }}" method="post" class="form-group">
            {{ csrf_field() }}
           用户名: <input type="text" name="name" class="form-control"> <br>
            密码: <input type="password" name="password" class="form-control"> <br>
            邮箱: <input type="email" name="email" class="form-control">
            商铺:
            <select  name="shop_id">
                @foreach($shops as $shop)
                    <option  value="{{ $shop->id }}" >{{ $shop->shop_name }}</option>
                @endforeach
            </select> <br>
            是否是管理员:
               <label><input type="radio" name="status" value="1">是</label>
               <label><input type="radio" name="status" value="0">不是</label> <br>
            <input type="submit" value="添加" class="btn btn-info">
        </form>
    </div>
@endsection