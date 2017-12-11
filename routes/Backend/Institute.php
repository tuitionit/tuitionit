<?php

/**
 * Institute Management for Admin
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-institutes',
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

/**
 * Institute Management for Admin
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-institute',
], function() {
    Route::group(['namespace' => 'Institute'], function() {
        // Institute
        Route::get('institute', 'InstituteController@overview')->name('institute');
        Route::get('institute/edit', 'InstituteController@edit')->name('institute.edit');
        Route::post('institute/update', 'InstituteController@update')->name('institute.update');
    });
});
