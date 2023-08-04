<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;

class CreatePaymentPlanClientsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_plan_clients', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('merchant_user_id');
            $table->foreign('merchant_user_id')->references('id')->on('merchant_user');

            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('payment_plans');


            $table->dateTime('started_at'); //se inicia la suscripción
            $table->dateTime('finish_at'); //cuando terminaria ete registro de suscripción
            $table->boolean('renewal')->default(true);
            $table->dateTime('renewal_canceled_at')->default(null);

            $table->dateTime('ended_at');//cuando termina en realidad

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_plan_clients');
    }
};
