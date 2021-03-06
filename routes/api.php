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
    Route::post('user/edit-userphoto/{id}','UserController@uploadImage');
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
    Route::get('user-contratos-contratista/{idsolicitante}', 'UserController@getContratosWithContratista');    
    Route::post('contrato/edit-contratophoto/{idcontrato}','ContratoController@uploadImage');
    Route::post('contrato/edit/{idcontrato}','ContratoController@update');
    
    
    Route::post('anuncio/edit-anunciophoto/{idanuncio}','AnuncioController@uploadImage');
    Route::post('anuncio/edit/{idanuncio}','AnuncioController@update');
    Route::get('anuncio-aprobados','AnuncioController@getAnuncioByAprobados');
    Route::get('contratista-anuncios/{id}','ContratistaController@getAnuncios');
    // Route::post('contrato/location/{idcontrato}', 'ContratoController@updateLocation');    
    Route::resource('contrato', 'ContratoController');    

    Route::resource('estado', 'EstadoController');
    Route::resource('plan', 'PlanController');
    Route::resource('tipotrabajo', 'TipoTrabajoController');
    Route::get('tipoTrabajo-contratistas/{id}', 'TipoTrabajoController@getContratistas');

});
Route::options('{any}', ['middleware' => ['cors'], function () { return response(['status' => 'success']); }])->where('any', '.*');