<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');//C
            $table->string('id_modelo')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('imagen')->nullable();
            $table->string('bandera');//catalogo =C, Manufactura= M
            $table->string('observacion')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manufacturas');
    }
}
