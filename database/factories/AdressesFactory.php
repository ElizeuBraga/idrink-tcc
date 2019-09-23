<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'latitude' => rand(1000, 2000),
        'longitude' => rand(1000, 2000),
        'user_id' => rand(1, 10)
    ];
});
