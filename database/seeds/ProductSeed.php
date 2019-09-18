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

        DB::table('products')->insert([
            //La casita
            [
                'name' => 'Recoleta 180',
                'price' => 23.00,
                'user_id' => 2
            ],

            [
                'name' => 'Belgrano',
                'price' => 12.00,
                'user_id' => 2
            ],

            //Skiltys
            [
                'name' => 'X tudo',
                'price' => 10.00,
                'user_id' => 1
            ],

            [
                'name' => 'Bomba atomica',
                'price' => 7.00,
                'user_id' => 1
            ]
        ]);
    }
}
