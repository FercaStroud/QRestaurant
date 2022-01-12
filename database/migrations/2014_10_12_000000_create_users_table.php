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
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('name', 25);
            $table->string('lastname', 15);
            $table->string('second_lastname', 15)->default('')->nullable();
            $table->string('address', 400)->default('SIN DATOS')->nullable();
            $table->string('state', 75)->default('SIN DATOS')->nullable();
            $table->string('municipality', 75)->default('SIN DATOS')->nullable();
            $table->string('city', 75)->default('SIN DATOS')->nullable();
            $table->string('country', 75)->default('SIN DATOS')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone', 20);
            $table->string('restaurant_name', 50);
            $table->text('description')->nullable();
            $table->string('cover', 75)->nullable();;
            $table->string('logo', 75)->nullable();;
            $table->timestamp('birthday')->nullable();

            $table->rememberToken();
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
