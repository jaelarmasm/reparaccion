<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = ['nombre'];
    //
    public function contratos()
    {
        $this->hasMany(Contrato::class);
    }  
}
