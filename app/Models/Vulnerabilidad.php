<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vulnerabilidad extends Model
{
    protected $table = 'vulnerabilidades';
    protected $primaryKey = 'id_vulnerabilidad';

    protected $fillable = [
        'cve_id', 'severidad', 'descripcion',
        'fecha_reporte', 'empresa_afectada'
    ];

    public function empresa() {
        return $this->belongsTo(Empresa::class, 'empresa_afectada');
    }

    public function alertas() {
        return $this->hasMany(Alerta::class, 'id_vulnerabilidad');
    }
}
