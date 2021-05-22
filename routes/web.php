<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/faq', function () {
    return view('faq');
})->name('faq');
Route::get('/internet-deals', function () {
    return view('internet-deals');
})->name('internet-deals');
Route::get('/all-deals', function () {
    return view('all-deals');
})->name('all-deals');
Route::get('/internet-for-business', function () {
    return view('internet-for-business');
})->name('internet-for-business');
Route::get('/mobile-deals', function () {
    return view('mobile-deals');
})->name('mobile-deals');
Route::get('/mobile-for-business', function () {
    return view('mobile-for-business');
})->name('mobile-for-business');
Route::get('/work-from-home-deals', function () {
    return view('work-from-home-deals');
})->name('work-from-home-deals');
Route::get('/tv-deals', function () {
    return view('tv-deals');
})->name('tv-deals');
Route::get('/tv-deals-1', function () {
    return view('tv-deals-1');
})->name('tv-deals-1');
Route::get('/tv-deals-2', function () {
    return view('tv-deals-2');
})->name('tv-deals-2');
Route::get('/product-page', function () {
    return view('product-page');
})->name('product-page');
Route::get('/product-page-1', function () {
    return view('product-page-1');
})->name('product-page-1');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
