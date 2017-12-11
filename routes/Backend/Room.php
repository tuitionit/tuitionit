<?php

/**
 * Room Management
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-rooms',
], function() {
    Route::group(['namespace' => 'Room'], function() {
        // creating locations is done as a part of the institute management
        Route::get('locations/{location}/rooms/new', ['as' => 'locations.rooms.new', 'uses' => 'RoomController@create']);
        Route::post('locations/{location}/rooms/store', ['as' => 'locations.rooms.store', 'uses' => 'RoomController@store']);

        /**
         * Room CRUD
         */
        Route::resource('rooms', 'RoomController');
    });
});
