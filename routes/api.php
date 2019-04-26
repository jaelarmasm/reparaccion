<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'cors', 'prefix' => 'api'], function()
{
    Route::resource('anuncio', 'AnuncioController');
    Route::resource('contratista', 'ContratistaController');
    Route::resource('contrato', 'ContratoController');
    Route::resource('estado', 'EstadoController');
    Route::resource('plan', 'PlanController');
    Route::resource('tipotrabajo', 'TipoTrabajoController');

}