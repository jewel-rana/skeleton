<?php

use Illuminate\Support\Facades\Route;

Route::prefix('category')->group(function() {
    Route::resource('category', 'CategoryController');
});
