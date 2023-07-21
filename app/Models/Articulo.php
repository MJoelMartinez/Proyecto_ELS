<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function paquetes(){
        return $this -> belongsTo(Paquete::class, 'idPaquete');
    }

    protected $primaryKey = 'idArticulo';

    protected $table = 'Articulos';

    protected $fillable = [
        'idArticulo',
        'nombre',
        'anioCreacion'
    ];
}
