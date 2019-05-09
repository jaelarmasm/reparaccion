<?php

namespace App\Http\Controllers;

use App\Contratista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
        // $res = $contratista->save();
        return response()->json($contratista, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contratista  $contratista
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contratista = Contratista::find($id);        
        return response()->json(["contratista"=>$contratista,"tiposTrabajo"=>$contratista->tipotrabajos],200);
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
        $contratista = Contratista::find($request->input("id"));
        if($contratista)
        {
            $contratista->update($request->all());
            return response()->json($contratista, 200);
        }
        return response()->json("Not found", 404);
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

    public function addTrabajo(Request $request)
    {
        $contratista = Contratista::find($request->input('contratista_id'));        
        if($contratista!=null)
        {        
            $contratista->tipotrabajos()->sync($request->input('tipotrabajo_id'));            
            return response()->json(["contratista"=>$contratista,"tiposTrabajo"=>$contratista->tipotrabajos],200);
        }else{
            return response()->json("Not found", 404);
        }
    }

    public function removeTrabajo(Request $request)
    {        
        $contratista = Contratista::find($request->input('contratista_id'));        
        if($contratista!=null)
        {
            $contratista->tipotrabajos()->detach($request->input('tipotrabajo_id'));            
            return response()->json(["contratista"=>$contratista,"tiposTrabajo"=>$contratista->tipotrabajos],200);
        }else{
            return response()->json("Not found", 404);
        }
    }
}
