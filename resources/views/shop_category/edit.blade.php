@extends('default')
@section('content')
    <form action="{{ route('shopcategory.update',[$shop_Categories]) }}" method="post" class="btn form-control" enctype="multipart/form-data">
        <table class="table">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <tr>
                <td>
                    分类名称:<input type="text" name="name" value="{{ $shop_Categories->name }}">
                </td>
            </tr>
            <tr>
                <td>
                    <img src="{{ $shop_Categories->logo() }}" width="100px">
                </td>
            </tr>
            <tr>
                <td>分类图</td>
                <td>
                    <input type="file" name="logo">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="修改">
                </td>
            </tr>
        </table>
    </form>
@endsection