<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTorneosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('torneos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('modalidad');
            $table->string('superficie');
            $table->foreignId('vacantes')->references('id')->on('tenistas');
            $table->string('categoria');
            $table->decimal('premios', 10, 2);
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->string('imagen')->default('https://via.placeholder.com/150');
            $table->boolean('isDelete')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('torneos');
    }
}
