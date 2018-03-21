@extends('admin::layouts.master')

@section('htmlheader_title')
    Admin management
@endsection

@section('main-content')
    <h1>Admin</h1>

    <p>
        This view is loaded from module: {!! config('admin.name') !!}
    </p>
@stop
