<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTrabajo extends Model
{
    //
    public function contratistas()
    {
        return $this->belongsToMany(Contratista::class,'tipo_contratistas');
    }
    public function anuncios()
    {
        $this->hasMany(Anuncio::class);
    }
}
