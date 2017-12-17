<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('charts/payments-over-year', 'ChartController@paymentsOverYear')->name('charts.payments-over-year');
