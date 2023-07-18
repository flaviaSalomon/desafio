<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transacciones', function (Blueprint $table) {

            $table->engine = 'InnoDB';
/*
            $table->id();
            $table->string('nombre');
            $table->date('fecha');
            $table->integer('monto');
            $table->timestamps();
*/

            $table->id();

            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('tipos');


            $table->string('descripcion', 150);
            $table->date('fecha');
            $table->integer('monto');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacciones');
    }
};
