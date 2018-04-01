<?php

Route::group(['middleware' => 'web', 'prefix' => 'shutterstock', 'namespace' => 'Modules\Shutterstock\Http\Controllers'], function()
{
    Route::get('/', 'ShutterstockController@index');
    Route::resource('topic', 'TopicController');
    Route::resource('image', 'ImageController');
});
