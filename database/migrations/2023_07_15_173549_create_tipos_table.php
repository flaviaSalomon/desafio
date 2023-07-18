<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tipos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('descripcion');
            $table->timestamps();

        });

        DB::table("tipos")->insert([
            [
                "descripcion" => "Ingreso"
            ],
            [
                "descripcion" => "Egreso"
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos');
    }
};
