<?php
Route::get('/', 'SiteController@showHome');

Route::auth();
Route::get('logout', 'Auth\LoginController@logout');

Route::get('subscribe', 'SubscribeController@showSubscribe');
Route::post('subscribe', 'SubscribeController@processSubscribe');

Route::group(['middleware' => 'auth'], function(){
    Route::get('welcome', 'SubscribeController@showWelcome')->middleware('subscribed');

    Route::get('account', 'AccountController@showAccount');
    Route::post('account/subscription', 'AccountController@updateSubscription');
    Route::post('account/card', 'AccountController@updateCard');
    Route::get('account/invoices/{invoice}', 'AccountController@downloadInvoice');
    Route::delete('account/subscription', 'AccountController@deleteSubscription');
});


Route::get('{slug}', 'SiteController@showPost');
