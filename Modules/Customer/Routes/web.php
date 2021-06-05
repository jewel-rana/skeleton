<?php

use Illuminate\Support\Facades\Route;

Route::prefix('customer')->middleware(['auth', 'web'])->group(function() {
    Route::get('/', 'CustomerController@index');
});
