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


Route::get('/register', 'UserController@create')->name('register');
Route::post('/register', 'UserController@store')->name('register');

Route::resource('log', 'LoginController');


Route::get('/home', 'PostController@create')->name('post');
Route::post('/post', 'PostController@store')->name('post');
Route::post('/coments', 'ComentController@store')->name('coments');

Route::get('home', 'PostController@index');

Route::get('/{user}', 'BiographyController@index');
Route::post('/savebiography', 'BiographyController@savebiography')->name('savebiography');
Route::post('/img/{user_id}', 'BiographyController@deleteImage')->name('deletebiography');
Route::get('/accounts/edit', 'UserController@edit');
Route::post('/accounts/edit', 'UserController@update')->name('updateUser');
Route::post('/passsword/reset/', 'PasswordController@update')->name('updatePassword');
