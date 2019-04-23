<?php

use Illuminate\Database\Seeder;
use App\Plan;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'titulo' => 'Gratuito',
            'precio' => 0,
            'cantidad' => 0,
        ]);
        
        Plan::create([
            'titulo' => 'Básico',
            'precio' => 4.98,
            'cantidad' => 1,
        ]);
        
        Plan::create([
            'titulo' => 'Intermedio',
            'precio' => 7.98,
            'cantidad' => 2,
        ]);
        
        Plan::create([
            'titulo' => 'Plus',
            'precio' => 9.98,
            'cantidad' => 3,
        ]);
    }
}
