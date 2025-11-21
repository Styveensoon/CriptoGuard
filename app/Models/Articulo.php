<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Services\FirmaJWTService;
use Illuminate\Support\Facades\Auth;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'contenido',
        'categoria',
        'autor_id',
        'fuente',
        'url',
        'firma'
    ];

    protected static function booted()
    {
        static::creating(function ($articulo) {

            // Usuario que crea el artículo
            $user = Auth::user();

            // Payload de la firma
            $payload = [
                'usuario' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ],
                'articulo' => [
                    'titulo' => $articulo->titulo,
                    'categoria' => $articulo->categoria,
                ],
                'timestamp' => now()->timestamp
            ];

            // Generar la firma JWT
            $articulo->firma = FirmaJWTService::generarFirma($payload);
        });
    }

    public function autor()
    {
        return $this->belongsTo(User::class, 'autor_id');
    }
}
