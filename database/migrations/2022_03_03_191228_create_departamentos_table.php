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
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->nullable();
            $table->string('folio')->nullable();
            $table->integer('piso')->nullable();
            $table->date('fechaEntrega')->nullable();
            $table->date('fechaEntregado')->nullable();
            $table->date('fechaPreEntrega')->nullable();
            $table->foreignId('cliente_id')->default(0)->constrained();
            $table->foreignId('tipo_departamento_id')->default(0)->constrained();
            $table->foreignId('status_id')->default(0);
            $table->boolean('eliminado')->default(0);
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
        Schema::dropIfExists('departamentos');
    }
};
