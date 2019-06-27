<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use TCG\Voyager\Facades\Voyager;

class SolicitudController extends Controller
{
    public function index()
    {
        $users = User::all();

        $solicitudes = [];

        foreach ($users as $user) {
            if($user->isSolicitante){
                array_push($solicitudes, [
                    'user' => $user, 
                    'contratista' => $user->contratistas[0]
                ]);
            }
        }

        return Voyager::view('voyager::solicitudes.browse', compact('solicitudes'));

    }
    
    public function show($id)
    {
        $user = User::find($id);

        $solicitud = [];

        if( $user->isSolicitante) {
            $solicitud = [
                'user' => $user,
                'contratista' => $user->contratistas[0]
            ];
        } else {
            return redirect()->back();
        }

        return Voyager::view('voyager::solicitudes.read', compact('solicitud'));

    }

    public function aprobar($id)
    {
        $user = User::find($id);

        if($user->isSolicitante){
            $user->contratistas[0]->estado = 'aprobado';
            $user->contratistas[0]->save();
        }

        return  redirect()->route('voyager.solicitudes.browse');
    }
    
    public function rechazar($id)
    {
        $user = User::find($id);
        
        if($user->isSolicitante){
            $user->contratistas[0]->estado = 'rechazado';
            $user->contratistas[0]->save();
        }
        
        return  redirect()->route('voyager.solicitudes.browse');
    }
}
