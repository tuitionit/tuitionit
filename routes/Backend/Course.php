<?php

/**
 * Course Management
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-courses',
], function() {
    Route::group(['namespace' => 'Course'], function() {
        /*
         * For DataTables
         */
        Route::post('batchs/get', 'CourseTableController')->name('courses.get');

        // Status
        Route::get('mark/{status}', 'CourseController@mark')->name('courses.mark')->where(['status' => '[0,1]']);

        /**
         * Course CRUD
         */
        Route::resource('courses', 'CourseController');
    });
});
