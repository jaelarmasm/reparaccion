<?php

use Illuminate\Database\Seeder;
use App\TipoTrabajo;

class TipoTrabajoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoTrabajo::create(['nombre' => 'Fontanería']);

        TipoTrabajo::create(['nombre' => 'Carpintería']);

        TipoTrabajo::create(['nombre' => 'Limpieza']);

        TipoTrabajo::create(['nombre' => 'Electricidad']);
    }
}
