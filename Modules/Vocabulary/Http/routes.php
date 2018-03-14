<?php

Route::group(['middleware' => 'web', 'prefix' => 'vocabulary', 'namespace' => 'Modules\Vocabulary\Http\Controllers'], function()
{
    Route::get('/', 'VocabularyController@index');
});
