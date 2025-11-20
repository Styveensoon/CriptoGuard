<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'empresa_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'role_user');
    }
}
