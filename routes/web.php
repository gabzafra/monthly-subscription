<?php
Route::get('/', 'SiteController@showHome');

Route::auth();
Route::get('logout', 'Auth\LoginController@logout');

Route::get('subscribe', 'SubscribeController@showSubscribe');
Route::post('subscribe', 'SubscribeController@processSubscribe');

Route::group(['middleware' => 'auth'], function(){
    Route::get('welcome', 'SubscribeController@showWelcome')->middleware('subscribed');
});


Route::get('{slug}', 'SiteController@showPost');
