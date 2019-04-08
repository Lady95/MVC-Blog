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

Auth::routes(['register'=> false]);

Route::get('/home', 'HomeController@index')->name('home');

// Registration Routes...
Route::get('inscription', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('inscription', 'Auth\RegisterController@register');
Route::resource('/user', 'UserController');

// Route::get('/inscription', function(){
//     return view('auth.register');
// });

// Route::redirect('/register','/inscription');