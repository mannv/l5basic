@extends('shutterstock::layouts.master')
@section('contentheader_title')
    Danh sách ảnh cần download
@endsection
@section('main-content')
    @if(empty($data))
        <p class="lead">No data</p>
    @else
        <ol>
        @foreach($data as $item)
            <li>
                <a href="{{$item['shutterstock_url']}}" target="_blank">{{$item['shutterstock_url']}}</a>
            </li>
        @endforeach
        </ol>
    @endif
@endsection
@section('inner_css')
    <style type="text/css">
        a:visited {
            color: black;
        }
    </style>
@endsection
