<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
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
    $arrayType = ['customer', 'store'];
    $arrayCpfCnpj = ['123456789', '987654321'];

    return [
        'name' => $faker->name,
        'type' => $arrayType[rand(0,1)],
        'phone' => Str::random(8),
        'cpf' => $arrayCpfCnpj[rand(0,1)],
        'cnpj' => $arrayCpfCnpj[rand(0,1)],
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
