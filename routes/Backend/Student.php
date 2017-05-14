<?php

/**
 * Student Management
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-students',
], function() {
    Route::group(['namespace' => 'Student'], function() {
        /*
         * For DataTables
         */
        Route::post('students/get', 'StudentTableController')->name('students.get');

        // Status
        Route::get('mark/{status}', 'StudentController@mark')->name('students.mark')->where(['status' => '[0,1]']);

        /**
         * Student CRUD
         */
        Route::resource('students', 'StudentController');
    });
});
