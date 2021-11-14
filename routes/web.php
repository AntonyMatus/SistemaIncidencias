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
        Route::post('eliminar/{id?}','UserController@postEliminar')->name('usuarios.eliminar');
    });

    Route::group(['prefix' => 'roles', 'middleware' => ['role:super-admin']], function () {
        Route::get('', 'RoleController@getIndex')->name('roles.index');
        Route::get('ver/{id}', 'RoleController@getVer')->name('roles.ver');
        Route::get('agregar', 'RoleController@getAgregar')->name('roles.agregar');
        Route::post('agregar',  'RoleController@postAgregar')->name('roles.agregar');
        Route::get('editar/{id?}', 'RoleController@getEditar')->name('roles.editar');
        Route::post('editar/{id?}','RoleController@postEditar')->name('roles.editar');
        Route::post('eliminar/{id?}','RoleController@postEliminar')->name('roles.eliminar');
    });

    Route::group(['prefix' => 'vehiculos'], function () {
        Route::get('', 'VehiculoController@getIndex')->name('vehiculos.index');
        Route::get('ver/{id}', 'VehiculoController@getVer')->name('vehiculos.ver');
        Route::get('agregar', 'VehiculoController@getAgregar')->name('vehiculos.agregar');
        Route::post('agregar',  'VehiculoController@postAgregar')->name('vehiculos.agregar');
        Route::get('editar/{id?}', 'VehiculoController@getEditar')->name('vehiculos.editar');
        Route::post('editar/{id?}','VehiculoController@postEditar')->name('vehiculos.editar');
        Route::post('eliminar/{id?}','VehiculoController@getEliminar')->name('vehiculos.eliminar');
    });

    Route::group(['prefix' => 'cargos'], function () {
        Route::get('', 'CargoController@getIndex')->name('cargos.index');
        Route::get('agregar', 'CargoController@getAgregar')->name('cargos.agregar');
        Route::post('agregar',  'CargoController@postAgregar')->name('cargos.agregar');
        Route::get('editar/{id?}', 'CargoController@getEditar')->name('cargos.editar');
        Route::post('editar/{id?}','CargoController@postEditar')->name('cargos.editar');
        Route::post('eliminar/{id?}','CargoController@getEliminar')->name('cargos.eliminar');
    });

    Route::group(['prefix' => 'personal'], function () {
        Route::get('', 'PersonalController@getIndex')->name('personal.index');
        Route::get('agregar', 'PersonalController@getAgregar')->name('personal.agregar');
        Route::post('agregar',  'PersonalController@postAgregar')->name('personal.agregar');
        Route::get('editar/{id?}', 'PersonalController@getEditar')->name('personal.editar');
        Route::post('editar/{id?}','PersonalController@postEditar')->name('personal.editar');
        Route::post('eliminar/{id?}','PersonalController@getEliminar')->name('personal.eliminar');
    });

    Route::group(['prefix' => 'emergencias'], function () {
        Route::get('', 'EmergenciasController@getIndex')->name('emergencias.index');
        Route::get('agregar', 'EmergenciasController@getAgregar')->name('emergencias.agregar');
        Route::post('agregar',  'EmergenciasController@postAgregar')->name('emergencias.agregar');
        Route::get('editar/{id?}', 'EmergenciasController@getEditar')->name('emergencias.editar');
        Route::post('editar/{id?}','EmergenciasController@postEditar')->name('emergencias.editar');
        Route::post('eliminar/{id?}','EmergenciasController@getEliminar')->name('emergencias.eliminar');
    });

    Route::group(['prefix' => 'registros'], function () {
        Route::get('', 'RegistroController@getIndex')->name('registros.index');
        Route::get('ver/{id}', 'RegistroController@getVer')->name('registros.ver');
        Route::get('agregar', 'RegistroController@getAgregar')->name('registros.agregar');
        Route::post('agregar',  'RegistroController@postAgregar')->name('registros.agregar');
        Route::get('editar/{id?}', 'RegistroController@getEditar')->name('registros.editar');
        Route::post('editar/{id?}','RegistroController@postEditar')->name('registros.editar');
        Route::post('eliminar/{id?}','RegistroController@getEliminar')->name('registros.eliminar');
    });

    Route::group(['prefix' => 'reporte'], function () {
        Route::get('', 'ReporteController@getIndex')->name('reporte.index');
        Route::post('generar', 'ReporteController@postGenerar')->name('reporte.generar');
        Route::post('semanal', 'ReporteController@postSemanal')->name('reporte.semanal');
        Route::post('mensual', 'ReporteController@postMensual')->name('reporte.mensual');
        Route::post('semanal_vehiculo', 'ReporteController@postSemanalVehiculo')->name('reporte.vehiculo_semanal');
        Route::post('mensual_vehiculo', 'ReporteController@postMensualVehiculo')->name('reporte.mensual_vehiculo');
        Route::post('semanal_impricedente', 'ReporteController@postSemanalImprocedente')->name('reporte.improcedente_semanal');
        Route::post('colonia', 'ReporteController@postColonia')->name('reporte.colonia');
        });
    
});
