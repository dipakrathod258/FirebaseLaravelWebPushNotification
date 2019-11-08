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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/register_credentials', 'HomeController@register_credentials');

Route::get('/booking', 'BookingController@index');
Route::post('/createBooking', 'BookingController@store');
Route::post('/notify', 'BookingController@notify');
