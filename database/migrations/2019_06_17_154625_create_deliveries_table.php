<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status',['open','canceled','delivered'])->default('open');
            $table->enum('payment',['money','debit','credit']);

            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('adresses')->onDelete('cascade');
            
            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deliveries', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('address_id');
        });

        Schema::dropIfExists('deliveries');
    }
}
