<?php

/**
 * Room Management
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-rooms',
], function() {
    Route::group(['namespace' => 'Room'], function() {
        /**
         * Room CRUD
         */
        Route::resource('rooms', 'RoomController');
    });
});
