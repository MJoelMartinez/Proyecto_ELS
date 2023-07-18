<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paquete extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'idPaquete';

    protected $table = 'Paquetes';

    protected $fillable = [
        'idPaquete',
        'cantidadArticulos',
        'peso'
    ];

    public function articulos() {
        return $this -> hasMany(Articulo::class, 'id');
    }
}
