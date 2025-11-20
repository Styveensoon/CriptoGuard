<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'contenido',
        'categoria',
        'autor_id',
    ];

    public function autor()
    {
        return $this->belongsTo(User::class, 'autor_id');
    }
}
