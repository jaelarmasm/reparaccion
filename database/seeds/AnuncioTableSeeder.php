<?php

use Illuminate\Database\Seeder;
use App\Anuncio;
use App\Extra;
use App\Tipotrabajo;


class AnuncioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contratistas = Extra::contratistasAprobados();
        $max = 0;
        foreach ($contratistas as $key => $contra) {
            $max += $contra->plan()->first()->cantidad;
        }

        while(Anuncio::count() < $max) { 
            $contratista = Extra::contratistasAprobados()->random();
            $tipotrabajo = Tipotrabajo::all()->random();
            $faker = Faker\Factory::create();

            if($contratista->anuncios()->count() < $contratista->plan()->first()->cantidad){
                Anuncio::create([
                        'contratista_id' => $contratista->id,
                        'tipotrabajo_id' => $tipotrabajo->id,
                        'titulo' => $contratista->user()->first()->name .' '. $tipotrabajo->nombre,
                        'imagen' => '/anuncios/default.png',
                        'descripcion' => $faker->text,
                        'clicks' => rand(5,50)
                ]);
            }
        }
    }
}
