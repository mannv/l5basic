<?php

Route::group([
    'middleware' => 'web',
    'prefix' => 'shutterstock',
    'namespace' => 'Modules\Shutterstock\Http\Controllers'
], function () {
    Route::get('/', 'ShutterstockController@index');
    Route::resource('topic', 'TopicController')->only([
        'index',
        'create',
        'store'
    ]);
    Route::resource('image', 'ImageController')->only([
        'index',
        'store'
    ]);
    Route::resource('review', 'ReviewController')->only([
        'index',
        'store'
    ]);
    Route::resource('download', 'DownloadController')->only([
        'index'
    ]);
});
