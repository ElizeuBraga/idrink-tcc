<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserSeed::class);
        $this->call(ProductSeed::class);
        $this->call(AdressSeed::class);
        $this->call(DeliveriesSeed::class);
    }
}
