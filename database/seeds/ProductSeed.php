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
            'name' => 'Product1Store1',
            'price' => 4.00,
            'user_id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Product2Store1',
            'price' => 5.00,
            'user_id' => 1
        ]);
        DB::table('products')->insert([
            'name' => 'Product1Store2',
            'price' => 2.00,
            'user_id' => 2
        ]);
        DB::table('products')->insert([
            'name' => 'Product2Store2',
            'price' => 1.00,
            'user_id' => 2
        ]);
    }
}
