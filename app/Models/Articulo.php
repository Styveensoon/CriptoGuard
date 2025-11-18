<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';
    protected $primaryKey = 'id_articulo';

    protected $fillable = [
        'titulo', 'contenido', 'fecha_publicacion', 'autor',
        'categoria', 'fuente', 'url', 'firma'
    ];

    public function usuario() {
        return $this->belongsTo(User::class, 'autor');
    }

    public function incidente() {
        return $this->hasOne(Incidente::class, 'id_articulo');
    }
}
