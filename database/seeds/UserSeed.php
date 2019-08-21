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
        // factory('App\User', 20)->create();
        DB::table('users')->insert([
            'name' => 'Skiltys',
            'type' => 'store',
            'email' => 'skyltis@gmail.com',
            'phone' => '12345678',
            'cnpj' => '12345678',
            'password' => bcrypt('12345678'),
            'api_token' => Str::random(60),
        ]);

        DB::table('users')->insert([
            'name' => 'La casita',
            'type' => 'store',
            'email' => 'lacasita@gmail.com',
            'phone' => '12345678',
            'cnpj' => '12345678',
            'password' => bcrypt('12345678'),
            'api_token' => Str::random(60),
        ]);

        DB::table('users')->insert([
            'name' => 'Elizeu',
            'type' => 'customer',
            'email' => 'elizeu@gmail.com',
            'phone' => '12345678',
            'cnpj' => '12345678',
            'password' => bcrypt('12345678'),
            'api_token' => Str::random(60),
        ]);

        DB::table('users')->insert([
            'name' => 'Sara',
            'type' => 'customer',
            'email' => 'sara@gmail.com',
            'phone' => '12345678',
            'cnpj' => '12345678',
            'password' => bcrypt('12345678'),
            'api_token' => Str::random(60),
        ]);
    }
}
