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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();
Route::get('/', 'InicioController@index')->name('inicio');

// Backend
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/formulario-contacto-propiedades', 'InicioController@contactoController')->name('formulario-contacto');
Route::prefix('users')->group(function () {
    Route::get('/', 'UserController@index')->name('users');
    Route::get('/create', 'UserController@create');
    Route::post('/store', 'UserController@store');
    Route::get('/edit/{user}', 'UserController@edit');
    Route::post('/update/{user}', 'UserController@update');
    Route::post('/destroy', 'UserController@destroy');
});
