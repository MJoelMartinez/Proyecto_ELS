<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiculo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'idVehiculo';

    protected $table = 'vehiculos';

    protected $fillable = [
        'idVehiculo',
        'matricula',
        'capacidad',
        'pesoMaximo',
        'modelo'
    ];
}
