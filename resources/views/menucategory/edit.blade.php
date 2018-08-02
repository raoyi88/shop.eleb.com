@extends('default')
@section('content')
    @include('vendor.ueditor.assets')
    <div class="container">
        <div class="container">
            @include('_errors')
                <form  class="form-group" method="post" action="/menucategory/{{ $menucategory->id }}">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}
                    <div class="form">
                       <label>分类名:</label>
                       <input type="text" class="form-control" name="name" value="{{ $menucategory->name }}">
                   </div>
                    <div class="form-group">
                            <label>描述:</label>
                        <script type="text/javascript">
                            var ue = UE.getEditor('container');
                            ue.ready(function() {
                                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                            });
                        </script>

                        <!-- 编辑器容器 -->
                        <script id="container" name="description" type="text/plain">{!! $menucategory->description !!}</script>
                        {{--<textarea name="description" id="" cols="30" rows="10">{!! $menucategory->description !!}</textarea>--}}
                    </div>
                    <div class="form-group">
                        @if($menucategory->is_selected)
                            <label>非默认:</label>
                            <input type="checkbox" name="is_selected" {{ $menucategory->is_selected ? '' : 'checked' }} value="0">
                        @else
                            <label>默认:</label>
                            <input type="checkbox" name="is_selected" {{ $menucategory->is_selected ? 'checked' : '' }} value="1">
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="确认">
                    </div>
                </form>
        </div>
    </div>
@endsection