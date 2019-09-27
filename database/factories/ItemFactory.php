<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'quantity' => rand(1, 10),
        'product_id' => rand(1, 10),
        'delivery_id' => rand(1, 10),
        'customer_id' => rand(1, 10),
    ];
});
