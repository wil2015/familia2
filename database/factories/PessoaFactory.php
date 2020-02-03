<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pessoa;
use Faker\Generator as Faker;

$factory->define(Pessoa::class, function (Faker $faker) {

    return [
        'familia_id' => $faker->word,
        'nome' => $faker->word,
        'sexo' => $faker->word,
        'data_nascimento' => $faker->word,
        'naturalidade' => $faker->word,
        'cpf' => $faker->word,
        'rg' => $faker->word,
        'estado_civil' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
