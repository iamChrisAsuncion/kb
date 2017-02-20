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
            $table->increments('id');
            $table->string('id_number')->unique();
            $table->string('phone')->default('not set');
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('middle_name')->default('');
            $table->string('last_name');
            $table->string('address')->default('not');
            $table->string('city')->default('set');
            $table->string('course')->default('1');
            $table->string('password')->default(bcrypt('Password1'));
            $table->string('role_id')->default('Client');
            $table->string('image')->default('placeholder.jpg');
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
