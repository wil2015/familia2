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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::post('/pesquisa', 'FamiliaController@pesquisa') -> name('familia.pesquisa');;

Route::resource('familias', 'FamiliaController');

Route::resource('pessoas', 'PessoaController');

Route::resource('programaSocials', 'Programa_SocialController');

Route::resource('programaSocials', 'Programa_SocialController');