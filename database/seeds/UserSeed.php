<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sotores
        DB::table('users')->insert([
            [
                'name' => 'Skiltys',
                'type' => 'store',
                'email' => 'skyltis@gmail.com',
                'phone' => '12345678',
                'cnpj' => '12345678',
                'cpf' => null,
                'password' => bcrypt('12345678'),
                'api_token' => Str::random(60),
            ],

            [
                'name' => 'La casita',
                'type' => 'store',
                'email' => 'lacasita@gmail.com',
                'phone' => '12345678',
                'cnpj' => '12345678',
                'cpf' => null,
                'password' => bcrypt('12345678'),
                'api_token' => Str::random(60),
            ],

            //Clientes
            [
                'name' => 'Elizeu',
                'type' => 'customer',
                'email' => 'elizeu@gmail.com',
                'phone' => '12345678',
                'cnpj' => null,
                'cpf' => '12345678',
                'password' => bcrypt('12345678'),
                'api_token' => Str::random(60),
            ],

            [
                'name' => 'Yan',
                'type' => 'customer',
                'email' => 'yan@gmail.com',
                'phone' => '12345678',
                'cnpj' => null,
                'cpf' => '12345678',
                'password' => bcrypt('12345678'),
                'api_token' => Str::random(60),
            ],
        ]);
    }
}
