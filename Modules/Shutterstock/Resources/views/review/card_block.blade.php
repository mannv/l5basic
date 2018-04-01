<?php
if ($type == 'pending') {
    $data['images'] = array_filter($data['images'], function ($item) {
        return $item['status'] == \Modules\Shutterstock\Repositories\ShutterstockRepository::STATUS_PENDING;
    });
}
?>
@if(!empty($data['images']))
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="card-header text-bold">
                {{$data['name']}}
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                @foreach($data['images'] as $image)

                    <div class="thumbnail col-md-3 text-center">
                        <div>
                            <a href="{{shutterstock_thumbnail($image['shutterstock_id'])}}" data-toggle="lightbox">
                                <img src="{{shutterstock_thumbnail($image['shutterstock_id'])}}" alt="">
                            </a>
                            <a target="_blank" class="text-center" href="{{$image['shutterstock_url']}}">{{$image['shutterstock_id']}}</a>
                        </div>
                        <div class="text-center" id="icon_{{$image['id']}}">
                            <i title="approve"
                               class="approve fa fa-thumbs-up text-green {{$image['status'] != \Modules\Shutterstock\Repositories\ShutterstockRepository::STATUS_APPROVE ? 'hidden' : ''}}"></i>
                            <i title="reject"
                               class="reject fa fa-thumbs-down text-red {{$image['status'] != \Modules\Shutterstock\Repositories\ShutterstockRepository::STATUS_REJECT ? 'hidden' : ''}}"></i>
                            @if($image['downloaded'])
                                <i title="downloaded" class="fa fa-download text-green"></i>
                            @endif
                            @if($image['status'] == \Modules\Shutterstock\Repositories\ShutterstockRepository::STATUS_PENDING)
                                <div class="ajax-action">
                                    <a cid="{{$image['id']}}"
                                       at="{{\Modules\Shutterstock\Repositories\ShutterstockRepository::STATUS_APPROVE}}"
                                       class="ajax-link">approve</a> | <a
                                            cid="{{$image['id']}}"
                                            at="{{\Modules\Shutterstock\Repositories\ShutterstockRepository::STATUS_REJECT}}"
                                            class="ajax-link">reject</a>
                                </div>
                                <div class="lds-ellipsis hidden"><div></div><div></div><div></div><div></div></div>
                            @endif
                        </div>

                    </div>

                @endforeach
            </div>
        </div>
    </div>
@endif