<?php

/**
 * Location Management
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-locations',
], function() {
    Route::group(['namespace' => 'Location'], function() {
        // creating locations is done as a part of the institute management
        Route::get('institutes/{institute}/locations/new', ['as' => 'institutes.locations.new', 'uses' => 'LocationController@create']);
        Route::post('institutes/{institute}/locations/store', ['as' => 'institutes.locations.store', 'uses' => 'LocationController@store']);

        /**
         * Location CRUD
         */
        Route::resource('locations', 'LocationController', ['except' => ['index', 'create', 'store']]);
    });
});
