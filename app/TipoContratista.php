<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoContratista extends Model
{
    //
    protected $fillable = [
        'contratista_id',
        'tipo_trabajo_id'
    ];
}
