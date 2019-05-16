<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contratista extends Model
{
    protected $fillable = [        
        'user_id',
        'plan_id',
        'descripcion',
        'ultima_ubicacion',
        'estado'
    ];
    
    public function anuncios()
    {
        return $this->hasMany(Anuncio::class);
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }

    public function tipotrabajos()
    {
        return $this->belongsToMany(TipoTrabajo::class,'contratista_tipocontratistas');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    // $contratista->estados()
    // Representacion necesaria para aprovechar el fieldform-dropdown de Voyager
    public static function estados(){
        return [
            'aprobado' => 'aprobado',
            'suspendido' => 'suspendido',
            'solicitante' => 'solicitante'
        ];
    }

    // $contratista->strestado
    public function getStrestadoAttribute(){
        if (in_array($this->estado, $this->estados())) {
            return $this->estado;
        }
    }
}
