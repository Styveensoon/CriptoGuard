<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->longText('contenido')->nullable();
            $table->date('fecha_publicacion')->nullable();
            $table->foreignId('autor_id')->constrained('users')->onDelete('cascade'); // autor -> users.id
            $table->string('categoria')->nullable();
            $table->string('fuente')->nullable();
            $table->string('url')->nullable();
            $table->longText('firma')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('articulos');
    }
};
