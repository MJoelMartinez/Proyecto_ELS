<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Usuario;

class Cargador extends Usuario
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'docDeIdentidad';

    protected $table = 'cargadores';

    protected $fillable = [
        'docDeIdentidad',
        'carnetTransporte',
        'idAlmacen',
        'idTurno'
    ];
}