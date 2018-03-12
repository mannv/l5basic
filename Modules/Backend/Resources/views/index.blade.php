@extends('adminlte::page')

@section('htmlheader_title')
    Title
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Example box</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <h1>Hello World {{module_path('Backend')}}</h1>

                        <p>
                            This view is loaded from module: {!! config('backend.name') !!}
                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
    </div>
@endsection