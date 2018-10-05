<?php

Route::get('/', function () {
    return view('welcome');
});


Route::get('send', 'OneSignalController@send');
Route::post('send', 'OneSignalController@sendAllNotification')->name('send.all');
Route::get('register', 'OneSignalController@register')->name('register');
Route::get('list', 'OneSignalController@list')->name('list');