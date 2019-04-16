<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
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
