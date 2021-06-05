<?php

use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->group(function() {
    Route::post('media/jqupload', 'MediaController@jqUpload')->name('media.jqupload');
    Route::resource('media', 'MediaController');
});
