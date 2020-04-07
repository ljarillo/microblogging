<?php

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
    return view('index');
})->name('site.home');

Route::get('/tweet', function () {
    return view('tweet');
})->name('site.tweet');

Route::get('/tweer/{id}/delete', function () {
    return view('delete');
})->name('site.delete');

Route::get('/hashtags/{hashtag}', function () {
    return view('index');
})->name('site.hashtags');
