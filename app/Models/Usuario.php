<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory, SoftDeletes;

    public function user()
    {
        return $this->hasOne(User::class);
    }

    protected $primaryKey = 'docDeIdentidad';

    protected $table = 'usuarios';

    protected $fillable = [
        'docDeIdentidad',
        'nombre',
        'apellido',
        'telefono',
        'direccion'
    ];
}
