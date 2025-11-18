<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('incidentes', function (Blueprint $table) {
            $table->id('id_incidente');
            $table->unsignedBigInteger('id_articulo');

            $table->string('tipo_incidente');
            $table->date('fecha')->nullable();
            $table->string('pais')->nullable();
            $table->string('severidad')->nullable();
            $table->longText('descripcion')->nullable();

            $table->foreign('id_articulo')
                ->references('id_articulo')->on('articulos')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('incidentes');
    }
};
