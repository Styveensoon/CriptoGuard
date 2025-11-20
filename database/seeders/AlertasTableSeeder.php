<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AlertasTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('alertas')->insert([
            [
                'titulo' => 'Alerta crítica por actividad maliciosa detectada',
                'descripcion' => 'Se identificó comportamiento anómalo vinculado a un intento de explotación de una vulnerabilidad Zero-Day.',
                'fecha_alerta' => '2025-06-15',
                'severidad' => 'Crítica',
                'origen' => 'Sistema de Monitoreo IDS',
                'incidente_id' => 1,
                'empresa_id' => 1,
                'vulnerabilidad_id' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo' => 'Intento de intrusión bloqueado',
                'descripcion' => 'El firewall detectó múltiples intentos fallidos de acceso remoto provenientes de una IP extranjera.',
                'fecha_alerta' => '2025-03-08',
                'severidad' => 'Alta',
                'origen' => 'Firewall perimetral',
                'incidente_id' => 2,
                'empresa_id' => 2,
                'vulnerabilidad_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo' => 'Posible fuga de información',
                'descripcion' => 'Uso inusual de ancho de banda detectado en servidores internos, podría indicar extracción de datos.',
                'fecha_alerta' => '2025-04-21',
                'severidad' => 'Media',
                'origen' => 'SIEM Corporativo',
                'incidente_id' => 3,
                'empresa_id' => 3,
                'vulnerabilidad_id' => null, // sin relación directa
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo' => 'Actualización urgente recomendada',
                'descripcion' => 'Nueva versión publicada para mitigar una vulnerabilidad crítica presente en servidores Windows.',
                'fecha_alerta' => '2025-02-12',
                'severidad' => 'Alta',
                'origen' => 'Proveedor de Software',
                'incidente_id' => null,
                'empresa_id' => 1,
                'vulnerabilidad_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo' => 'Anomalías en registros de acceso',
                'descripcion' => 'Se detectaron patrones sospechosos de intentos de acceso fuera de horario laboral.',
                'fecha_alerta' => '2025-05-09',
                'severidad' => 'Baja',
                'origen' => 'Sistema de Auditoría',
                'incidente_id' => null,
                'empresa_id' => 4,
                'vulnerabilidad_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
