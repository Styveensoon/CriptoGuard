<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ArticulosTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('articulos')->insert([
            [
                'titulo' => 'Tendencias actuales en ciberseguridad',
                'contenido' => 'Un análisis detallado de las principales amenazas digitales y las estrategias recomendadas para mitigarlas.',
                'fecha_publicacion' => '2025-01-10',
                'autor_id' => 1, // debe existir en users
                'categoria' => 'Ciberseguridad',
                'fuente' => 'CyberTech Magazine',
                'url' => 'https://www.cybertechmagazine.com/tendencias-2025',
                'firma' => 'Redacción CyberTech',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo' => 'El papel de la inteligencia artificial en la prevención de fraudes',
                'contenido' => 'La inteligencia artificial está transformando la forma en que las empresas detectan actividades sospechosas.',
                'fecha_publicacion' => '2025-02-15',
                'autor_id' => 2,
                'categoria' => 'Tecnología',
                'fuente' => 'AI Today',
                'url' => 'https://aitoday.com/prevencion-fraudes-ia',
                'firma' => 'Juan Pérez',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo' => 'Buenas prácticas para proteger datos sensibles en empresas',
                'contenido' => 'Guía práctica para implementar políticas de protección de datos alineadas con estándares internacionales.',
                'fecha_publicacion' => '2025-03-05',
                'autor_id' => 1,
                'categoria' => 'Protección de datos',
                'fuente' => 'DataSecure Blog',
                'url' => 'https://www.datasecure.com/blog/proteger-datos',
                'firma' => 'Ana Martínez',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo' => 'Cómo los ataques phishing están evolucionando',
                'contenido' => 'Los ciberdelincuentes están utilizando nuevas técnicas de ingeniería social para engañar a usuarios y empresas.',
                'fecha_publicacion' => '2025-04-01',
                'autor_id' => 3,
                'categoria' => 'Ciberseguridad',
                'fuente' => 'Security News',
                'url' => 'https://securitynews.com/phishing-evolucion',
                'firma' => 'Equipo Security News',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo' => 'La importancia del cifrado en la era digital',
                'contenido' => 'El cifrado se ha convertido en un pilar fundamental para la protección de la información.',
                'fecha_publicacion' => '2025-05-12',
                'autor_id' => 1,
                'categoria' => 'Criptografía',
                'fuente' => 'CryptoWorld',
                'url' => 'https://cryptoworld.com/cifrado-era-digital',
                'firma' => 'Dr. Luis Fernández',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
