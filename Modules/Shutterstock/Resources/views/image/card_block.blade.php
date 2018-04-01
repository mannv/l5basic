<div>
    <div class="card-header">
        <div class="row">
            <div class="col-md-8 text-bold">
                <a target="_blank" href="https://www.shutterstock.com/search?searchterm={{$data['name']}}">{{$data['name']}}</a>
            </div>
            <div class="col-md-4 text-right">
                <i class="fa fa-plus fa-lg text-green" cid="{{$data['id']}}"></i>
            </div>
        </div>
    </div>
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
            <div class="row">
                <div class="thumbnail col-md-3 text-center">
                    <i class="fa fa-image fa-2x hidden"></i>
                    <img src="{{shutterstock_thumbnail($image['shutterstock_id'])}}" alt="">
                </div>
                <div class="col-md-8">
                    <input @if($image['downloaded']) readonly @endif type="text" name="image[{{$data['id']}}][]" value="{{$image['shutterstock_url']}}"
                           class="form-control">
                </div>
                    <div class="col-md-1 text-right">
                        <i class="fa {{$image['downloaded'] ? 'fa-download text-green' : 'fa-minus' }}"></i>
                    </div>
            </div>
        @endforeach
    @endif
    <div id="card_image_{{$data['id']}}"></div>
</div>