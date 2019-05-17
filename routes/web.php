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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
    Route::get('/dashboard', function () {
        return view('admin.home');
    })->name('dashboard');

    Route::group(['prefix' => 'usuarios', 'middleware' => ['role:super-admin']], function () {
        Route::get('', 'UserController@getIndex')->name('usuarios.index');
        Route::get('ver/{id}', 'UserController@getVer')->name('usuarios.ver');
        Route::get('agregar', 'UserController@getAgregar')->name('usuarios.agregar');
        Route::post('agregar',  'UserController@postAgregar')->name('usuarios.agregar');
        Route::get('editar/{id?}', 'UserController@getEditar')->name('usuarios.editar');
        Route::post('editar/{id?}','UserController@postEditar')->name('usuarios.editar');
        Route::delete('eliminar/{id?}','UserController@getEliminar')->name('usuarios.eliminar');
    });
});
