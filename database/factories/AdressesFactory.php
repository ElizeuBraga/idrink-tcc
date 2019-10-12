<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'cep' => rand(10000000, 20000000),
        'uf' => 'DF',
        'logradouro' => $faker->name,
        'bairro' => $faker->name,
        'localidade' => $faker->name,
        'complemento' => $faker->name,
        'numero' => rand(1, 50),
        'latitude' => rand(1000, 2000),
        'longitude' => rand(1000, 2000),
        'user_id' => rand(1, 10)
    ];
});
