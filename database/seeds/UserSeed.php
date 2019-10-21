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
        factory(App\User::class, 10)->create()->each(function ($user) {
            $user->products()->save(factory(App\Product::class)->make());
            $user->adresses()->save(factory(App\Address::class)->make());
        });
    }
}
