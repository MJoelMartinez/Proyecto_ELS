<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turno extends Model
{
    use HasFactory, softDeletes;

    protected $primaryKey = 'idTurno';

    protected $table = 'turnos';

    protected $fillable = [
        'horaInicio',
        'horaFinal'
    ];
}
