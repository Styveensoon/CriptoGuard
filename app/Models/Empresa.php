<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    protected $primaryKey = 'id_empresa';

    protected $fillable = [
        'nombre', 'pais', 'area_especializacion', 'sitio_web'
    ];

    public function usuarios() {
        return $this->hasMany(User::class, 'id_empresa');
    }

    public function vulnerabilidades() {
        return $this->hasMany(Vulnerabilidad::class, 'empresa_afectada');
    }

    public function alertas() {
        return $this->hasMany(Alerta::class, 'id_empresa');
    }
}
