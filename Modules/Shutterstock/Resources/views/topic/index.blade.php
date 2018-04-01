@extends('shutterstock::layouts.master')

@section('htmlheader_title')
    Shutterstock image
@endsection

@section('main-content')
    <a class="btn btn-default" href="{{route('topic.create')}}" role="button">
        <i class="fa fa-plus"></i> Tạo chủ đề mới
    </a>

    @if(!empty($data))
        @foreach($data as $topic)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="panel-title">{{$topic['name']}}</h3>
                        </div>
                        <div class="col-md-6" style="text-align: right">
                            <a href="{{route('image.index', ['topic_id' => $topic['id']])}}">Chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Card name</th>
                            <th>Tổng số ảnh đã kiếm</th>
                            <th>Approve/Reject</th>
                            <th>Downloaded</th>
                        </tr>

                        @foreach($topic['cards'] as $card)
                            <tr>
                                <td>{{$card['name']}}</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        @endforeach
    @endif

@endsection
