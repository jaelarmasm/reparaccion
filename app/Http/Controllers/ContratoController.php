<?php

namespace App\Http\Controllers;

use App\Contrato;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::all();
        return response()->json($contratos, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contrato = Contrato::create($request->all());
        // $res = $contrato->save();
        return response()->json($contrato, 200);
    }


    public function uploadImage(Request $request,$idcontrato)
    {
        $contrato=Contrato::find($idcontrato); 
        if($request->hasFile('foto'))
        {
            $aux=$request->file('foto')->store('/public/contratos');
            $contrato->foto=explode('public/',$aux)[1];
        } 
        $contrato->save();
        return $contrato;
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrato = Contrato::find($id); 
        // $contrato->ubicacion=unserialize($contrato->ubicacion);               
        return response()->json($contrato, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idcontrato)
    {
        $contrato = Contrato::find($idcontrato);
        if($contrato)
        {
            $contrato->update($request->all());
            // $contrato->ubicacion=unserialize($contrato->ubicacion);
            return response()->json($contrato, 200);
        }
        return response()->json("Not found", 404);
    }

    // public function updateLocation(Request $request,$idcontrato)
    // {
    //     $contrato = Contrato::find($idcontrato);
    //     if($contrato)
    //     {
    //         $contrato->ubicacion = serialize($request->input("coors"));
    //         $contrato->save();
    //         // $contrato->ubicacion=unserialize($contrato->ubicacion);
    //         return response()->json($contrato, 200);
    //     }
    //     return response()->json("Not found", 404);
    // }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrato $contrato)
    {
        $contrato = Contrato::destroy($contrato);
        return response()->json($contrato, 200);
    }
}
