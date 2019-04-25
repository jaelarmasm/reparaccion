<?php

namespace App\Http\Controllers;

use App\Contratista;
use Illuminate\Http\Request;

class ContratistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratista = Contratista::all();
        return response()->json($contratista, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contratista = Contratista::create($request->all());
        $res = $contratista->save();
        return response()->json($res, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contratista  $contratista
     * @return \Illuminate\Http\Response
     */
    public function show(Contratista $contratista)
    {
        $contratista = Contratista::create($contratista);
        $res = $contratista->save();
        return response()->json($res, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contratista  $contratista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contratista $contratista)
    {
        $contratista = Contratista::firstOrCreate($request->all());
        return response()->json($contratista, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contratista  $contratista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contratista $contratista)
    {
        $contratista = Contratista::destroy($contratista);
        return response()->json($contratista, 200);
    }
}
