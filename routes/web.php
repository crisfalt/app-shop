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

//aplicar middleware admin para las rutas que puede acceder
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::get('/products','ProductController@index');//listar todos los productos
    Route::get('/products/create','ProductController@create'); //vista permite crear nuevos productos solo administradores
    Route::post('/products','ProductController@store'); //enviar datos que permite crear nuevos productos solo administradores
    Route::get('/products/{id}/edit','ProductController@edit'); //vista permite edita productos por medio de un id a solo administradores
    Route::post('/products/{id}/edit','ProductController@update'); //enviar datos que permite actualizar productos con una id solo administradores
    Route::delete('/products/{id}','ProductController@destroy'); //vista para eliminar productos

	Route::get('/products/{id}/images', 'ImageController@index'); // listado
	Route::post('/products/{id}/images', 'ImageController@store'); // registrar
	Route::delete('/products/{id}/images', 'ImageController@destroy'); // form eliminar
	Route::get('/products/{id}/images/select/{image}', 'ImageController@select'); // destacar
    //
	// Route::get('/categories', 'CategoryController@index'); // listado
	// Route::get('/categories/create', 'CategoryController@create'); // formulario
	// Route::post('/categories', 'CategoryController@store'); // registrar
	// Route::get('/categories/{category}/edit', 'CategoryController@edit'); // formulario edición
	// Route::post('/categories/{category}/edit', 'CategoryController@update'); // actualizar
	// Route::delete('/categories/{category}', 'CategoryController@destroy'); // form eliminar
});

// Route::get('/admin/products','ProductController@index');//listar todos los productos
// Route::get('/admin/products/create','ProductController@create'); //vista permite crear nuevos productos solo administradores
// Route::post('/admin/products','ProductController@store'); //enviar datos que permite crear nuevos productos solo administradores
// Route::get('/admin/products/{id}/edit','ProductController@edit'); //vista permite edita productos por medio de un id a solo administradores
// Route::post('/admin/products/{id}/edit','ProductController@update'); //enviar datos que permite actualizar productos con una id solo administradores
// Route::delete('/admin/products/{id}','ProductController@destroy'); //vista para eliminar productos
// Route::get('','');
// Route::get('','');
// Route::get('','');
// Route::get('','');
// Route::get('','');
