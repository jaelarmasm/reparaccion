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
    
    public function anuncios()
    {
        $this->hasMany(Anuncio::class);
    }

    public function contratos()
    {
        $this->hasMany(Contrato::class);
    }

    public function tipotrabajos()
    {
        return $this->belongsToMany(TipoTrabajo::class,'contratista_tipotrabajo');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
