<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'backend', 'namespace' => 'Modules\Backend\Http\Controllers'], function()
{
    Route::get('/', 'IndexController@index');
});
