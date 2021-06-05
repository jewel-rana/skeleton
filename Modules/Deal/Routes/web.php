<?php

use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->middleware(['auth', 'web'])->group(function() {
    Route::group(['prefix' => 'deal'], function() {
    });
    Route::resource('deal-type', 'DealTypeController');
    Route::resource('deal', 'DealController');
});
