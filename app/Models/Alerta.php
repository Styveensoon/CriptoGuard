<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    protected $table = 'alertas';
    protected $primaryKey = 'id_alerta';

    protected $fillable = [
        'titulo', 'descripcion', 'fecha_alerta',
        'severidad', 'origen',
        'id_incidente', 'id_empresa', 'id_vulnerabilidad'
    ];

    public function incidente() {
        return $this->belongsTo(Incidente::class, 'id_incidente');
    }

    public function empresa() {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }

    public function vulnerabilidad() {
        return $this->belongsTo(Vulnerabilidad::class, 'id_vulnerabilidad');
    }
}
