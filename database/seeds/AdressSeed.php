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
            'address' => 'Rua das palmeiras',
            'user_id' => 1,
        ]);

        DB::table('adresses')->insert([
            'address' => 'Quadra central',
            'user_id' => 2,
        ]);

        DB::table('adresses')->insert([
            'address' => 'Lote 12',
            'user_id' => 3,
        ]);

        DB::table('adresses')->insert([
            'address' => 'São bento',
            'user_id' => 4,
        ]);
    }
}
