<?php

/**
 * Institute Management
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-users',
], function() {
    Route::group(['namespace' => 'Institute'], function() {
        /*
         * For DataTables
         */
        Route::post('institutes/get', 'InstituteTableController')->name('institutes.get');

        /**
         * Institute CRUD
         */
        Route::resource('institutes', 'InstituteController');
    });
});
