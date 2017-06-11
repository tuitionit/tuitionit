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
        Route::post('batchs/get', 'BatchTableController')->name('batches.get');

        // Status
        Route::get('mark/{status}', 'BatchController@mark')->name('batches.mark')->where(['status' => '[0,1]']);

        /**
         * Batch CRUD
         */
        Route::resource('batches', 'BatchController');
    });
});
