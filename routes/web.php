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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/juegosList', 'JuegosController@list');

Route::post('/juegos', 'JuegosController@add');

Route::put('/juegos', 'JuegosController@edit');

Route::delete('/juegos', 'JuegosController@delete');

Route::post('/modal-add', 'JuegosController@modalAdd');

Route::post('/modal-ver', 'JuegosController@modalVer');

Route::post('/modal-edit', 'JuegosController@modalEdit');