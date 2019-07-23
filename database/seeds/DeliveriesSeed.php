<?php

use Illuminate\Database\Seeder;

class DeliveriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deliveries')->insert([
            'address_id' => 1, 
            'store_id' => 1, 
            'customer_id' => 1
        ]);

        DB::table('deliveries')->insert([
            'address_id' => 2, 
            'store_id' => 1, 
            'customer_id' => 2
        ]);

        DB::table('deliveries')->insert([
            'address_id' => 1, 
            'store_id' => 2, 
            'customer_id' => 1
        ]);

        DB::table('deliveries')->insert([
            'address_id' => 2, 
            'store_id' => 2, 
            'customer_id' => 2
        ]);
    }
}
