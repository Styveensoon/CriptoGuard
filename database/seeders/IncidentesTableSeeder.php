<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class IncidentesTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('incidentes')->insert([
            [
                'articulo_id' => 1, // debe existir en articulos
                'tipo_incidente' => 'Ransomware',
                'fecha' => '2025-01-22',
                'pais' => 'Estados Unidos',
                'severidad' => 'Alta',
                'descripcion' => 'Un ataque de ransomware afectó a múltiples servidores corporativos, cifrando información crítica.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'articulo_id' => 2,
                'tipo_incidente' => 'Phishing',
                'fecha' => '2025-02-03',
                'pais' => 'España',
                'severidad' => 'Media',
                'descripcion' => 'Campaña de phishing dirigida a empleados administrativos con enlaces falsos de inicio de sesión.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'articulo_id' => 1,
                'tipo_incidente' => 'Fuga de información',
                'fecha' => '2025-03-12',
                'pais' => 'México',
                'severidad' => 'Alta',
                'descripcion' => 'Exfiltración de datos personales debido a una mala configuración en un servidor público.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'articulo_id' => 3,
                'tipo_incidente' => 'Ataque DDoS',
                'fecha' => '2025-04-01',
                'pais' => 'Alemania',
                'severidad' => 'Crítica',
                'descripcion' => 'Un ataque de denegación de servicio dejó inoperativo el portal web durante más de 6 horas.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'articulo_id' => 4,
                'tipo_incidente' => 'Vulnerabilidad Zero-Day',
                'fecha' => '2025-05-20',
                'pais' => 'Japón',
                'severidad' => 'Crítica',
                'descripcion' => 'Explotación activa de un Zero-Day en software empresarial ampliamente utilizado.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
