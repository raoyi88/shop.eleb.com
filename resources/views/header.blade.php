@extends('default')
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('shopcategory.index') }}">分类列表</a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('artivity') }}">活动列表</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ route('shop.index') }}">店铺列表 <span class="sr-only">(current)</span></a></li>
                    <li><a href="{{ route('user.index') }}">用户列表</a></li>
                </ul>
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('menucategory.index') }}">菜品分类列表</a>
                </div>
                <div class="navbar-header">
                    <a href="{{ route('menu.index') }}" class="navbar-brand">菜品列表</a>
                </div>
                <div class="navbar-header">
                    <a href="{{ route('event.index') }}" class="navbar-brand">活动</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">用户信息 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            {{--<li>--}}
                                {{--<form action="{{ route('newpassword') }}" method="post">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<button class="btn btn-link">修改密码</button>--}}
                                {{--</form>--}}
                            {{--</li>--}}
                            <li>
                                <a href="{{ route('newpassword') }}">修改密码</a>
                            </li>
                            <li><a href="{{ route('order.index') }}">订单</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-link">注销</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>

