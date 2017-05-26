<?php

/**
 * Teacher Management
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-teachers',
], function() {
    Route::group(['namespace' => 'Teacher'], function() {
        /**
         * Teacher CRUD
         */
        Route::resource('teachers', 'TeacherController');
    });
});
