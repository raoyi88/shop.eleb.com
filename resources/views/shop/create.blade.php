@extends('header')
@section('content')
<div class="container">
    <form action="{{ route('shop.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputPassword1">店铺名:</label>
            <input type="text" id="exampleInputPassword1" name="shop_name" placeholder="请输入店铺名">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">所属类别:</label>
            <select name="shop_category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name  }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">店铺图片:</label>
            <input type="file" id="exampleInputFile" name="logo">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">店铺评分:</label>
            <input type="number" name="score">
        </div>
            <div>
                是否名牌:
            </div><label>
                <input type="radio" name="brand" id="optionsRadios1" value="1" checked>
                是
            </label>
            <label>
                <input type="radio" name="brand" id="optionsRadios2" value="0">
               否
            </label>

        <div>
            是否准时送达:
        </div><label>
            <input type="radio" name="zhun" id="optionsRadios1" value="1" checked>
            是
        </label>
        <label>
            <input type="radio" name="zhun" id="optionsRadios2" value="0">
            否
        </label>




        <div>
            是否蜂鸟配送:
        </div><label>
            <input type="radio" name="fengniao" id="optionsRadios1" value="1" checked>
            是
        </label>
        <label>
            <input type="radio" name="fengniao" id="optionsRadios2" value="0">
            否
        </label>


        <div>
            是否保:
        </div><label>
            <input type="radio" name="bao" id="optionsRadios1" value="1" checked>
            是
        </label>
        <label>
            <input type="radio" name="bao" id="optionsRadios2" value="0">
            否
        </label>


        <div>
            是否提供发票:
        </div><label>
            <input type="radio" name="piao" id="optionsRadios1" value="1" checked>
            是
        </label>
        <label>
            <input type="radio" name="piao" id="optionsRadios2" value="0">
            否
        </label>


        <div>
            是否准:
        </div><label>
            <input type="radio" name="zhunzhun" id="optionsRadios1" value="1" checked>
            是
        </label>
        <label>
            <input type="radio" name="zhunzhun" id="optionsRadios2" value="0">
            否
        </label>
        <br>
        起送金额:
        <div>
            <input type="number" name="qisong">
        </div>

        配送金额:
        <div>
            <input type="number" name="peisong">
        </div>
        店铺公告:
        <div>
            <textarea name="gonggao"  cols="30" rows="10"></textarea>
        </div>

        优惠信息:
        <div>
            <textarea name="youhui"  cols="30" rows="10"></textarea>
        </div>

        店铺状态:
<div class="container">
    <label>
        <input type="radio" name="status" id="optionsRadios1" value="1" checked>
       上线
    </label>
    <label>
        <input type="radio" name="status" id="optionsRadios2" value="0">
        下线
    </label>
</div>
        <button type="submit" class="btn btn-default">创建</button>
    </form>
</div>
@endsection