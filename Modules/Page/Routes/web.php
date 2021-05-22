<?php

use Illuminate\Support\Facades\Route;

Route::prefix('page')->group(function() {
    Route::resource('page', 'PageController');
});
