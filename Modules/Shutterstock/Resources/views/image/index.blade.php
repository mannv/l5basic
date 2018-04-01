@extends('shutterstock::layouts.master')
@section('main-content')
    {!! Form::open(['url' => route('image.store'), 'method' => 'POST']) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="panel-title">{{$data['name']}}</h3>
                </div>
                <div class="col-md-6" style="text-align: right">
                    <a href="{{route('image.index', ['topic_id' => $data['id']])}}">Chi tiết</a>
                </div>
            </div>
        </div>
        <div class="panel-body" id="card_data">
            @php
                $cards = array_chunk($data['card_with_image'], 2);
            @endphp
            @foreach($cards as $rows)
                <div class="row">
                    @foreach($rows as $item)
                        <div class="col-md-6">
                            @include('shutterstock::image.card_block', ['data' => $item])
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="panel-footer">
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
            <a class="btn btn-default" href="{{route('image.index')}}" role="button">
                <i class="fa fa-chevron-left"></i> Huỷ
            </a>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
@section('inner_css')
    <style type="text/css">
        #card_data .card-header i {
            cursor: pointer;
        }

        #card_data .fa-minus {
            cursor: pointer;
        }
    </style>
@endsection
@section('inner_js')
    <script type="text/javascript">
        function getShutterstockThumnail(url) {
            if (!url) {
                return '';
            }
            var a = document.createElement('a');
            a.href = url;
            if (a.host.indexOf('shutterstock') < 0) {
                return '';
            }
            var arr = a.pathname.split('-');
            var shutterstockId = arr.slice(-1)[0];
            return 'https://thumb7.shutterstock.com/display_pic_with_logo/683398/390443464/thumbnail-' + shutterstockId + '.jpg';
        }

        $(function () {
            $('#card_data').on('click', '.fa-minus', function () {
                $(this).parent().parent().remove();
            });
            $('#card_data').on('change', 'input', function () {
                var divImg = $(this).parent().prev();
                var thumbnail = getShutterstockThumnail($(this).val());
                if (thumbnail.length == 0) {
                    $(divImg).find('i').removeClass('hide');
                    $(divImg).find('img').addClass('hidden');
                    return;
                }
                $(divImg).find('i').addClass('hide');
                $(divImg).find('img').attr('src', thumbnail).removeClass('hidden');
            });
            $('#card_data .fa-plus').click(function () {
                var cid = $(this).attr('cid');
                var html = '<div class="row">\n' +
                    '            <div class="thumbnail col-md-3 text-center">\n' +
                    '                <i class="fa fa-image fa-2x"></i>\n' +
                    '                <img src="" alt="" class="hidden">\n' +
                    '            </div>\n' +
                    '            <div class="col-md-8">\n' +
                    '                <input type="text" name="image[' + cid + '][]" class="form-control">\n' +
                    '            </div>\n' +
                    '            <div class="col-md-1 text-right">\n' +
                    '                <i class="fa fa-minus"></i>\n' +
                    '            </div>\n' +
                    '        </div>';
                $('#card_image_' + cid).append(html);
            });
        });
    </script>
@endsection
