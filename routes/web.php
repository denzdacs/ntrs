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

Route::group(['middleware' => 'guest'], function() {
    Route::resource('/', 'Login');
});

Route::group(['middleware' => 'user'], function() {
    Route::resource('/home', 'Home');
    Route::resource('/operator', 'Operator');
    Route::get('/operator/delete/{id}', 'Operator@destroy');
    Route::resource('/driver-registration', 'DriverRegistration');
    Route::post('/driver-registration/update', 'DriverRegistration@update');
    Route::get('/driver-registration/delete/{id}', 'DriverRegistration@destroy');
    Route::resource('/registration', 'Registration');
    Route::resource('/association', 'Association');
    Route::get('/association/delete/{id}', 'Association@destroy');
    Route::get('/association/view/{id}', 'Association@view');
    Route::post('/association/update', 'Association@update');
    Route::resource('/driver', 'Driver');
    Route::get('/driver-delete/{id}', 'Driver@destroy');
    Route::resource('/route', 'Routes');
    Route::post('/route/update', 'Routes@update');
    Route::get('/route/delete/{id}', 'Routes@destroy');
    Route::resource('/sms', 'SMS');
    Route::resource('/print', 'Printing');
    Route::post('/print-all', 'Printing@printAll');
    Route::post('/print-single', 'Printing@printSingle');
    Route::resource('/autosuggest','AutoSuggestion');
    Route::get('/logout', function() {
        Auth::logout();
        return redirect('/');
    });
});

