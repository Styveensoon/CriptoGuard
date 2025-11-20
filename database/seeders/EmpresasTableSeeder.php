<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class EmpresasTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('empresas')->insert([
            [
                'nombre' => 'TechNova Solutions',
                'pais' => 'Estados Unidos',
                'area_especializacion' => 'Desarrollo de software',
                'sitio_web' => 'https://www.technova.com',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'GlobalData Insights',
                'pais' => 'España',
                'area_especializacion' => 'Análisis de datos',
                'sitio_web' => 'https://www.globaldata.es',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Innovatech Labs',
                'pais' => 'México',
                'area_especializacion' => 'Inteligencia artificial',
                'sitio_web' => 'https://www.innovatech.mx',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'FutureVision Corp',
                'pais' => 'Chile',
                'area_especializacion' => 'Consultoría tecnológica',
                'sitio_web' => 'https://www.futurevision.cl',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'SoftBridge Group',
                'pais' => 'Argentina',
                'area_especializacion' => 'Integración de sistemas',
                'sitio_web' => 'https://www.softbridge.com.ar',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
