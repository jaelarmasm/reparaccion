<?php

use Illuminate\Database\Seeder;
use App\Contratista;

class ContratistaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contratista::create([
            'user_id' => 3,
            'plan_id' => 3,
            'descripcion' => 'Instalaciones eléctricas de mediana y baja tensión, instalación de alarmas, cámaras de video',
        ]);
    }
}
