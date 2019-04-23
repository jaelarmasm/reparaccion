<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use TCG\Voyager\Traits\Spatial;

class Contrato extends Model
{

    protected $fillable = [
        'user_id',
        'contratista_id',
        'estado_id',
        'descripcion',
        'foto',
        'ubicacion',
        'costo',
        'calificacion'
    ];

    // use Spatial;

    // protected $spatial = ['ubicacion'];

    public function contratista()
    {
        $this->belongsTo(Contratista::class);
    }
    public function estado()
    {
        $this->belongsTo(Estado::class);
    }
    public function user()
    {
        $this->belongsTo(User::class);
    }
}
