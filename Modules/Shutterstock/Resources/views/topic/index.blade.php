@extends('shutterstock::layouts.master')

@section('htmlheader_title')
    Shutterstock image
@endsection

@section('main-content')
    <div style="padding-bottom: 20px">
        <a class="btn btn-default" href="{{route('topic.create')}}" role="button">
            <i class="fa fa-plus"></i> Tạo chủ đề mới
        </a>
    </div>

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
                            <th>Pending/Approve/Reject</th>
                            <th>Downloaded</th>
                        </tr>

                        @foreach($topic['cards'] as $card)
                            @php
                                $pending = array_filter($card['images'], function($item){
                                    return $item['status'] == \Modules\Shutterstock\Repositories\ShutterstockRepository::STATUS_PENDING;
                                });
                            $approve = array_filter($card['images'], function($item){
                                    return $item['status'] == \Modules\Shutterstock\Repositories\ShutterstockRepository::STATUS_APPROVE;
                                });
                            $reject = array_filter($card['images'], function($item){
                                    return $item['status'] == \Modules\Shutterstock\Repositories\ShutterstockRepository::STATUS_REJECT;
                                });
                            $downloaded = array_filter($card['images'], function($item){
                                    return $item['downloaded'];
                                });
                            $countApprove = count($approve);
                            $countDownload = count($downloaded);
                            @endphp
                            <tr class="{{$countApprove > $countDownload ? 'miss-download' : ''}} {{empty($card['images']) ? 'miss-image' : ''}}">
                                <td>{{$card['name']}}</td>
                                <td>{{count($card['images'])}}</td>
                                <td>
                                    {{ count($pending) }} / <strong class="text-green">{{ $countApprove }}</strong> /
                                    <strong class="text-red">{{ count($reject) }}</strong>
                                </td>
                                <td>
                                    @if($countDownload > 0)
                                        <strong class="text-green">{{$countDownload}}</strong>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        @endforeach
    @endif

@endsection
@section('inner_css')
    <style type="text/css">
        tr.miss-download {
            background-color: #f39c12;
            color: white;
        }
        tr.miss-image {
            background-color: gray;
            color: white;
        }
    </style>
@endsection
