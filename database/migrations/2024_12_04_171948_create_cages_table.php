<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCagesTable extends Migration
{
    public function up()
    {
        Schema::create('cages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Табличка клетки
            $table->integer('capacity'); // Вместимость клетки
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cages');
    }
}


