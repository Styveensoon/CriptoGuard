<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class VulnerabilidadesTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('vulnerabilidades')->insert([
            [
                'cve_id' => 'CVE-2025-1123',
                'severidad' => 'Crítica',
                'descripcion' => 'Vulnerabilidad de ejecución remota de código en sistemas de autenticación corporativos.',
                'fecha_reporte' => '2025-02-10',
                'empresa_afectada' => 1, // Debe existir en empresas
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'cve_id' => 'CVE-2025-2089',
                'severidad' => 'Alta',
                'descripcion' => 'Fallo de validación de entradas que permite escalación de privilegios en servidores web.',
                'fecha_reporte' => '2025-03-05',
                'empresa_afectada' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'cve_id' => 'CVE-2025-3311',
                'severidad' => 'Media',
                'descripcion' => 'Exposición de información debido a parámetros de configuración mal asegurados.',
                'fecha_reporte' => '2025-04-17',
                'empresa_afectada' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'cve_id' => 'CVE-2025-4120',
                'severidad' => 'Alta',
                'descripcion' => 'Desbordamiento de búfer en módulo de análisis de tráfico.',
                'fecha_reporte' => '2025-05-02',
                'empresa_afectada' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'cve_id' => 'CVE-2025-5577',
                'severidad' => 'Crítica',
                'descripcion' => 'Vulnerabilidad Zero-Day en software de gestión documental utilizado globalmente.',
                'fecha_reporte' => '2025-06-14',
                'empresa_afectada' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
