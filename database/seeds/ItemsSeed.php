<?php

use Illuminate\Database\Seeder;

class ItemsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //para delivery da Sara
        DB::table('items')->insert([
            [
                'quantity' => 3,
                'product_id' => 3,
                'delivery_id' => 1
            ],

            [
                'quantity' => 2,
                'product_id' => 4,
                'delivery_id' => 2
            ],

            [
                'quantity' => 1,
                'product_id' => 3,
                'delivery_id' => 2
            ],

            [
                'quantity' => 1,
                'product_id' => 1,
                'delivery_id' => 2
            ],
            [
                'quantity' => 1,
                'product_id' => 1,
                'delivery_id' => 3
            ],
        ]);
    }
}
