<?php

use Illuminate\Database\Seeder;

class DeliverySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Delivery::class, 10)->create()->each(function ($delivery) {
            $delivery->items()->save(factory(App\Item::class)->make());
        });
    }
}
