<?php

/**
 * Institute Management
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-users',
], function() {
    Route::group(['namespace' => 'Institute'], function() {
        /**
         * Institute CRUD
         */
        Route::resource('institute', 'InstituteController');
    });
});
