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
Route::middleware('role')->get('/home', 'HomeController@index')->name('home');
Route::get('/inicio', 'HomeController@inicio')->name('inicio');
Route::post('/formulario-contacto-propiedades', 'InicioController@contactoController')->name('formulario-contacto');
Route::get('/leads', 'HomeController@leads')->name('leads');
Route::middleware('role')->prefix('users')->group(function () {
    Route::get('/', 'UserController@index')->name('users');
    Route::get('/create', 'UserController@create');
    Route::post('/store', 'UserController@store');
    Route::get('/edit/{user}', 'UserController@edit');
    Route::post('/update/{user}', 'UserController@update');
    Route::post('/destroy', 'UserController@destroy');
});
Route::middleware('role')->prefix('ejercicios')->group(function () {
    Route::get('/', 'EjercicioController@index')->name('ejercicios');
    Route::get('/create', 'EjercicioController@create');
    Route::post('/store', 'EjercicioController@store');
    Route::get('/edit/{user}', 'EjercicioController@edit');
    Route::post('/update/{user}', 'EjercicioController@update');
    Route::post('/destroy', 'EjercicioController@destroy');
});
Route::middleware('role')->prefix('rutinas')->group(function () {
    Route::get('/', 'RutinaController@index')->name('rutinas');
    Route::get('/create', 'RutinaController@create');
    Route::post('/store', 'RutinaController@store');
    Route::get('/edit/{user}', 'RutinaController@edit');
    Route::post('/update/{user}', 'RutinaController@update');
    Route::post('/destroy', 'RutinaController@destroy');
});
