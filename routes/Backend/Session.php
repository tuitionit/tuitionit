<?php

/**
 * Session Management
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-sessions',
], function() {
    Route::group(['namespace' => 'Session'], function() {
        /*
         * For DataTables
         */
        Route::post('sessions/get', 'SessionTableController')->name('sessions.get');

        // Status
        Route::get('mark/{status}', 'SessionController@mark')->name('sessions.mark')->where(['status' => '[0,1]']);

        /**
         * Session CRUD
         */
        Route::resource('sessions', 'SessionController');
    });
});
