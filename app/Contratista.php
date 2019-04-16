<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contratista extends Model
{
    protected $fillable = [        
        'user_id',
        'plan_id',
        'descripcion',
        'ultima_ubicacion'
    ];
    //
    public function anuncios()
    {
        return $this->hasMany(Anuncio::class);
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }

    public function tipo_trabajos()
    {
        return $this->belongsToMany(TipoTrabajo::class,'tipo_contratistas');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
