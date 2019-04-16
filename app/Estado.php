<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    public function contratos()
    {
        $this->hasMany(Contrato::class);
    }  
}
