<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Delivery;
use Faker\Generator as Faker;

$factory->define(Delivery::class, function (Faker $faker) {
    $arrayType = ['open', 'canceled', 'delivered'];
    $arrayPayment = ['money', 'credit', 'debit'];
    return [
        'status' => $arrayType[rand(0,1)],
        'payment' => $arrayPayment[rand(0,1)],
        'store_id' => rand(1, 10),
        'customer_id' => rand(1, 10),
        'address_id' => rand(1, 10),
    ];
});
