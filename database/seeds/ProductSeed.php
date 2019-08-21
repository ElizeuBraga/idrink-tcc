<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory('App\Product', 5)->create();

        DB::table('products')->insert([
            'name' => 'Recoleta 180',
            'price' => 23.00,
            'user_id' => 2
        ]);

        DB::table('products')->insert([
            'name' => 'Belgrano',
            'price' => 12.00,
            'user_id' => 2
        ]);

        DB::table('products')->insert([
            'name' => 'X tudo',
            'price' => 10.00,
            'user_id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Bomba atomica',
            'price' => 7.00,
            'user_id' => 1
        ]);
    }
}
