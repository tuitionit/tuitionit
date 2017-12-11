<?php

/**
 * Attendance Management
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-attendances',
], function() {
    Route::group(['namespace' => 'Attendance'], function() {
        /*
         * For DataTables
         */
        Route::post('attendances/get', 'AttendanceTableController')->name('attendances.get');

        /*
         * For Select2
         */
        Route::get('attendances/list', 'AttendanceListController')->name('attendances.list');

        // attendance marking screen
        Route::get('attendances/mark', ['as' => 'attendances.mark', 'uses' => 'AttendanceController@mark']);
        Route::post('attendances/store/{session}', ['as' => 'attendances.store', 'uses' => 'AttendanceController@store']);
        // Route::get('attendances/mark/{session}', ['as' => 'attendances.mark', 'uses' => 'AttendanceController@mark']);

        /**
         * Attendance CRUD
         */
        Route::resource('attendances', 'AttendanceController', ['except' => ['create', 'store']]);
    });
});
