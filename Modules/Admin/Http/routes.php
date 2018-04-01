<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'],
    function () {
        Route::name('admin.')->group(function () {
            Route::resource('/', 'AdminController', [
                'parameters' => ['' => 'id']
            ]);
        });
    });
