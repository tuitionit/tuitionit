<?php

/**
 * User Management
 */
Route::group([
    // 'middleware' => 'access.routeNeedsPermission:manage-users',
], function() {
    Route::group(['namespace' => 'Access\User'], function() {
        /*
         * For DataTables
         */
        Route::post('users/get', 'UserTableController')->name('users.get');

        /*
         * For Select2
         */
        Route::get('users/list', 'UserListController')->name('users.list');

        // Status
        Route::get('users/{user}/mark/{status}', 'UserController@mark')->name('users.mark')->where(['status' => '[0,1]']);

        /**
         * User CRUD
         */
        Route::resource('users', 'UserController');
    });
});
