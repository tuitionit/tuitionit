<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('charts/income-over-year', 'ChartController@incomeOverYear')->name('charts.income-over-year');
Route::get('charts/students-attendance', 'ChartController@studentAttendance')->name('charts.students-attendance');
