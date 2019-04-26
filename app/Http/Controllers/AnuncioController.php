<?php

namespace App\Http\Controllers;

use App\anuncio;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anuncios = Anuncio::all();
        return response()->json($anuncios, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $anuncio = Anuncio::create($request->all());
        $res = $anuncio->save();
        return response()->json($res, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function show(anuncio $anuncio)
    {
        $anuncio = Anuncio::create($anuncio);
        $res = $anuncio->save();
        return response()->json($res, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, anuncio $anuncio)
    {

        $anuncio = Anuncio::firstOrCreate($request->all());
        return response()->json($anuncio, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function destroy(anuncio $anuncio)
    {        
        $anuncio = Anuncio::destroy($anuncio);
        return response()->json($anuncio, 200);
    }
}