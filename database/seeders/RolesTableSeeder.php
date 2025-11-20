<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        Rol::create(['nombre' => 'Administrador']);
        Rol::create(['nombre' => 'Analista']);
        Rol::create(['nombre' => 'Auditor']);
    }
}
