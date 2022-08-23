<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellido1');
            $table->string('apellido2');
            $table->string('tipo_id');
            $table->string('identificacion');
            $table->string('entrada');
            $table->string('salida');
            $table->string('email');
            $table->string('tel');
            $table->string('tipo_hab');
            $table->string('estado')->default('S');
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
        Schema::dropIfExists('reservas');
    }
}
