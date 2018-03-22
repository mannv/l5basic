<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            @if(session()->has(\App\Http\Constant::SUCCESS_KEY))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    {{ session()->get(\App\Http\Constant::SUCCESS_KEY) }}
                </div>
            @endif

            @if(isset($errors) && $errors->hasBag())

                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    <ul>
                        @foreach($errors->getBag('default')->getMessages() as $name => $error)
                            @foreach($error as $msg)
                                <li>{{$msg}}</li>
                            @endforeach
                        @endforeach
                    </ul>
                </div>

            @endif
        </div>
    </div>
</div>