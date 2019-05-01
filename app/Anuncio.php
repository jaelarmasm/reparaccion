<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    //
    protected $fillable = [
            'contratista_id',
            'tipotrabajo_id',
            'titulo',
            'imagen',
            'descripcion',
            'aprobado',
            'clicks'
    ];

    public function contratista()
    {
        return $this->belongsTo(Contratista::class);
    }

    public function tipotrabajo()
    {
        return $this->belongsTo(TipoTrabajo::class);
    }

    
}

