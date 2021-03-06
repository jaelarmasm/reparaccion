<?php

namespace App\Observers;

use App\Contratista;
use TCG\Voyager\Models\Role;

class ContratistaObserver
{
    /**
     * Handle the contratista "created" event.
     *
     * @param  \App\Contratista  $contratista
     * @return void
     */
    public function created(Contratista $contratista)
    {
        //
    }

    /**
     * Handle the contratista "updated" event.
     *
     * @param  \App\Contratista  $contratista
     * @return void
     */
    public function updated(Contratista $contratista)
    {
        $user = $contratista->user;
        if ($contratista->estado == 'aprobado'){
            $role = Role::where('name', 'contratista')->firstOrFail();
            $user->role_id = $role->id;
            $user->save();
        } elseif ($contratista->estado == 'rechazado') {
            $role = Role::where('name', 'user')->firstOrFail();
            $user->role_id = $role->id;
            $user->save();
        }
    }

    /**
     * Handle the contratista "deleted" event.
     *
     * @param  \App\Contratista  $contratista
     * @return void
     */
    public function deleted(Contratista $contratista)
    {
        //
    }

    /**
     * Handle the contratista "restored" event.
     *
     * @param  \App\Contratista  $contratista
     * @return void
     */
    public function restored(Contratista $contratista)
    {
        //
    }

    /**
     * Handle the contratista "force deleted" event.
     *
     * @param  \App\Contratista  $contratista
     * @return void
     */
    public function forceDeleted(Contratista $contratista)
    {
        //
    }
}
