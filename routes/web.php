<?php

Route::get('/', 'SiteController@showHome');
Route::get('{slug}', 'SiteController@showPost');
