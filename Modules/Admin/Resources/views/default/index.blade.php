@extends('admin::layouts.master')

@section('htmlheader_title')
    Admin management
@endsection

@section('main-content')

    @include('admin::default.filter')

    {!! $table !!}
@endsection
