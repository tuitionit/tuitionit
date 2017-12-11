<?php

/**
 * Teacher Management
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-teachers',
], function() {
    Route::group(['namespace' => 'Teacher'], function() {
        /*
         * For DataTables
         */
        Route::post('teachers/get', 'TeacherTableController')->name('teachers.get');

        /**
         * Teacher CRUD
         */
        Route::resource('teachers', 'TeacherController');
    });
});
