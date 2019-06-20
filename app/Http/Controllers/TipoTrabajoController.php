<?php

namespace App\Http\Controllers;

use App\TipoTrabajo;
use Illuminate\Http\Request;

class TipoTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoTrabajos = TipoTrabajo::all();
        return response()->json($tipoTrabajos, 200);
    }

    public function getContratistas($id)
    {        
        $tipoTrabajos = TipoTrabajo::with('contratistas','contratistas.user')->find($id);                     
        return response()->json($tipoTrabajos, 200);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoTrabajo = TipoTrabajo::create($request->all());
        $res = $tipoTrabajo->save();
        return response()->json($res, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoTrabajo  $tipoTrabajo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoTrabajo = TipoTrabajo::find($id);        
        return response()->json($tipoTrabajo, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoTrabajo  $tipoTrabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoTrabajo $tipoTrabajo)
    {
        $tipoTrabajo = TipoTrabajo::firstOrCreate($request->all());
        return response()->json($tipoTrabajo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoTrabajo  $tipoTrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoTrabajo $tipoTrabajo)
    {
        $tipoTrabajo = TipoTrabajo::destroy($tipoTrabajo);
        return response()->json($tipoTrabajo, 200);
    }
}
