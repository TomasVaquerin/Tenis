<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tenistas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('ranking');
            $table->string('pais');
            $table->date('FechaNacimiento');
            $table->integer('edad');
            $table->integer('Altura');
            $table->integer('peso');
            $table->string('Mano');
            $table->string('reves');
            $table->string('entrenador');
            $table->decimal('totalDineroGanado', 15, 2);
            $table->integer('numeroVictorias');
            $table->integer('numeroDerrotas');
            $table->string('imagen')->default('https://via.placeholder.com/150');
            $table->integer('puntos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenistas');
    }
};
