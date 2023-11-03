<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiculo extends Model
{
    use HasFactory, SoftDeletes;

    public function chofer()
    {
        return $this->belongsTo(Chofer::class);
    }

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
