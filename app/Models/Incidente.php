<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Incidente extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'usuario_id',
        'estado',
        'nivel_impacto',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function vulnerabilidades()
    {
        return $this->belongsToMany(Vulnerabilidad::class, 'incidente_vulnerabilidad');
    }
}
