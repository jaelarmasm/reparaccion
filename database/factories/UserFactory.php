<?php

use TCG\Voyager\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $role = TCG\Voyager\Models\Role::where('name', 'user')->firstOrFail();
    return [
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('password'),
        'remember_token' => Str::random(60),
        'role_id' => $role->id
    ];
});
