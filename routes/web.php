<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/adminlogin', 'AdminLoginController@AdminLogin')->name('adminlogin');
Route::get('/client', 'ClientController@Client')->name('client');
Route::get('/admin-home', 'AdminHomePageController@AdminHomePage')->name('AdminHomePage')->middleware('admin');
Route::get('/clientDetails/{id}', 'ClientController@ClientDetails')->name('ClientDetails');
Route::get('/clientInfo/{id}', 'AdminHomePageController@ClientInfo')->name('ClientInfo');
Route::post('/clientDelete', 'AdminHomePageController@ClientDelete')->name('ClientDelete');
Route::post('/clientUpdate', 'AdminHomePageController@ClientUpdate')->name('ClientUpdate');
Route::post('/clientAdd', 'AdminHomePageController@CreateClient')->name('CreateClient');
Route::post('/adminlog', 'AdminLoginController@LogInSubmit')->name('LogInSubmit');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
