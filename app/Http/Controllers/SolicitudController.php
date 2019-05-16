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
        
        foreach ($users as $key => $user) {
            if(!$user->roles->isEmpty()){
                array_push($solicitudes, $user);
            }
        }

        return Voyager::view('voyager::solicitudes.browse', compact('solicitudes'));
    }
    
    public function show($id){
        // dd('Holi', $id);
        return Voyager::view('voyager::solicitudes.read', compact('id'));
    }
}
