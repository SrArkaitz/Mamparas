<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMamparasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mamparas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipoCristal');
            $table->string('perfil');
            $table->string('color');
            $table->boolean('duchaBañera');
            $table->double('estimacionPrecio');
            $table->string('foto1');
            $table->string('foto2');
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
        Schema::dropIfExists('mamparas');
    }
}
