<?php

/**
 * Subject Management
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-subjects',
], function() {
    Route::group(['namespace' => 'Subject'], function() {
        /*
         * For DataTables
         */
        Route::post('subjects/get', 'SubjectTableController')->name('subjects.get');

        // Status
        Route::get('subjects/{subject}/mark/{status}', 'SubjectController@mark')->name('subjects.mark')->where(['status' => '[0,1]']);

        /**
         * Subject CRUD
         */
        Route::resource('subjects', 'SubjectController');
    });
});
