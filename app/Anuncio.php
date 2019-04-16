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
        $this->belongsTo(Contratista::class);
    }

    public function tipo_trabajo()
    {
        $this->belongsTo(TipoTrabajo::class);
    }

    
}

