<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id('id_articulo');
            $table->string('titulo');
            $table->longText('contenido');
            $table->date('fecha_publicacion')->nullable();
            $table->unsignedBigInteger('autor');

            $table->string('categoria')->nullable();
            $table->string('fuente')->nullable();
            $table->string('url')->nullable();
            $table->string('firma')->nullable();

            $table->foreign('autor')
                ->references('id_usuario')->on('usuarios')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('articulos');
    }
};
