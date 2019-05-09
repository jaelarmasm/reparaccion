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
        foreach (range(1,3) as $index) {
            $role = TCG\Voyager\Models\Role::where('name', 'contratista')->firstOrFail();

            $user = factory(App\User::class)->create([
                'username' => 'contra'.$index,
                'password' => bcrypt('contra'.$index),
                'role_id' => $role->id
            ]);

            factory(Contratista::class)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
