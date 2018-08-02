@extends('default')
@section('content')
    <form action="{{ route('shopcategory.update',[$shopcategory]) }}" method="post" class="btn form-control" enctype="multipart/form-data">
        <table class="table">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <tr>
                <td>
                    <td>分类名称:</td>
                     <td><input type="text" name="name" value="{{ $shopcategory->name }}"></td>
            </tr>
            <tr>
                <td>
                    <img src="{{ $shopcategory->img }}" width="100px">
                </td>
            </tr>
            <tr>
                <td>分类图</td>
                <td>
                    <input type="file" name="img">
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