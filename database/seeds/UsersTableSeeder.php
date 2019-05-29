<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use App\User;
use App\Contratista;
use App\Tipotrabajo;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {

            $role = Role::where('name', 'admin')->firstOrFail();
            factory(User::class)->create([
                'name'           => 'Administrador',
                'username'       => 'admin',
                'email'          => 'admin@email.com',
                'password'       => bcrypt('admin'),
                'remember_token' => Str::random(60),
                'role_id'        => $role->id,
            ]);
                
            foreach (range(1,3) as $index) {
                factory(User::class)->create([
                    'username' => 'user'.$index,
                    'email' => 'user'.$index.'@email.com',
                    'password' => bcrypt('user'.$index)
                ]);
            }
                    
            foreach (range(1,3) as $index) {
                $user = factory(User::class)->create([
                    'username' => 'soli'.$index,
                    'email' => 'soli'.$index.'@email.com',
                    'password' => bcrypt('soli'.$index),
                ]);
                
                $contratista = factory(Contratista::class)->create([
                    'user_id' => $user->id,
                    'estado' => 'solicitante'
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
}