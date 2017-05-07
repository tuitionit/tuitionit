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

        // Status
        Route::get('mark/{status}', 'InstituteController@mark')->name('institutes.mark')->where(['status' => '[0,1]']);

        /**
         * Institute CRUD
         */
        Route::resource('institutes', 'InstituteController');
    });
});
