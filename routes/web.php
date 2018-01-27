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
//LA RUTA ESTA ASOCIADA A UN CONTROLADOR Y EL CONTROLADOR RESPONDERA
//CON UNA VISTA
//rutas para acciones a tomar
Route::get('/', 'TestController@welcome');
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/products','ProductController@index');//listar todos los productos
Route::get('/admin/products/create','ProductController@create'); //vista permite crear nuevos productos solo administradores
Route::post('/admin/products','ProductController@store'); //enviar datos que permite crear nuevos productos solo administradores
Route::get('/admin/products/{id}/edit','ProductController@edit'); //vista permite edita productos por medio de un id a solo administradores
Route::post('/admin/products/{id}/edit','ProductController@update'); //enviar datos que permite actualizar productos con una id solo administradores
Route::delete('/admin/products/{id}','ProductController@destroy'); //vista para eliminar productos
// Route::get('','');
// Route::get('','');
// Route::get('','');
// Route::get('','');
// Route::get('','');
