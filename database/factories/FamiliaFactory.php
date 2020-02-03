<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Familia;
use Faker\Generator as Faker;

$factory->define(Familia::class, function (Faker $faker) {

    return [
        'estado' => $faker->word,
        'cidade' => $faker->word,
        'bairro' => $faker->word,
        'cep' => $faker->word,
        'logradouro' => $faker->word,
        'num_logradouro' => $faker->word,
        'id_programa' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
