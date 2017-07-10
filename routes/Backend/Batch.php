<?php

/**
 * Batch Management
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-batches',
], function() {
    Route::group(['namespace' => 'Batch'], function() {
        /*
         * For DataTables
         */
        Route::post('batches/get', 'BatchTableController')->name('batches.get');

        // Status
        Route::get('mark/{status}', 'BatchController@mark')->name('batches.mark')->where(['status' => '[0,1]']);

        /*
         * Batch Students
         */
        Route::post('batches/{batch}/students/add', 'BatchController@addStudents')->name('batches.students.add');
        Route::delete('batches/{batch}/students/remove', 'BatchController@removeStudents')->name('batches.students.remove');

        /**
         * Batch CRUD
         */
        Route::resource('batches', 'BatchController');
    });
});
