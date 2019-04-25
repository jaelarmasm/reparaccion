<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipotrabajo extends Model
{
    protected $fillable = ['nombre'];
    //
    public function contratistas()
    {
        return $this->belongsToMany(Contratista::class,'contratista_tipocontratista');
    }
    public function anuncios()
    {
        $this->hasMany(Anuncio::class);
    }
}
