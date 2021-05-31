<?php

use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->group(function() {
    Route::post('menu/menuItem/save', 'MenuItemController@save')->name('menuItem.save');
    Route::resource('menuItem', 'MenuItemController')->only(['store', 'update', 'destroy']);
    Route::resource('menu', 'MenuController');
});
