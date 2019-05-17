<?php

use Illuminate\Database\Seeder;
use App\Contratista;
use App\User;
use App\Tipotrabajo;

class ContratistaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = TCG\Voyager\Models\Role::where('name', 'contratista')->firstOrFail();
        
        foreach (range(1,3) as $index) {
            $user = factory(User::class)->create([
                'username' => 'contra'.$index,
                'password' => bcrypt('contra'.$index),
                'role_id' => $role->id
            ]);

            $contratista = factory(Contratista::class)->create([
                'user_id' => $user->id,
            ]);

            // Para asignar tipos de trabajo randomicos
            $n = rand(1, Tipotrabajo::count());

            $tipotrabajos = Tipotrabajo::all()->toArray();

            $tipotrabajos = array_rand($tipotrabajos, $n);

            if($n > 1) {
                foreach ($tipotrabajos as $i) {
                    $tipotrabajo = Tipotrabajo::where('id', $i)->get();
                    $contratista->tipotrabajos()->attach($tipotrabajo);   
                }
            } else {
                $tipotrabajo = Tipotrabajo::where('id', $tipotrabajos)->get();
                $contratista->tipotrabajos()->attach($tipotrabajo);   
            }
        }
    }
}
