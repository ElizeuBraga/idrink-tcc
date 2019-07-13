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
            'name' => 'Store1',
            'type' => 'store',
            'email' => 'store1@gmail.com',
            'phone' => '12345678',
            'cnpj' => '12345678',
            'password' => bcrypt('12345678'),
            'api_token' => Str::random(60),
        ]);

        DB::table('users')->insert([
            'name' => 'Store2',
            'type' => 'store',
            'email' => 'store2@gmail.com',
            'phone' => '12345678',
            'cnpj' => '12345678',
            'password' => bcrypt('12345678'),
            'api_token' => Str::random(60),
        ]);

        DB::table('users')->insert([
            'name' => 'Customer1',
            'type' => 'customer',
            'email' => 'customer1@gmail.com',
            'phone' => '12345678',
            'cnpj' => '12345678',
            'password' => bcrypt('12345678'),
            'api_token' => Str::random(60),
        ]);

        DB::table('users')->insert([
            'name' => 'Customer2',
            'type' => 'customer',
            'email' => 'customer2@gmail.com',
            'phone' => '12345678',
            'cnpj' => '12345678',
            'password' => bcrypt('12345678'),
            'api_token' => Str::random(60),
        ]);
    }
}
