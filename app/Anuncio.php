<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    //
    protected $fillable = [
            'contratista_id',
            'tipo_trabajo_id',
            'titulo',
            'imagen',
            'descripcion',
            'aprovado',
            'clicks'
    ];

    public function contratista()
    {
        return $this->belongsTo(Contratista::class);
    }

    public function tipo_trabajo()
    {
        return $this->belongsTo(TipoTrabajo::class);
    }

    
}

