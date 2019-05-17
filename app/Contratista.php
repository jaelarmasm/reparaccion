<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\ContratistaUpdated;

class Contratista extends Model
{
    protected $fillable = [        
        'user_id',
        'plan_id',
        'descripcion',
        'ultima_ubicacion',
        'estado'
    ];

    // Evento para actualizar user->role cuando se edita contratista->estado
    protected $contratistasEvents = [
        'updated' => ContratistaUpdated::class
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

    // Representacion requerida para aprovechar el fieldform-dropdown de Voyager
    // $contratista->estados()
    public static function estados(){
        return [
            'aprobado' => 'aprobado',
            'solicitante' => 'solicitante',
            'rechazado' => 'rechazado'
        ];
    }

    // $contratista->isAprobado
    public function getIsAprobadoAttribute() {
        if ($this->user->role->name == 'contratista' || $this->estado == 'aprobado'){
            return true;
        }
        return false;
    }
}
