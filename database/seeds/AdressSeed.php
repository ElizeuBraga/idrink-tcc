<?php

use Illuminate\Database\Seeder;
use App\Product;

class AdressSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory('App\Product', 5)->create();

        DB::table('adresses')->insert([
            'address' => 'Q 15 Area reservada 04',
            'user_id' => 3,
        ]);

        DB::table('adresses')->insert([
            'address' => 'Q5 conj A casa 11',
            'user_id' => 2,
        ]);
    }
}
