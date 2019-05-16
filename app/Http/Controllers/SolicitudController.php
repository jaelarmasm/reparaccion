<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Facades\Voyager;

class SolicitudController extends Controller
{
    public function index()
    {
        $role = Role::where('name', 'solicitante')->firstOrFail();

        $users = User::all();

        $solicitudes = [];
        
        foreach ($users as $user) {
            if(!$user->roles->isEmpty()){
                foreach ($user->roles as $role){
                    if ($role->name == 'solicitante'){
                        array_push($solicitudes, [
                            'user' => $user, 
                            'contratista' => $user->contratistas[0]
                        ]);
                    }
                }
            }
        }

        return Voyager::view('voyager::solicitudes.browse', compact('solicitudes'));

    }
    
    public function show($id)
    {
        $user = User::find($id);

        $solicitud = [];

        if(!$user->roles->isEmpty()){
            $roles = $user->roles;
            foreach ($roles as $role){
                if ($role->name == 'solicitante'){
                    $solicitud = [
                        'user' => $user,
                        'contratista' => $user->contratistas[0],
                        'roles' => $roles
                    ];
                }
            }
        } else {
            return redirect()->back();
        }

        return Voyager::view('voyager::solicitudes.read', compact('solicitud'));

    }
}
