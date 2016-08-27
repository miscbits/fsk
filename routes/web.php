<?php

Route::get('/', 'EventsController@calendar');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::get('register/{token}', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@handleNoToken');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/profile', 'HomeController@index');

Route::resource('events', 'EventsController');
Route::resource('songs', 'SongsController');
Route::resource('users', 'UsersController');
