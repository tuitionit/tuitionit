<?php

/**
 * Assignment Management
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-assignments',
], function() {
    Route::group(['namespace' => 'Assignment'], function() {
        /*
         * For DataTables
         */
        Route::post('assignments/get', 'AssignmentTableController')->name('assignments.get');

        // Status
        Route::get('assignments/{assignment}/mark/{status}', 'AssignmentController@mark')->name('assignments.mark')->where(['status' => '[0,1]']);

        /**
         * Assignment CRUD
         */
        Route::resource('assignments', 'AssignmentController');
    });
});
