<?php

namespace App\Http\Controllers;

use App\Contratista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;

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
    // contratistas ALL PAGiNATE (/paginate)
    public function paginate(Request $request)
    {
        //tipo de trbajo o nombre de contratista
        $term=$request->input('term');
        // $contratista = Contratista::with(['user','tipotrabajos'])->paginate(9);
        // $contratista = Contratista::with(['user','tipotrabajos'])->join('users', function($join) use ($term) {
        //     $join->on('contratistas.user_id', '=', 'users.id')
        //     ->where('name','like','%'.$term.'%');                          
        // })->paginate(9);        
        $contratista = Contratista::with(['user','tipotrabajos'])->join('users', function($join) use ($term) {
            $join->on('user_id', '=', 'users.id')
            ->where('name','like','%'.$term.'%');                                          
        })->paginate(9,array('contratistas.*'));                
        return response()->json($contratista, 200);
    }

    public function getContratos($id)
    {        
        $contratista = Contratista::with('contratos')->find($id);
        return response()->json($contratista, 200);   
    }

    public function getAnuncios($id)
    {        
        $contratista = Contratista::with('anuncios')->find($id);
        return response()->json($contratista, 200);   
    }


    public function getContratosWithUserApply($id)
    {        
        //Se devuelve el objeto con el usuario que solicita el servicio        
        $contratista = Contratista::with(['contratos','contratos.user'])->find($id);
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
         
        
        $request["estado"]= 'solicitante';
        $contratista = Contratista::create($request->all());    
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
        $contratista = Contratista::with('user')->find($id);        
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
