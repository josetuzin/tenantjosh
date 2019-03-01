<?php

use Illuminate\Http\Request;

Route::domain('tenantjosh.devel')->group(function () { 
  
    // Landing Page Routes
    Route::get('/', function () {
        return view('welcome');
    });
    
    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    
    // Catch All Route
    Route::any('{any}', function () {
        abort(404);
    })->where('any', '.*');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
// Authentication Web Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    
// Password Reset Routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');