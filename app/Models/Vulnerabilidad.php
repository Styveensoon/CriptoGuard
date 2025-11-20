<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vulnerabilidad extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'descripcion',
        'nivel_riesgo',
    ];

    public function incidentes()
    {
        return $this->belongsToMany(Incidente::class, 'incidente_vulnerabilidad');
    }
}
