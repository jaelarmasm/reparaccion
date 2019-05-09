<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use App\User;

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

            foreach (range(1,5) as $index) {
                factory(User::class)->create([
                    'username' => 'user'.$index,
                    'password' => bcrypt('user'.$index)
                ]);
            }

            // factory(User::class)->create([
            //     'name'           => 'Cliente Uno',
            //     'username'       => 'user',
            //     'email'          => 'user@email.com',
            //     'password'       => bcrypt('user'),
            // ]);

            // $role = Role::where('name', 'contratista')->firstOrFail();
            // factory(User::class)->create([
            //     'name'           => 'Contratista Uno',
            //     'username'       => 'contra',
            //     'email'          => 'contra@email.com',
            //     'password'       => bcrypt('contra'),
            //     'role_id'        => $role->id,
            // ]);
        }
    }
}