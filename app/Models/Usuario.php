<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $primaryKey = 'docDeIdentidad';

    protected $table = 'Usuarios';

    protected $fillable = [
        'docDeIdentidad',
        'contrasenia',
        'nombre',
        'apellido',
        'telefono',
        'email',
        'direccion'
    ];

    protected $hidden = [
        'contrasenia',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
