@extends('shutterstock::layouts.master')
@section('main-content')
    @if(empty($data))
        <p class="lead">No data</p>
    @else
        <div style="padding-bottom: 20px">
            <a class="btn btn-{{$type == 'pending' ? 'primary' : 'default'}}"
               href="{{route('review.index', ['type' => \Modules\Shutterstock\Repositories\ShutterstockRepository::STATUS_PENDING])}}"
               role="button">
                <i class="fa fa-image"></i> Chỉ những ảnh đang chờ duyệt
            </a>
            <a class="btn btn-{{$type == '' ? 'primary' : 'default'}}" href="{{route('review.index')}}" role="button">
                <i class="fa fa-image"></i> Tất cả
            </a>
        </div>

        @foreach($data as $topic)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="panel-title">{{$topic['name']}}</h3>
                        </div>
                        <div class="col-md-6" style="text-align: right">
                            <i class="fa fa-chevron-down"></i>
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

        .thumbnail img {
            height: 80px !important;
        }

        .ajax-link {
            cursor: pointer;
        }

        .lds-ellipsis {
            display: inline-block;
            position: relative;
            width: 64px;
            height: 10px;
        }

        .lds-ellipsis div {
            position: absolute;
            width: 11px;
            height: 11px;
            border-radius: 50%;
            background: greenyellow;
            animation-timing-function: cubic-bezier(0, 1, 1, 0);
        }

        .lds-ellipsis div:nth-child(1) {
            left: 6px;
            animation: lds-ellipsis1 0.6s infinite;
        }

        .lds-ellipsis div:nth-child(2) {
            left: 6px;
            animation: lds-ellipsis2 0.6s infinite;
        }

        .lds-ellipsis div:nth-child(3) {
            left: 26px;
            animation: lds-ellipsis2 0.6s infinite;
        }

        .lds-ellipsis div:nth-child(4) {
            left: 45px;
            animation: lds-ellipsis3 0.6s infinite;
        }

        @keyframes lds-ellipsis1 {
            0% {
                transform: scale(0);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes lds-ellipsis3 {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(0);
            }
        }

        @keyframes lds-ellipsis2 {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(19px, 0);
            }
        }


    </style>
@endsection
@section('inner_js')
    <script type="text/javascript">
        $(function () {
            $('.ajax-link').click(function () {
                var id = $(this).attr('cid');
                var action = $(this).attr('at');
                $.ajax({
                    type: 'POST',
                    data: {
                        _token: csrf_token,
                        id: id,
                        action: action
                    },
                    beforeSend: function (jqXHR, settings) {
                        $('#icon_' + id).find('.lds-ellipsis').removeClass('hidden');
                        $('#icon_' + id).find('.ajax-action').addClass('hidden');
                    },
                    success: function (json) {
                        $('#icon_' + id).find('.lds-ellipsis').remove();
                        $('#icon_' + id).find('.ajax-action').remove();
                        $('#icon_' + id).find('.' + json.action).removeClass('hidden');
                    }
                });
            });
        });
    </script>
@endsection
