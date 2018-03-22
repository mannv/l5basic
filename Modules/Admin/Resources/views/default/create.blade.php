@extends('admin::layouts.master')

@section('htmlheader_title')
    Create new admin
@endsection

@section('main-content')
    <div class="box box-success box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Tạo admin</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['url' => route('admin.store'), 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Tên', ['class' => 'control-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Tên', ['class' => 'control-label']) !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Mật khẩu', ['class' => 'control-label']) !!}
                {!! Form::text('password', null, ['class' => 'form-control', 'type' => 'password']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('re-password', 'Xác nhận mật khẩu', ['class' => 'control-label']) !!}
                {!! Form::text('re-password', null, ['class' => 'form-control', 'type' => 'password']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Tạo', ['class' => 'btn btn-success']) !!}
                <a class="btn btn-default" href="{{route('admin.index')}}" role="button">Huỷ</a>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
@endsection