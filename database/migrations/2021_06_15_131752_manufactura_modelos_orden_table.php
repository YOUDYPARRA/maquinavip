<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ManufacturaModelosOrdenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('manufacturas', function (Blueprint $table) {
                $table->string('tienda')->nullable();
                $table->string('numero_orden')->nullable();
                $table->string('fecha_entrega')->nullable();
                $table->string('total_corte')->nullable();
                $table->string('fecha_limite')->nullable();
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
