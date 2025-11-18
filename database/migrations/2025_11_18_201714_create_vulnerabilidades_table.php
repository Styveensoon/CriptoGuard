<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('vulnerabilidades', function (Blueprint $table) {
            $table->id('id_vulnerabilidad');
            $table->string('cve_id')->nullable();
            $table->string('severidad')->nullable();
            $table->longText('descripcion')->nullable();
            $table->date('fecha_reporte')->nullable();

            $table->unsignedBigInteger('empresa_afectada');
            $table->foreign('empresa_afectada')
                ->references('id_empresa')->on('empresas')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('vulnerabilidades');
    }
};
