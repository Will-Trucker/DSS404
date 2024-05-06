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
        Schema::create('tarjeta_juegos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clientes_id'); // Cambié el nombre de la columna
            $table->string('codigo');
            $table->string('tipo');
            $table->string('costo');
            $table->string('estado');
            $table->date('vencimiento');
            $table->string('saldo');
            $table->string('limite');

            $table->foreign('clientes_id')->references('id')->on('clientes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarjeta_juegos');
    }
};
