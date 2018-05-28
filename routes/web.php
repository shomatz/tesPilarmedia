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

Route::get('/home', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('Auth.login');
});

Route::POST('/login', 'loginController@authenticate');

Route::get('/master', 'MasterController@index');

Route::get('/master/tabel', 'MasterController@tabel');

Route::get('/master/prov', 'MasterController@prov');

Route::post('/master/save', 'MasterController@save');