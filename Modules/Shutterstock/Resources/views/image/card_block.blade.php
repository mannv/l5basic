<div class="panel panel-default">
    <div class="panel-heading">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8 text-bold">
                    <a target="_blank"
                       href="https://www.shutterstock.com/search?searchterm={{$data['name']}}">{{$data['name']}}</a>
                </div>
                <div class="col-md-4 text-right">
                    <i class="fa fa-plus fa-lg text-green" cid="{{$data['id']}}"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        @if(empty($data['images']))
            <div class="row">
                <div class="thumbnail col-md-3 text-center">
                    <i class="fa fa-image fa-2x"></i>
                    <img src="" alt="" class="hidden">
                </div>
                <div class="col-md-8">
                    <input type="text" name="image[{{$data['id']}}][]" class="form-control">
                </div>
                <div class="col-md-1 text-right">
                    <i class="fa fa-minus"></i>
                </div>
            </div>
        @else
            @foreach($data['images'] as $image)
                <div class="row {{$image['status'] == \Modules\Shutterstock\Repositories\ShutterstockRepository::STATUS_REJECT ? 'reject-image' : ''}}">
                    <div class="thumbnail col-md-3 text-center">
                        <i class="fa fa-image fa-2x hidden"></i>
                        <a href="{{shutterstock_thumbnail($image['shutterstock_id'])}}" data-toggle="lightbox">
                            <img src="{{shutterstock_thumbnail($image['shutterstock_id'])}}" alt="">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <input @if($image['downloaded']) readonly @endif type="text" name="image[{{$data['id']}}][]"
                               value="{{$image['shutterstock_url']}}"
                               class="form-control">
                    </div>
                    <div class="col-md-1 text-right">
                        @if($image['status'] == \Modules\Shutterstock\Repositories\ShutterstockRepository::STATUS_PENDING)
                            <i title="delete" class="fa fa-minus"></i>
                        @endif
                        @if($image['status'] == \Modules\Shutterstock\Repositories\ShutterstockRepository::STATUS_APPROVE)
                            <i title="approve" class="fa fa-thumbs-up text-green"></i>
                        @endif
                        @if($image['status'] == \Modules\Shutterstock\Repositories\ShutterstockRepository::STATUS_REJECT)
                            <i title="reject" class="fa fa-thumbs-down text-red"></i>
                        @endif
                        @if($image['downloaded'])
                            <i title="downloaded" class="fa fa-download text-green"></i>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
        <div id="card_image_{{$data['id']}}"></div>
    </div>
</div>