<?php

use Illuminate\Database\Seeder;
use App\Contratista;
use App\User;

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

            factory(Contratista::class)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
