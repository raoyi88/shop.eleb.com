@extends('header')
@section('content')
    <div class="container">
        <table class="table">
            @foreach($menucategories as $menucategory)
            <tr>
                <td>
                    <form action="{{ route('menucategory.show',[$menucategory]) }}" method="get">
                        <input type="hidden" value="{{ $menucategory->id }}">
                        <input type="submit" value="{{ $menucategory->name }}">
                    </form>
                </td>
                <td>
                    <a href="{{ route('menucategory.edit',['id'=>$menucategory->id]) }}" class="btn btn-info">修改</a> &emsp;
                    <form action="{{ route('menucategory.destroy',[$menucategory]) }}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
             @endforeach
        </table>
        <a href="{{ route('menucategory.create') }}" class="btn btn-success">添加</a>
    </div>
@endsection