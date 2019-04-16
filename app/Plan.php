<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'titulo',
        'precio',
        'cantidad'
    ];
    //
    public function contratistas()
    {
        $this->hasMany(Contratista::class);
    }    
}
