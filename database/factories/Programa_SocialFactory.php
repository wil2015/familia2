<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Programa_Social;
use Faker\Generator as Faker;

$factory->define(Programa_Social::class, function (Faker $faker) {

    return [
        'nome_programa' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
