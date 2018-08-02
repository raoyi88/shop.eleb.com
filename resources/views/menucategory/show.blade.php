@extends('header')
@section('content')
<div class="container">
    <table class="table">
        @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->goods_name }}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection