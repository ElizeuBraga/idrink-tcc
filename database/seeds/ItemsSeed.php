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
            'quantity' => 2, 
            'product_id' => 1, 
            'delivery_id' => 1
        ]);

        DB::table('items')->insert([
            'quantity' => 22, 
            'product_id' => 2, 
            'delivery_id' => 1
        ]);

        //para delivery do Elizeu
        DB::table('items')->insert([
            'quantity' => 7, 
            'product_id' => 3, 
            'delivery_id' => 2
        ]);

        DB::table('items')->insert([
            'quantity' => 2, 
            'product_id' => 4, 
            'delivery_id' => 2
        ]);

        DB::table('items')->insert([
            'quantity' => 2, 
            'product_id' => 2, 
            'delivery_id' => 3
        ]);

        DB::table('items')->insert([
            'quantity' => 2, 
            'product_id' => 2, 
            'delivery_id' => 3
        ]);
    }
}
