<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuario_rol', function (Blueprint $table) {
            $table->id(); // clave primaria propia (recomendado)

            // claves foráneas
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('rol_id');

            // relaciones
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('rol_id')
                ->references('id')->on('roles')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuario_rol');
    }
};
