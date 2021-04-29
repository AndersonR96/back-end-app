<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentsTable extends Migration
{
    public function up()
    {
        Schema::create('departaments', function (Blueprint $table) {
            $table->increments('departament_id');
            $table->string('departament');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('departaments');
    }
}
