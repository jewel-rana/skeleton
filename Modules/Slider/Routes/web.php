<?php

use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->middleware(['auth', 'web'])->group(function() {
    Route::post('slider/add', 'SliderController@add')->name('slider.add');
    Route::resource('slider', 'SliderController');
});
