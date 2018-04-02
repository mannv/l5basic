@extends('shutterstock::layouts.master')

@section('htmlheader_title')
    Shutterstock image
@endsection
@section('main-content')
    <div class="box box-success box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Tạo mới chủ đề</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if(Route::currentRouteName() == 'topic.create')
                {!! Form::open(['url' => route('topic.store'), 'method' => 'POST']) !!}
            @else
                {!! Form::model($data ,['url' => route('topic.update', ['id' => $data['id']]), 'method' => 'PUT']) !!}
            @endif
            <div class="form-group">
                {!! Form::label('name', 'Tên chủ đề', ['class' => 'control-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('cards', 'Cards', ['class' => 'control-label']) !!}
                {!! Form::textarea('cards', null, ['class' => 'form-control']) !!}
                <p>Mỗi card trên 1 dòng</p>
            </div>
            <div class="form-group">
                {!! Form::submit('Tạo', ['class' => 'btn btn-success']) !!}
                <a class="btn btn-default" href="{{route('topic.index')}}" role="button">
                    <i class="fa fa-chevron-left"></i> Huỷ
                </a>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
@endsection
