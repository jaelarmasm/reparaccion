<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contratista;

class Extra extends Model
{
    public static function contratistasAprobados(){
        $query = Contratista::all();
        $contratistas = collect([]);
        foreach ($query as $contratista) {
            if ($contratista->isAprobado) {
                $contratistas->add($contratista);
            }
        }
        return $contratistas;
    }

}
