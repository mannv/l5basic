@extends('shutterstock::layouts.master')
@section('main-content')
    @if(empty($data))
        <p class="lead">No data</p>
    @else
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
                <div class="panel-body" id="card_data">
                    @php
                        $cards = array_chunk($topic['cards'], 2);
                    @endphp
                    @foreach($cards as $rows)
                        <div class="row">
                            @foreach($rows as $item)
                                <div class="col-md-6">
                                    @include('shutterstock::review.card_block', ['data' => $item])
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif
@endsection
@section('inner_css')
    <style type="text/css">
        #card_data .card-header i {
            cursor: pointer;
        }
        .reject-image {
            background-color: rgba(255, 220, 210, 0.85);
        }
    </style>
@endsection
@section('inner_js')
    <script type="text/javascript">


        $(function () {

        });
    </script>
@endsection
