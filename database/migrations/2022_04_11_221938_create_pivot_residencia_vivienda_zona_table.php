<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_residencia_vivienda_zona', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listado_id');
            $table->foreignId('seccion_id');
            $table->foreignId('residencia_id');
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
        Schema::dropIfExists('pivot_residencia_vivienda_zona');
    }
};
