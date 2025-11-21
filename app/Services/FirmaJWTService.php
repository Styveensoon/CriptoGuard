<?php

namespace App\Services;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class FirmaJWTService
{
    public static function generarFirma(array $payload)
    {
        $secret = env('JWT_SECRET', 'default_secret');

        return JWT::encode($payload, $secret, 'HS256');
    }
}
