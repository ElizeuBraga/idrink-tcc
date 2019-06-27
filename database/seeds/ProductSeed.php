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
        factory('App\Product', 5)->create();
    }
}
