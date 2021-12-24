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


Auth::routes();

Route::get('/recetas','App\Http\Controllers\RecetaController@index')->name('receta.index');


Route::get('/receta/create','App\Http\Controllers\RecetaController@create')->name('receta.create');

Route::post('/receta/store','App\Http\Controllers\RecetaController@store')->name('receta.store');

Route::get('/receta/{receta}','App\Http\Controllers\RecetaController@show')->name('receta.show');


Route::get('/receta/edit/{id}','App\Http\Controllers\RecetaController@edit')->name('receta.edit');

Route::get('/receta/imagen/{id}','App\Http\Controllers\RecetaController@imagen')->name('receta.imagen');



Route::get('/receta/imagen/{id}','App\Http\Controllers\RecetaController@getimagen')->name('receta.getimagen');


Route::put('/receta/{receta}','App\Http\Controllers\RecetaController@update')->name('receta.update');


Route::delete('/receta/{receta}','App\Http\Controllers\RecetaController@destroy')->name('receta.destroy');

Route::get('/perfil','App\Http\Controllers\PerfilController@index')->name('perfil.index');


Route::get('/perfil/create','App\Http\Controllers\PerfilController@create')->name('perfil.create');


Route::put('/perfil/store/{id}','App\Http\Controllers\PerfilController@store')->name('perfil.store');

Route::get('/perfil/imagen/{id}','App\Http\Controllers\PerfilController@getimagen')->name('perfil.getimagen');

Route::get('/perfil/show','App\Http\Controllers\PerfilController@show')->name('perfil.show');

Route::get('/like/{receta}','App\Http\Controllers\LikeController@update')->name('like.show');

Route::get('/inicio','App\Http\Controllers\InicioController@index')->name('inicio.index');


Route::get('/categoria/{id}','App\Http\Controllers\CategoriaController@show')->name('categoria.show');

Route::Post('/busqueda','App\Http\Controllers\InicioController@store')->name('inicio.busqueda');
