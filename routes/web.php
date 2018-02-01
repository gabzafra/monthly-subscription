<?php
Route::get('/', 'SiteController@showHome');

Route::auth();
Route::get('logout', 'Auth\LoginController@logout');

Route::get('{slug}', 'SiteController@showPost');
