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
    return view('index');
});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes(['register'=> false]);
Route::get('inscription', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('inscription', 'Auth\RegisterController@register');

Route::get('/billet/new', 'BilletController@create')->name('billet.edit');
Route::resource('/user', 'UserController');
Route::resource('/billet', 'BilletController', [
    'except' => ['create']
]); 

