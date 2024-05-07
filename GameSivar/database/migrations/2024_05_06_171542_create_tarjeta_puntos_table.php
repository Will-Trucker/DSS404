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
        Schema::create('tarjeta_puntos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('tarjeta_juegos_id');
            $table->integer('cantidadP');

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tarjeta_juegos_id')->references('id')->on('tarjeta_juegos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarjeta_puntos');
    }
};
