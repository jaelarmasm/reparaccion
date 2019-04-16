<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    //
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
