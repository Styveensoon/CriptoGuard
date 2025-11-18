<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('alertas', function (Blueprint $table) {
            $table->id('id_alerta');
            $table->string('titulo');
            $table->longText('descripcion')->nullable();
            $table->date('fecha_alerta')->nullable();
            $table->string('severidad')->nullable();
            $table->string('origen')->nullable();

            $table->unsignedBigInteger('id_incidente')->nullable();
            $table->unsignedBigInteger('id_empresa')->nullable();
            $table->unsignedBigInteger('id_vulnerabilidad')->nullable();

            $table->foreign('id_incidente')->references('id_incidente')->on('incidentes')->onDelete('set null');
            $table->foreign('id_empresa')->references('id_empresa')->on('empresas')->onDelete('set null');
            $table->foreign('id_vulnerabilidad')->references('id_vulnerabilidad')->on('vulnerabilidades')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('alertas');
    }
};
