<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use App\User;
use App\Contratista;

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
                    'password' => bcrypt('user'.$index)
                ]);
            }
                    
            $role = Role::where('name', 'solicitante')->firstOrFail();
            foreach (range(1,3) as $index) {
                $user = factory(User::class)->create([
                    'username' => 'soli'.$index,
                    'password' => bcrypt('soli'.$index),
                ]);
                
                factory(Contratista::class)->create([
                    'user_id' => $user->id,
                    'estado' => Contratista::estados()[2] //solicitante
                ]);

                $user->roles()->attach($role);
            }
        }
    }
}