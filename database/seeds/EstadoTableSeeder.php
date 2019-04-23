<?php

use Illuminate\Database\Seeder;
use App\Estado;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create(['nombre' => 'Pendiente']);
        
        Estado::create(['nombre' => 'En Progreso']);

        Estado::create(['nombre' => 'Terminado']);

        Estado::create(['nombre' => 'Cancelado']);
    }
}
