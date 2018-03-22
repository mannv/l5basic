<div class="box box-success box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">{{$caption}}</h3>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        @if(empty($data))
            <p class="lead">
                Không có dữ liệu
            </p>
        @else
            <table class="table table-striped">
                <thead>
                <tr>
                    @foreach($header as $field => $label)
                        <th scope="col">{{$label}}</th>
                    @endforeach
                    @if(!empty($functions))
                        <th scope="col"></th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        @foreach($header as $field => $label)
                            <td>
                                @if(isset($renderCallback[$field]))
                                    {!! $renderCallback[$field]($item[$field]) !!}
                                @else
                                    {{$item[$field]}}
                                @endif
                            </td>
                        @endforeach
                        @if(!empty($functions))
                            <td>
                                @foreach($functions as $index => $func)
                                    <a href="{{route($func['route'], [$func['params']['name'] => $item[$func['params']['field']]])}}">
                                        @if(isset($func['icon']))
                                            <i class="fa fa-{{$func['icon']}}"></i>
                                        @endif
                                        {{$func['text']}}
                                    </a>
                                    @if($index < (count($functions) - 1))
                                        |
                                    @endif
                                @endforeach
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
        <div class="pull-right">
            {{$paginate}}
        </div>
    </div>
</div>