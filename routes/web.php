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
    return redirect('admin');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::post('login', ['uses' => 'AdminController@postLogin', 'as' => 'postlogin']);
    Route::get('solicitudes', ['uses' => 'SolicitudController@index', 'as' => 'voyager.solicitudes.browse']);
    Route::get('solicitudes/{id}', ['uses' => 'SolicitudController@show', 'as' => 'voyager.solicitudes.read']);
    Route::post('solicitudes/{id}/aprobar', ['uses' => 'SolicitudController@aprobar', 'as' => 'solicitudes.aprobar']);
    Route::post('solicitudes/{id}/rechazar', ['uses' => 'SolicitudController@rechazar', 'as' => 'solicitudes.rechazar']);
});
