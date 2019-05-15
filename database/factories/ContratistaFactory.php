<?php

use App\Contratista;
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

$factory->define(Contratista::class, function (Faker $faker) {
    return [
        'user_id' => 1, //admin
        'plan_id' => rand(1, 4),
        'descripcion' => $faker->text,
        'ultima_ubicacion' => $faker->latitude.','.$faker->longitude,
        'estado' => 'aceptado'
    ];
});
