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



Route::group(['middleware' => 'cors'], function(){    
    Route::resource('userap','UserController');
    Route::post('user/edit-userap','UserController@update');
    Route::post('loginAPI','UserController@authenticate');
    Route::get('logoutAPI','UserController@logout');    
    Route::get('userap','UserController@show');    
    Route::get('errlogin','UserController@errlogin')->name('errlogin');    
    Route::resource('anuncio', 'AnuncioController');
    Route::resource('contratista', 'ContratistaController');
    Route::post('contratista-addTrabajo', 'ContratistaController@addTrabajo');
    Route::post('contratista-removeTrabajo', 'ContratistaController@removeTrabajo');
    Route::get('contratista-paginate', 'ContratistaController@paginate');    
    Route::get('contratista-contratos/{id}', 'ContratistaController@getContratos');    
    Route::get('contratista-contratos-user/{id}', 'ContratistaController@getContratosWithUserApply');    
    Route::resource('contrato', 'ContratoController');    
    Route::resource('estado', 'EstadoController');
    Route::resource('plan', 'PlanController');
    Route::resource('tipotrabajo', 'TipoTrabajoController');
    Route::get('tipoTrabajo-contratistas/{id}', 'TipoTrabajoController@getContratistas');

});
Route::options('{any}', ['middleware' => ['cors'], function () { return response(['status' => 'success']); }])->where('any', '.*');