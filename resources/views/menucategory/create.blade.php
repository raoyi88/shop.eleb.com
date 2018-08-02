@extends('default')
@section('content')
@include('vendor.ueditor.assets')
    <div class="container">
        <form action="{{ route('menucategory.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>分类名:</label>
                <input type="text" name="name" class="form-control">
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
                <script id="container" name="description" type="text/plain"></script>
            </div>
            <input type="hidden" name="is_selected" value="0">
            <input type="submit" value="确认" class="btn btn-default">
        </form>
    </div>
@endsection