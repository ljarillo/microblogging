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

Route::get('/tweet', 'TweetController@tweet')->name('tweet.new');
Route::get('/hashtags/{hashtag}', 'HashtagController@index')->name('hashtag.index');
Route::get('/{msg?}', 'TweetController@index')->name('tweet.index');
Route::post('tweet/store', 'TweetController@store')->name('tweet.store');
Route::delete('/tweet/{id}/delete', 'TweetController@destroy')->name('tweet.destroy');
