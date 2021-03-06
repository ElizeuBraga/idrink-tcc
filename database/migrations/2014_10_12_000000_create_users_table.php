<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('avatar')->nullable()->default('default.svg');
            $table->enum('type',['customer','store']);
            $table->string('email', 100)->unique();
            $table->string('phone');
            $table->string('cpf')->nullable();
            $table->string('cnpj')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('temp_pwd')->nullable();
            $table->string('api_token', 60)->unique();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
