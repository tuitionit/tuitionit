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
        Route::post('courses/get', 'CourseTableController')->name('courses.get');

        // Status
        Route::get('courses/{course}/mark/{status}', 'CourseController@mark')->name('courses.mark')->where(['status' => '[0,1]']);

        /**
         * Course CRUD
         */
        Route::resource('courses', 'CourseController');
    });
});
