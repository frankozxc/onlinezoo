<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Имя животного
            $table->string('species'); // Вид животного
            $table->integer('age'); // Возраст животного
            $table->text('description')->nullable(); // Описание животного
            $table->unsignedBigInteger('cage_id'); // ID клетки
            $table->timestamps();

            $table->foreign('cage_id')->references('id')->on('cages')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('animals');
    }
}

