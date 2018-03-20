<?php

Route::group(['middleware' => 'web', 'prefix' => 'crawler', 'namespace' => 'Modules\Crawler\Http\Controllers'], function()
{
    Route::get('/', 'CrawlerController@index');
});
