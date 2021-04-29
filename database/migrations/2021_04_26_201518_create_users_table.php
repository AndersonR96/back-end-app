<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->integer('departament_id')->unsigned();
            $table->foreign('departament_id')->references('departament_id')->on('departaments')->onDelete('cascade');
            $table->string('name');
            $table->string('last_name');
            $table->string('identification_number');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
