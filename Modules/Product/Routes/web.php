<?php

use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/product')->group(function() {
    Route::resource('product', 'ProductController');
});
