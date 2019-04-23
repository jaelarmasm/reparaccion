<?php

use Illuminate\Database\Seeder;
use App\Contrato;

class ContratoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contrato::create([
            'contratista_id' => 1,
            'user_id' => 2,
            'descripcion' => 'Se instaló una ducha eléctrica y cada vez que se enciende se baja la intensidad de las bombillas',
            'foto' => 'https://images.unsplash.com/photo-1534357808625-fdbecdd0b6da?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=675&q=80',
            // 'ubicacion' => '',
            'estado_id' => 1
        ]);
    }
}
