<div class="box box-info">
    <!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        {!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Tên', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email address', ['class' => 'control-label']) !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Tìm kiếm', ['class' => 'btn btn-info']) !!}
            <a class="btn btn-default" href="{{route('admin.index')}}" role="button">Quay lại</a>
        </div>
        {!! Form::close() !!}
    </div>

    {{--<form class="form-inline">--}}
        {{--<div class="box-body form-inline">--}}
            {{--<div class="form-group">--}}
                {{--<label for="inputName" class="control-label">Tên</label>--}}
                {{--<input type="text" class="form-control" id="inputPassword3" placeholder="Password">--}}
            {{--</div>--}}
            {{--<div class="form-group form-inline">--}}
                {{--<button type="submit" class="btn btn-info pull-right">--}}
                    {{--<i class="fa fa-search"></i> Tìm kiếm--}}
                {{--</button>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- /.box-body -->--}}
    {{--</form>--}}
</div>