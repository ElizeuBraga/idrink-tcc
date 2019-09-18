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
            [
                'status' => 'open',
                'payment' => 'money',
                'address_id' => null,
                'store_id' => 1,
                'customer_id' => 3
            ],

            [
                'status' => 'open',
                'payment' => 'money',
                'address_id' => null,
                'store_id' => 1,
                'customer_id' => 4
            ],

            [
                'status' => 'open',
                'payment' => 'money',
                'address_id' => null,
                'store_id' => 1,
                'customer_id' => 4
            ],
        ]);
    }
}
