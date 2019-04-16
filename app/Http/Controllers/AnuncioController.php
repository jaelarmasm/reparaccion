<?php

namespace App\Http\Controllers;

use App\anuncio;
use Illuminate\Http\Request;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $anuncio=Anuncio::create($request->all());                 
        $res=$anuncio->save();
        return response($res,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function show(anuncio $anuncio)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function destroy(anuncio $anuncio)
    {
        //
    }
}
