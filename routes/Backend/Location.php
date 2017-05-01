<?php

/**
 * Location Management
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-users',
], function() {
    Route::group(['namespace' => 'Location'], function() {
        /**
         * Location CRUD
         */
        Route::resource('locations', 'LocationController');
    });
});
