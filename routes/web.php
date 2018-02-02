<?php
Route::get('/', 'SiteController@showHome');

Route::auth();
Route::get('logout', 'Auth\LoginController@logout');

Route::get('subscribe', 'SubscribeController@showSubscribe');
Route::post('subscribe', 'SubscribeController@showSubscribe');

Route::get('{slug}', 'SiteController@showPost');
