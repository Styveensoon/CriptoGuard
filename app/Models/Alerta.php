<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alerta extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'usuario_id',
        'fecha',
        'nivel',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
