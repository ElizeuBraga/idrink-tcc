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
        //para delivery 1 
        DB::table('items')->insert([
            'quantity' => 5, 
            'product_id' => 1, 
            'delivery_id' => 1
        ]);

        DB::table('items')->insert([
            'quantity' => 3, 
            'product_id' => 2, 
            'delivery_id' => 1
        ]);

        //para delivery 2
        DB::table('items')->insert([
            'quantity' => 5, 
            'product_id' => 3, 
            'delivery_id' => 2
        ]);

        //para delivery 3
        DB::table('items')->insert([
            'quantity' => 5, 
            'product_id' => 3, 
            'delivery_id' => 3
        ]);

        DB::table('items')->insert([
            'quantity' => 1, 
            'product_id' => 4, 
            'delivery_id' => 3
        ]);
    }
}
