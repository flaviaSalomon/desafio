<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentPlansTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_plans', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name_identify');
            $table->string('name_description');
            $table->string('description')->nullable();
            $table->string('frecuency');//mensual, anual, etc
            $table->integer('amount');//cantidad que se va a pagar cada vez según la frecuencia

            $table->integer('retries'); //numero de reintentos
            $table->string('url_confirmation')->nullable();

            $table->integer('active')->default(1); //activo

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_plans');
    }
};
