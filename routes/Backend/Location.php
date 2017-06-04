<?php

/**
 * Location Management
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-locations',
], function() {
    Route::group(['namespace' => 'Location'], function() {
        // creating locations is done as a part of the institute management
        Route::get('institute/{institute}/locations/new', ['as' => 'institute.locations.new', 'uses' => 'LocationController@create']);
        Route::post('institute/{institute}/locations/store', ['as' => 'institute.locations.store', 'uses' => 'LocationController@store']);

        /**
         * Location CRUD
         */
        Route::resource('locations', 'LocationController', ['except' => ['index', 'create', 'store']]);
    });
});
