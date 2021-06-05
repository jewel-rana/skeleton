<?php

use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->middleware(['auth', 'web'])->group(function() {
    Route::prefix('product')->group(function() {
        Route::get('suggest', 'ProductController@suggest')->name('product.suggest');
    });
    Route::resource('product', 'ProductController');
});
