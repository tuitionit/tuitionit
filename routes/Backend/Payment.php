<?php

/**
 * Payment Management
 */
Route::group([
    'middleware' => 'access.routeNeedsPermission:manage-payments',
], function() {
    Route::group(['namespace' => 'Payment'], function() {
        /*
         * For DataTables
         */
        Route::post('payments/get', 'PaymentTableController')->name('payments.get');

        /**
         * Payment CRUD
         */
        Route::resource('payments', 'PaymentController');
    });
});
