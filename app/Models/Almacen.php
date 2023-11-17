<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Almacen extends Model
{
    use HasFactory, softDeletes;

    protected $primaryKey = 'idalmacen';

    protected $table = 'almacenes';
    
    protected $fillable = [
        'capacidad',
        'direccion',
        'iddepartamento'
    ];
}
