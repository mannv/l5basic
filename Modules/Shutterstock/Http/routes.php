<?php

Route::group([
    'middleware' => ['web', 'auth'],
    'prefix' => 'shutterstock',
    'namespace' => 'Modules\Shutterstock\Http\Controllers'
], function () {
    Route::get('/', 'ShutterstockController@index');
    Route::resource('topic', 'TopicController', [
        'parameters' => ['topic' => 'id']
    ])->only([
        'index',
        'create',
        'store',
        'edit',
        'update'
    ]);
    Route::resource('image', 'ImageController', [
        'parameters' => ['image' => 'id']
    ])->only([
        'index',
        'store'
    ]);
    Route::resource('review', 'ReviewController', [
        'parameters' => ['review' => 'id']
    ])->only([
        'index',
        'store'
    ]);
    Route::resource('download', 'DownloadController', [
        'parameters' => ['download' => 'id']
    ])->only([
        'index'
    ]);
});
