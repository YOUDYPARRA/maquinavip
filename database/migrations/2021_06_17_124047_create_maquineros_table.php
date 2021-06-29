<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaquinerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquineros', function (Blueprint $table) {
            $table->id();
            $table->string('id_modelo');
            $table->string('id_nombre');
            $table->string('nombre');
            $table->string('cantidad');
            $table->string('talla');
            $table->string('hilo_recta')->nullable();
            $table->string('hilo_over')->nullable();
            $table->string('observacion')->nullable();
            $table->string('tipo')->nullable();
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
        Schema::dropIfExists('maquineros');
    }
}
