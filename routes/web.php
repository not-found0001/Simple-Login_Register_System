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

Route::get('/', 'MemberController@index')->name('index');
Route::get('/login', 'MemberController@login')->name('login');
Route::get('/logout', 'MemberController@logout')->name('logout');
Route::post('/check', 'MemberController@check')->name('check');
Route::get('/registration', 'MemberController@registration')->name('registration');

Route::post('/store', 'MemberController@store')->name('store');
