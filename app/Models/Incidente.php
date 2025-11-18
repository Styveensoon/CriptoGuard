<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incidente extends Model
{
    protected $table = 'incidentes';
    protected $primaryKey = 'id_incidente';

    protected $fillable = [
        'id_articulo', 'tipo_incidente', 'fecha',
        'pais', 'severidad', 'descripcion'
    ];

    public function articulo() {
        return $this->belongsTo(Articulo::class, 'id_articulo');
    }

    public function alertas() {
        return $this->hasMany(Alerta::class, 'id_incidente');
    }
}
