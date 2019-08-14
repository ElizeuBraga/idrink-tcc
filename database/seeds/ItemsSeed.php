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
            'quantity' => 5, 
            'product_id' => 2, 
            'delivery_id' => 2
        ]);

        DB::table('items')->insert([
            'quantity' => 5, 
            'product_id' => 2, 
            'delivery_id' => 3
        ]);
    }
}
