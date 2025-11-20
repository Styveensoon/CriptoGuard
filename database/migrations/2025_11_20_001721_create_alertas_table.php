<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('alertas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->longText('descripcion')->nullable();
            $table->date('fecha_alerta')->nullable();
            $table->string('severidad')->nullable();
            $table->string('origen')->nullable();

            $table->foreignId('incidente_id')->nullable()->constrained('incidentes')->nullOnDelete();
            $table->foreignId('empresa_id')->nullable()->constrained('empresas')->nullOnDelete();
            $table->foreignId('vulnerabilidad_id')->nullable()->constrained('vulnerabilidades')->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('alertas');
    }
};
