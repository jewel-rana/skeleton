<?php

use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->middleware(['auth', 'web'])->group(function() {
    Route::resource('user', 'UserController');
});
