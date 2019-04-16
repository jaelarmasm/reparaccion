<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    //

    public function contratista()
    {
        $this->belongsTo(Contratista::class);
    }

    public function tipo_trabajo()
    {
        $this->belongsTo(TipoTrabajo::class);
    }

    
}

