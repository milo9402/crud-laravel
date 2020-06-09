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

Route::get('client/list', function(){
    return view('clientList');
});

Route::get('client/add', function(){
    return view('clientAdd');
});
*/

// Listar todos clientes
Route::get('client/list', 'ClienteController@index')->name('clientes');;;

// Listar formulario nuevo cliente
Route::get('client/create', 'ClienteController@create')->name('clientes.create');;

// Guardar clientes
Route::post('client/create','ClienteController@store')->name('clientes.store');

// Actualizar clientes
Route::put('client-update/{cliente}','ClienteController@update' )->name('clientes.update');

// Eliminar clientes
Route::delete('client/{cliente}', 'ClienteController@destroy' )->name('clientes.destroy');;

