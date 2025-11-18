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
        Schema::table('users', function (Blueprint $table) {
            
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();



            $table->string('username')->unique()->after('email');
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('sexo', ['M', 'F', 'Otro'])->nullable();

            // Relación con empresa
            $table->foreignId('empresa_id')->nullable()->constrained('empresas')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'apellido_paterno',
                'apellido_materno',
                'username',
                'fecha_nacimiento',
                'sexo',
                'empresa_id'
            ]);
        });
    }
};
